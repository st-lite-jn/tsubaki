<?php

/**
 * 出力するタイトルをカスタマイズ
 */
if(!function_exists( "tsbk_document_title" ) ){
	function tsbk_document_title($title){
		$post_type = get_post_type();
		$post_obj = get_post_type_object($post_type);

		//カスタム投稿タイプの個別ページの場合、タイトルにカスタム投稿タイプのラベルを追加する
		if(( is_single() ) && ( $post_obj->name !== "post" && $post_obj->name !== "page" ) ) {
			$title = $title + array("site-post-label" => $post_obj->label);
			krsort($title);
		}

		//テンプレートの種類ごとにタイトルを修正
		if ( is_home() || is_front_page() ) {
			$title['tagline'] = null;
		}

		//wp_head以外でのタイトルを修正
		if(!doing_action('wp_head')){
			$title['tagline'] = null;
			$title['site'] = null;
			if(is_archive() || is_single()) {
				$title['post-label'] = null;
			}
		}

		return $title;
	}
}
add_filter('document_title_parts','tsbk_document_title');

/*
タイトルのセパレーターを修正
*/
function tsbk_document_title_separator( $sep ) {
	$sep = ' | ';
	return $sep;
}
add_filter( 'document_title_separator', 'tsbk_document_title_separator' );
