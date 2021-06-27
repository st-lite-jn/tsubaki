<?php
# -----------------------------------------------------------------
# OG TYPEを返す関数
# -----------------------------------------------------------------
function tsbk_global_var_ogtype(){
	global $tsbk_ogtype;
	if(is_front_page()){
		$tsbk_ogtype = "website";
	} else {
		$tsbk_ogtype = "article";
	}
}
add_action( 'after_setup_theme' , 'tsbk_global_var_ogtype' );
