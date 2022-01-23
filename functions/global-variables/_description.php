<?php
# -----------------------------------------------------------------
# 表示しているページのディスクリプション
# -----------------------------------------------------------------
function tsbk_global_var_desc() {

	//独自に定義したグローバル変数を定義
	global $tsbk_post_type;

	global $tsbk_description;

	//フロントページ
	if( is_front_page() ) {
		$tsbk_description = get_bloginfo( 'description' )
						  ? preg_replace( '/(\t|\r\n|\r|\n)/s' , '' , get_bloginfo('description') )
						  : null;
	//固定ページ・個別ページ
	} elseif( is_page() || is_single() ) {
		$tsbk_description = get_the_excerpt()
						  ? preg_replace( '/(\t|\r\n|\r|\n)/s' , '', get_the_excerpt() )
						  : null;
	//カテゴリー・タグ・カスタムタクソノミー
	} elseif( is_category() || is_tag() || is_tax() ) {
		$obj = get_queried_object();
		$tsbk_description = $obj->description
						  ? preg_replace( '/(\t|\r\n|\r|\n)/s' , '' , $obj->description )
						  : null;
	//それ以外のアーカイブ
	} elseif ( is_archive() ) {
		$obj = get_post_type_object( $tsbk_post_type );
		$tsbk_description = get_the_post_type_description($obj->description);
	}
}
add_action( 'template_redirect' , 'tsbk_global_var_desc' );
