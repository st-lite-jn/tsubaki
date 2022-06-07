<?php
function tsbk_unresister_block_styles() {
	wp_enqueue_script(
					  'tsbk-unresister-block-styles'
					, get_template_directory_uri() . '/functions/unresister-block-styles/unresister-block-styles.js'
					, null
					, null
					, true
					);
}
add_action( 'enqueue_block_editor_assets', 'tsbk_unresister_block_styles' );
