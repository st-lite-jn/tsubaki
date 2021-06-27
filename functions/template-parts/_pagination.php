<?php
//======================================================================
// ページネーション
//======================================================================

//-----------------------------------------------------
// 1ページあたりの表示件数のカスタマイズする関数
//-----------------------------------------------------
function tsbk_change_posts_per_page( $query ) {
	if( is_admin() || ! $query->is_main_query())return;
	/**
	 * 現在ページを取得
	 * ページ数ごとに表示件数を変更する場合に使用する
	 */
	$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	if (
		$query->is_post_type_archive('post') ||
		$query->is_post_type_archive('news')
	){
		$query->set( 'posts_per_page', 12); //1ページ目に表示する記事数
	}
}
add_action( 'pre_get_posts', 'tsbk_change_posts_per_page' );


//-----------------------------------------------------
// ページネーション出力する関数
//-----------------------------------------------------
/**
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/

if ( ! class_exists( 'Tsbk_Custom_Pagenation' ) ) {
class Tsbk_Custom_Pagenation {
    public static function pagination_method( $pages, $paged, $range = 2, $show_only = false ) {
		$pagenation = "";
		$pages = intval($pages);    //float型で渡ってくるので明示的に int型 へ
        $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように
		$last_range = $pages - $range;
		//表示テキスト
        $text_first   = "first";
        $text_before  = "&lt; Prev";
        $text_next    = "Next &gt;";
       	$text_last    = "last";
        if ( $show_only && $pages === 1 ):
            // 1ページのみで表示設定が true の時
            echo '<div class="pagination"><span class="current pager">1</span></div>';
            return;
        endif;

        if ( $pages === 1 ) return;    // 1ページのみで表示設定もない場合

        if ( 1 !== $pages ) {
			//2ページ以上の時
			$pagenation .= <<< EOM
				<div class="p-pagenation">

EOM;
		   if ( $paged > 1 ) {
				$before_page_link = get_pagenum_link( $paged - 1 );

				// 「最初」 の表示
// 				$first_page_link = get_pagenum_link(1);
// 				$pagenation .= <<< EOM
// 				<a href="{$first_page_link}" class="page-numbers first">{$text_first}</a>
// EOM;

				$pagenation .= <<< EOM
					<a href="{$before_page_link}" class="p-pagenation__item">{$text_before}</a>
EOM;
		}
            for ( $i = 1; $i <= $pages; $i++ ) {
                if ( $i <= $paged + $range && $i >= $paged - $range ) {
                    // $paged +- $range 以内であればページ番号を出力
                    if ( $paged === $i ) {
						$pagenation .= <<< EOM
						<span class="p-pagenation__item is-current">{$i}</span>
EOM;
                    } else {
						$number_page_link = get_pagenum_link( $i );
						$pagenation .= <<< EOM
						<a href="{$number_page_link}" class="p-pagenation__item">{$i}</a>
EOM;
                    }
                }
			}
            if ( $paged != $pages ) {
              if ( $paged < $pages ) {
                // 「次へ」 のリンクを表示
                $next_page_link = get_pagenum_link( $paged + 1 );
                $pagenation .= <<< EOM
						<a href="{$next_page_link}" class="p-pagenation__item">{$text_next}</a>
EOM;
				}
				// 「最後」のリンクを表示
// 				$last_page_link = get_pagenum_link( $pages );
// 				$pagenation .= <<< EOM
// 				<a href="{$last_page_link}" class="page-numbers last">{$text_last}</a>
// EOM;
			}

			$pagenation .= <<< EOM
			 </div>
EOM;
		}
		echo preg_replace('/(\t|\r\n|\r|\n)/s', '', $pagenation);
	}
}
}
