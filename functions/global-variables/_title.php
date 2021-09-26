<?php
# -----------------------------------------------------------------
# タイトルを生成する関数
# -----------------------------------------------------------------
function tsbk_global_var_title() {
	global $tsbk_post_type;
	$wp_obj = get_queried_object();
	$post_type = $tsbk_post_type;

	//タイトルを格納する配列
	$ttl_arr = array();
	//タイトルの区切り文字指定
	$separator = " | ";
	/* タイトルタグに表示するコンテンツ名の順番
	* true ：　下階層 | 上階層 | サイト名
	* false : サイト名 | 上階層 : 下階層
	*/
	$reverse = true;

	//サイト名
	$site_name = get_bloginfo('name');
	//表示中のコンテンツ（ページ）の名称
	$content_name = "";

	//タイトルに作成してサイト名を追加
	$ttl_arr[] = $site_name;

	//テンプレートの種類に応じてコンテンツ名追加
	//トップページはサイト名がコンテンツ名になる
	//ページタイトルもサイト名のためタイトルの配列には何も追加しない
	if( is_front_page()) {
		$content_name = $site_name;
	//投稿トップページ
	}elseif(is_home()) {
		$ttl_arr[] =  $wp_obj->post_title;
		$content_name = $wp_obj->post_title;
	//404エラーページ
	} elseif(is_404()) {
		$ttl_arr[] = "404 Not Found";
		$content_name = "404 Not Found";
	} elseif(is_search()) {
        $searchLabel = "検索結果";
		/**
		* 検索結果ページ
		*/
        global $wp_query;
        if($wp_query->query['s']) {
            $searchLabel .= ":" . $wp_query->query['s'];
        }
		$ttl_arr[] = $searchLabel;
		$content_name = $searchLabel;
	} elseif ( is_single() ) {
		/**
		* 投稿ページ ( $wp_obj : WP_Post )
		*/
		$post_id    = $wp_obj->ID;
		$post_type  = $wp_obj->post_type;
		$post_title = $wp_obj->post_title;

		// カスタム投稿タイプかどうか
		if ( $post_type !== 'post' ) {
			$the_tax = "";  //そのサイトに合わせ、投稿タイプごとに分岐させて明示的に指定してもよい
			// 投稿タイプに紐づいたタクソノミーを取得 (投稿フォーマットは除く)
			$tax_array = get_object_taxonomies( $post_type, 'names');
			foreach ($tax_array as $tax_name) {
				if ( $tax_name !== 'post_format' ) {
					$the_tax = $tax_name;
					break;
				}
			}
			$ttl_arr[] =  get_post_type_object( $post_type )->label;

		} else {
			$ttl_arr[] = "更新履歴";
			$the_tax = 'category';  //通常の投稿の場合、カテゴリーを表示
		}
		// タクソノミーが紐づいていれば表示
		if ( $the_tax !== "" ) {
			$child_terms = array();   // 子を持たないタームだけを集める配列
			$parents_list = array();  // 子を持つタームだけを集める配列
			// 投稿に紐づくタームを全て取得
			$terms = get_the_terms( $post_id, $the_tax );
			if ( !empty( $terms ) ) {
				//全タームの親IDを取得
				foreach ( $terms as $term ) {
					$taxnomony_name = $term->taxonomy; //タクソノミー名を取得
					if ( $term->parent !== 0 ) $parents_list[] = $term->parent;
				}
				$tax = get_taxonomy($taxnomony_name);
				$tax_hierarchical = $tax->hierarchical;

				//親リストに含まれないタームのみ取得
				foreach ( $terms as $term ) {
					if ( ! in_array( $term->term_id, $parents_list ) ) $child_terms[] = $term;
				}
				if($tax_hierarchical): //タクソノミーが階層有りだったら表示
					// 最下層のターム配列から一つだけ取得
					$term = $child_terms[0];
					if ( $term->parent !== 0 ) {
						// 親タームのIDリストを取得
						$parent_array = array_reverse( get_ancestors( $term->term_id, $the_tax ) );

						foreach ( $parent_array as $parent_id ) {
							$parent_term = get_term( $parent_id, $the_tax );
							$ttl_arr[] = $parent_term->name;
						}
					}
					// 最下層のタームを表示
					$ttl_arr[] = $term->name;
				endif;
			}
		}
		$ttl_arr[] = $post_title;
		$content_name = $post_title;
	} elseif(is_page()) {
		/**
		* 固定ページ ( $wp_obj : WP_Post )
		*/
		$page_id    = $wp_obj->ID;
		$parents_ids = get_post_ancestors($page_id);
		$page_ttl_arr = array();
		if($parents_ids):
			foreach( $parents_ids as $parent_id ){
				$page_ttl_arr[] = get_post($parent_id)->post_title;
			}
			$page_ttl_arr = array_reverse($page_ttl_arr);
		endif;
		$ttl_arr = array_merge($ttl_arr,$page_ttl_arr);
		$ttl_arr[] = get_the_title();
		$content_name = get_the_title();
	} elseif(is_date()) {
		/**
		* 月別アーカイブ
		*/
		if($post_type !=="post") {
			$ttl_arr[] = $wp_obj->labels->name;
		} else {
			$ttl_arr[] = "更新履歴";
		}
		$year  = get_query_var('year');
		$month = get_query_var('monthnum');
		$day   = get_query_var('day');
		if ( $day !== 0 ) {
			$ttl_arr[] = $year.'年'.$month.'月'.$day . '日';
			$content_name = $year.'年'.$month.'月'.$day .'日';
		} elseif ( $month !== 0 ) {
			$ttl_arr[] =  $year . '年'.$month.'月';
			$content_name = $year . '年'.$month.'月';
		} else {
			$ttl_arr[] = $year . '年';
			$content_name = $year . '年';
		}
	} elseif(is_author()) {
		$ttl_arr[] = $wp_obj->data->display_name . "の記事";
		$content_name =$wp_obj->data->display_name . "の記事";
	} elseif(is_archive() || is_post_type_archive() || is_single() || is_tax()) {
		/**
		* その他アーカイブ
		*/
		if($post_type !== 'post') {
			$the_tax = "";
			$tax_array = get_object_taxonomies( $post_type, 'names');
			foreach ($tax_array as $tax_name) {
				if ( $tax_name !== 'post_format' ) {
					$the_tax = $tax_name;
					break;
				}
			}
		} else {
			$the_tax = 'category';  //通常の投稿の場合、カテゴリーを表示
		}
		if($post_type !=="post") {
			$ttl_arr[] = get_post_type_object($post_type)->labels->name;
		} else {
			$ttl_arr[] = "更新履歴";
		}
		if(is_tax() || is_category() || is_tag()) {
			$ttl_arr[] = $wp_obj->name;
			$content_name = $wp_obj->name;
		} elseif(is_archive()) {
			$content_name = $wp_obj->labels->name;
		}
	}

	if($reverse):
		$ttl_arr = array_reverse($ttl_arr);
	endif;

	if(is_array($ttl_arr)):
		$ttl_arr_lenght = count($ttl_arr);
		if($ttl_arr_lenght > 1):
			$title_tag = (implode($separator, $ttl_arr));
		else:
			$title_tag = $ttl_arr[0];
		endif;
	endif;
	global $tsbk_title;
	$tsbk_title = array(
		"site-name" => $site_name, //サイト名　tsbk_glb_ttl()["site-name"]
		"content-label" => $content_name, //表示中コンテンツの名前 tsbk_glb_ttl()["content-label"]
		"title-tag" => $title_tag, //タイトルタグ tsbk_glb_ttl()["title-tag"]
	);
}
add_action( 'template_redirect' , 'tsbk_global_var_title' );
