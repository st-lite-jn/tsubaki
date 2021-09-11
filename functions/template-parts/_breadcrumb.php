<?php
//======================================================================
// クエリーに応じてパンくずリストを生成する関数
//======================================================================
if(!function_exists('tsbk_breadcrumb')):
function tsbk_breadcrumb($wp_obj = null) {

	// トップページでは何も出力しない
	if ( is_front_page() ) return false;

	// ウェブサイトのURL
	$home_url =  home_url();
	$dom_class = array(
		'container' => "p-breadcrumb",
		'parent' => "p-breadcrumb l-container",
		'child' => "p-breadcrumb__item",
		'item' => "p-breadcrumb",
	);
	//そのページのWPオブジェクトを取得
	$wp_obj = $wp_obj ?: get_queried_object();

	echo '<div class="p-breadcrumb-wrapper">'.
			'<nav class="p-breadcrumb l-container">'.
            '<a class="p-breadcrumb__item" href="'. home_url() .'">Home</a>';

	if(is_home()) {
		/**
		* 投稿のアーカイブ
		* $wp_obj : WP_Post
		*/
		echo '<b class="p-breadcrumb__item is-current">'. $wp_obj->post_title .'</b>';
	} elseif ( is_attachment() ) {
		/**
		* 添付ファイルページ ( $wp_obj : WP_Post )
		* ※ 添付ファイルページでは is_single() も true になるので先に分岐
		*/
		echo '<li><b class="is-current">'. $wp_obj->post_title .'</b>';

	} elseif ( is_single() ) {
        /**
        * 投稿ページ
        * $wp_obj : WP_Post
        */
        $post_id    = $wp_obj->ID;
        $post_type  = $wp_obj->post_type;
        $post_title = $wp_obj->post_title;

        echo '<a class="p-breadcrumb__item" href="'. get_post_type_archive_link( $post_type ) .'">'.
        get_post_type_object( $post_type )->label .
        '</a>';
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
			//カスタム投稿タイプ名の表示
			echo '<a class="p-breadcrumb__item" href="'. get_post_type_archive_link( $post_type ) .'">'. get_post_type_object( $post_type )->label .'</a>';
		} else {
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

							echo '<a class="p-breadcrumb__item" href="'. get_term_link( $parent_id, $the_tax ) .'">'.$parent_term->name.'</a>';
						}
					}

					// 最下層のタームを表示
					echo '<a class="p-breadcrumb__item" href="'. get_term_link( $term->term_id, $the_tax ). '">'. $term->name. '</a>';

				endif;
			}
		}

		// 投稿自身の表示
		echo '<b class="p-breadcrumb__item is-current">'. $post_title .'</b>';

	} elseif ( is_page() ) {
		/**
		 * 固定ページ
		 * $wp_obj : WP_Post
		 */

		// 親ページがあれば順番に表示
		if ( $wp_obj->post_parent !== 0 ) {
			$parent_array = array_reverse( get_post_ancestors( $wp_obj->ID) );
			foreach( $parent_array as $parent_id ) {
				echo '<a class="p-breadcrumb__item" href="'. get_permalink( $parent_id ).'">'.	get_the_title( $parent_id ).'</a>';
			}
		}
		// 投稿自身の表示
		echo '<b class="p-breadcrumb__item is-current">'.  $wp_obj->post_title .'</b>';
	} elseif ( is_date() ) {
		/**
		 * 日付アーカイブ
		 * $wp_obj : WP_Post_Type
		 */
		if(get_post_type() == "post") {
			$post_obj = get_post_type_object("post");
			echo '<a class="p-breadcrumb__item" href="'. get_post_type_archive_link("post").'">'. $post_obj->label .'</a>';
		} else {
			echo '<a class="p-breadcrumb__item" href="/'.$wp_obj->rewrite["slug"].'">'. $wp_obj->label .'</a>';
		}
		$year  = get_query_var('year');
		$month = get_query_var('monthnum');
		$day   = get_query_var('day');
		if ( $day !== 0 ) {
			//日別アーカイブ
			echo '<a class="p-breadcrumb__item" href="'. get_year_link( $year ).'">'. $year .'年</a>'.
					'<a class="p-breadcrumb__item" href="'. get_month_link( $year, $month ). '">'. $month .'月</a>'.
					'<b class="p-breadcrumb__item is-current">'. $day .'日</b>';

		} elseif ( $month !== 0 ) {
			//月別アーカイブ
			echo '<b class="p-breadcrumb__item is-current">'.$year.'年'.$month.'月</b>';

		} else {
			//年別アーカイブ
			echo '<b class="p-breadcrumb__item is-current">'.$year.'年</b>';
		}
	} elseif ( is_author() ) {
		/**
		 * 投稿者アーカイブ
		 * $wp_obj : WP_User
		 */
		echo '<b class="p-breadcrumb__item is-current">'. $wp_obj->display_name .' の執筆記事</b>';
	} elseif ( is_tax() || is_category() || is_tag()) {
		/**
		 * カテゴリーアーカイブ・タクソノミーアーカイブ・タグアーカイブ
		 * $wp_obj : WP_Term
		 */
		$term_id   = $wp_obj->term_id;
		$term_name = $wp_obj->name;
		$tax_name  = $wp_obj->taxonomy;
		$post_type = get_post_type();
		echo '<a class="p-breadcrumb__item" href="'. get_post_type_archive_link( $post_type ) .'">'.
				get_post_type_object( $post_type )->label .
			'</a>';
		// 親ターム（カテゴリー）があれば順番に表示
		if ( $wp_obj->parent !== 0 ) {
			$parent_array = array_reverse( get_ancestors( $term_id, $tax_name ) );
			foreach( $parent_array as $parent_id ) {
				$parent_term = get_term( $parent_id, $tax_name );
				echo '<a class="p-breadcrumb__item href="'. get_term_link( $parent_id, $tax_name ) .'">'.$parent_term->name .'</a>';
			}
		}
		// ターム自身の表示
		echo '<b class="p-breadcrumb__item is-current">'. $term_name .'</b>';
	} elseif ( is_archive() ) {
		/**
		 * アーカイブ ( $wp_obj : WP_Term )
		 */
		echo '<b class="p-breadcrumb__item is-current">'. $wp_obj->label .'</b>';
	} elseif ( is_search() ) {
		/**
		 * 検索結果ページ
		 */
		echo '<b class="p-breadcrumb__item is-current">検索結果:'. get_search_query() .'</b>';
	} elseif ( is_404() ) {
		/**
		 * 404ページ
		 */
		echo '<b class="p-breadcrumb__item is-current">404 Not Found</b>';

	} else {
		/**
		 * その他のページ（無いと思うが一応）
		 */
		echo '<b class="p-breadcrumb__item is-current">'. get_the_title() .'</b>';
	}

	echo '</nav>
        </div>';  // 冒頭に合わせて閉じタグ
}
endif;
