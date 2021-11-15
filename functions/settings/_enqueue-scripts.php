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
/*
* デフォルトのjQueryを解除してbundle.jsを読み込む処理
*/
function tsbk_enqueue_script_jquery() {
	/**
	 * SiteGuard WP PluginでログインページのURLを変更している場合
	 * wp-login.php　及び　/wp-admin/にアクセスすると
	 * wp_deregister_scriptに対する警告が表示されるのを回避するための記述
	 */
	if( is_admin() || tsbk_is_login_page()) {
		wp_enqueue_script( 'jquery' );
		return;
	}
	wp_deregister_script( 'jquery' ); // デフォルトのjQueryを解除
	wp_register_script( 'jquery' , 'https://cdn.jsdelivr.net/combine/npm/jquery@3.6.0,npm/jquery-migrate@3.3.2' , array() , false , true ); // 代わりのファイルをフックさせる
	wp_enqueue_script( 'jquery' );
}

function tsbk_enqueue_script_main() {
	/**
	 * jQuery以外のCDNから取得するJavaScriptを登録
     * animejs@3.2.1
	 */
	wp_enqueue_script( 'tsbk-bundle' , 'https://cdn.jsdelivr.net/combine/npm/animejs@3.2.1', array() , false, true );
	/**
	 * main.jsの登録
	 */
	wp_register_script( 'tsbk-main' , false , array() , false , true);
	wp_enqueue_script( 'tsbk-main' );
	wp_add_inline_script( 'tsbk-main' , file_get_contents(TEMPLATEPATH . '/assets/js/main.js') );
}
function tsbk_enqueue_external_files() {
	tsbk_enqueue_script_jquery();
	tsbk_enqueue_script_main();
}
add_action('wp_enqueue_scripts' , 'tsbk_enqueue_external_files' );
