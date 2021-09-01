<?php
# -----------------------------------------------------------------
# Gutenbergの制御
# -----------------------------------------------------------------

if(!function_exists('tsbk_custom_allowed_block_types')) {
    function tsbk_custom_allowed_block_types( $allowed_block_types ) {
        /**
         * front-page.phpにおける使用可能なブロックを制限
         */
        if(basename( get_page_template() )  == "front-page.php") {
            $allowed_block_types = array(
                'core/gallery',
                'core/paragraph',
                'core/heading',
                'core/image',
                'core/columns',
                'core/separator'
            );
        }
        return $allowed_block_types;
    }
}
add_filter( 'allowed_block_types_all', 'tsbk_custom_allowed_block_types' );
