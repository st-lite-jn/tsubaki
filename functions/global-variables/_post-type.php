<?php
# -----------------------------------------------------------------
# 現在表示中のコンテンツのポストタイプ名を取得する関数
# -----------------------------------------------------------------
function tsbk_global_var_post_type(){
	global $tsbk_post_type;
	$tsbk_post_type = get_query_var( 'post_type' );
	//get_query_varで取得できない場合はget_post_type関数で取得
	$tsbk_post_type = $tsbk_post_type ? $tsbk_post_type : get_post_type();
}
add_action( 'template_redirect' , 'tsbk_global_var_post_type' , 1 , 1 );
