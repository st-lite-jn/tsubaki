<?php
/**
 * デフォルトのスタイルを無効化するJSの読み込み
 */


function tsbk_unregister_blocks () {
	wp_enqueue_script(
		'tsbk-unregister-blocks',
		get_theme_file_uri() . '/functions/block-styles/unregister-blocks.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' )
	);
}
add_action( 'enqueue_block_editor_assets', 'tsbk_unregister_blocks');
