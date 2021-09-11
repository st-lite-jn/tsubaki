<?php
# -----------------------------------------------------------------
# スタイルシートの登録
# -----------------------------------------------------------------
function tsbk_enqueue_styles() {
	/**
	 * CDNから取得するCSSを登録
	 * ress@4.0.0
	 * swiper@6.7.0
	 */
	wp_enqueue_style( 'tsbk-bundle' , 'https://cdn.jsdelivr.net/combine/npm/ress@4.0.0,npm/swiper@6.7.0/swiper-bundle.min.css,npm/@highlightjs/cdn-assets@11.2.0/styles/default.min.css' );
	/**
	 * wp-block-libraryを登録
	 */
	wp_deregister_style( 'wp-block-library' );
	wp_register_style( 'wp-block-library' , false);
	wp_enqueue_style( 'wp-block-library');
	wp_add_inline_style( 'wp-block-library' , file_get_contents( ABSPATH .'wp-includes/css/dist/block-library/style.min.css'));
	/**
	 * style.cssを登録
	 */
	wp_register_style( 'tsbk-style' , false);
	wp_enqueue_style( 'tsbk-style' );
	wp_add_inline_style( 'tsbk-style', file_get_contents( TEMPLATEPATH .'/assets/css/style.css'));
}
add_action('wp_enqueue_scripts' , 'tsbk_enqueue_styles' );
