<?php
# -----------------------------------------------------------------
# スタイルシートの登録
# -----------------------------------------------------------------
function tsbk_enqueue_styles() {
	/**
	 * Google Fonts
	 */
	wp_enqueue_style( 'tsbk-googlefonts' , 'https://fonts.googleapis.com/icon?family=Material+Icons%7CMaterial+Icons+Outlined&display=swap' );

	/**
	 * style.cssを登録
	 */
	wp_enqueue_style( 'tsbk-style' , get_theme_file_uri()."/assets/css/style.css" );
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

