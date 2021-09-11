<?php
# -----------------------------------------------------------------
# Gutenbergの制御
# -----------------------------------------------------------------

if(!function_exists('tsbk_custom_allowed_block_types')) {
    function tsbk_custom_allowed_block_types( $allowed_block_types , $block_editor_context) {
        /**
         * front-page.phpにおける使用可能なブロックを制限
         */
         if($block_editor_context->post->post_name === "home") {
            $allowed_block_types = array(
                'core/gallery',
                'core/paragraph',
                'core/heading',
                'core/image',
                'core/columns',
                'core/separator',
                'core/latest-posts'
            );
        }
        return $allowed_block_types;
    }
}
add_filter( 'allowed_block_types_all', 'tsbk_custom_allowed_block_types' , 10, 2);
