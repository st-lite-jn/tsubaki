<?php
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'tsbk-block-style', get_template_directory_uri() . '/functions/custom-blocks/block.css' );
});
add_action( 'enqueue_block_editor_assets', function() {
	wp_enqueue_style( 'tsbk-block-style', get_template_directory_uri() . '/functions/custom-blocks/block.css' );
	wp_enqueue_script( 'tsbk-block-script', get_template_directory_uri() . '/functions/custom-blocks/block.js', [], false, true );
} );
