<?php
# -----------------------------------------------------------------
# 記事投稿画面のカスタマイズ
# -----------------------------------------------------------------

/**
 * ブロックエディタ上のスタイルシートの読み込み
 */
add_theme_support( 'editor-styles' );
function tsbk_enqueue_block_editor_style() {
	wp_enqueue_style( 'tsbk-block-google-fonts' , 'https://fonts.googleapis.com/icon?family=Material+Icons%7CMaterial+Icons+Outlined' );
	wp_enqueue_style( 'tsbk-block-editor', get_stylesheet_directory_uri() . '/assets/css/editor.css');
}
add_action( 'enqueue_block_editor_assets', 'tsbk_enqueue_block_editor_style' );
