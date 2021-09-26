<?php
# -----------------------------------------------------------------
# リダイレクト処理の制御
# -----------------------------------------------------------------

/**
 *　意図しないリダイレクトを行わなくする
 */
remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );

/**
 *　投稿者アーカイブ非表示リダイレクト
 */
// function tsbk_author_archive_redirect() {
// 	if( is_author() ) {
// 		wp_redirect( home_url());
// 		exit;
// 	}
//  }
//  add_action( 'template_redirect', 'tsbk_author_archive_redirect' );

/**
 *　存在しないURLを自動的に補完する処理を無効化
 */
function tsbk_disable_complement( $redirect_url ) {
	if( is_404() ) {
		return false;
	}
	return $redirect_url;
}
add_filter( 'redirect_canonical', 'tsbk_disable_complement' );
