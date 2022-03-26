<?php
# -----------------------------------------------------------------
# スタイルシートの登録
# -----------------------------------------------------------------
function tsbk_enqueue_styles() {

	//テーマのバージョンを取得
	$theme_version = wp_get_theme() -> get( 'Version' );

	/**
	 * Google Web Fonts
	 */
	wp_enqueue_style( 'tsbk-google-fonts' , 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap' , array() , null , 'all');
	wp_enqueue_style( 'tsbk-google-icons' , 'https://fonts.googleapis.com/icon?family=Material+Icons%7CMaterial+Icons+Outlined&display=swap' , array() , null , 'all');

	/**
	 * style.cssを登録
	 */
	wp_enqueue_style( 'tsbk-style' , get_theme_file_uri() . "/assets/css/style.css" , array() , $theme_version , 'all');
}
add_action('wp_enqueue_scripts' , 'tsbk_enqueue_styles' );

# -----------------------------------------------------------------
# スタイルシートのブロック
# -----------------------------------------------------------------
function tsbk_deregister_styles() {
	wp_deregister_style('wp-mediaelement');
	wp_deregister_script('mediaelement');
}
add_action('wp_enqueue_scripts','tsbk_deregister_styles', 1);

