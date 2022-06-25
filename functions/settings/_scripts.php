<?php
# -----------------------------------------------------------------
# JavaScriptの登録
# -----------------------------------------------------------------
/**
 * wp-login.php画面かどうかの判定する関数
 */
function tsbk_is_login_page() {
	return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

function tsbk_enqueue_scripts() {

	//テーマのバージョンを取得
	$theme_version = wp_get_theme() -> get( 'Version' );

	/**
	 * animejs@3.2.1
	 */
	wp_enqueue_script( 'tsbk-bundle' , 'https://cdn.jsdelivr.net/combine/npm/animejs@3.2.1', array() , $theme_version , true );

	/**
	 * main.jsの登録
	 */
	wp_enqueue_script( 'tsbk-main' , get_template_directory_uri() . '/assets/js/main.js' , array('tsbk-bundle') , $theme_version , true);

}

add_action('wp_enqueue_scripts' , 'tsbk_enqueue_scripts' );

/**
 * scriptの記述のリプレイス
 */
function tsbk_script_replace($tag, $handle) {
	/**
	 * tsbk-mainとwp-embedにdeferを追加
	 */

	if(	$handle !== 'tsbk-bundle' && $handle !== 'tsbk-main') return $tag;
	return str_replace(' src=', ' defer src=', $tag);
}
add_filter('script_loader_tag', 'tsbk_script_replace', 10, 2);
