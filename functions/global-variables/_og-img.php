<?php
# -----------------------------------------------------------------
# OG画像をグローバル変数「$tsbk_ogimg」に代入
# -----------------------------------------------------------------
function tsbk_global_var_ogimg() {
	if(!is_admin()):

		/**
		 * グローバル変数を初期化
		 */
		global $tsbk_ogimg;

		//フロントページのアイキャッチ画像をグローバルのOG画像とする
		$frontID = get_option( 'page_on_front' );
		$front_featured_id = get_post_thumbnail_id($frontID);
		$front_featured_img = $front_featured_id
							? wp_get_attachment_image_src($front_featured_id, 'large')
							: [ null , null , null];

		if( is_front_page() ) {
			$tsbk_ogimg = $front_featured_img;
		} elseif ( is_single() || is_page() ) {
			if ( get_post_thumbnail_id( get_the_ID() ) ) {
				$tsbk_ogimg = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) , 'large' )
							? wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) , 'large' )
							: [ null , null , null ];
			} else {
				$tsbk_ogimg = $front_featured_img;
			}
		} else {
			$tsbk_ogimg = $front_featured_img;
		}
	endif;
}
add_action( 'template_redirect' , 'tsbk_global_var_ogimg' , 10 , 2 );
