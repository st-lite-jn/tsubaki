<?php
# -----------------------------------------------------------------
# 表示しているページのディスクリプション
# -----------------------------------------------------------------
function tsbk_global_var_desc() {
	$wp_obj = "";
	$wp_obj = $wp_obj ?: get_queried_object();
	global $tsbk_description;
	//固定ページまたはシングルページ
	if(is_front_page() && empty(get_the_excerpt()) ) {
		$tsbk_description = get_bloginfo('description') ? preg_replace('/(\t|\r\n|\r|\n)/s', '', get_bloginfo('description')) : null;
	}elseif(is_page() || is_single()) {
		$tsbk_description = get_the_excerpt() ? preg_replace('/(\t|\r\n|\r|\n)/s', '', get_the_excerpt()) : null;
	} elseif(is_category()) {
		$tsbk_description = $wp_obj->description ? preg_replace('/(\t|\r\n|\r|\n)/s', '', $wp_obj->description) : null;
	} elseif(is_tax()) {
		$tsbk_description = $wp_obj->description ? preg_replace('/(\t|\r\n|\r|\n)/s', '', $wp_obj->description) : null;
	} elseif ( is_archive() ) {
		$tsbk_description = get_bloginfo('description');
	}
}
add_action( 'template_redirect' , 'tsbk_global_var_desc' );
