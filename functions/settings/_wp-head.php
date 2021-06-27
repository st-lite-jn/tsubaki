<?php
# -----------------------------------------------------------------
# wp_head関数が生成するメタ情報の制御やカスタマイズ
# -----------------------------------------------------------------

/*
* 絵文字のDNS Prefetchを削除
*/
add_filter( 'emoji_svg_url', '__return_false');

/*
* 不要なhead要素を削除
*/
remove_action('wp_head', 'wp_generator');// WordPressのバージョン
remove_action('wp_head', 'wp_shortlink_wp_head');// 短縮URLのlink
remove_action('wp_head', 'wlwmanifest_link');// ブログエディターのマニフェストファイル
remove_action('wp_head', 'rsd_link');// 外部から編集するためのAPI（XML-RPC)へのパス
remove_action('wp_head', 'feed_links_extra', 3);// フィードへのリンク
remove_action('wp_head', 'print_emoji_detection_script', 7);// 絵文字に関するJavaScript
remove_action('wp_head', 'rest_output_link_wp_head'); //引用表示（埋め込み）関連のコード
remove_action('wp_head', 'wp_oembed_add_discovery_links');//引用表示（埋め込み）関連のコード
remove_action('wp_head', 'wp_oembed_add_host_js'); //引用表示（埋め込み）関連のコード
remove_action('wp_print_styles', 'print_emoji_styles');// 絵文字に関するCSS
remove_action('admin_print_scripts', 'print_emoji_detection_script');// 絵文字に関するJavaScript(管理画面)
remove_action('admin_print_styles', 'print_emoji_styles');// 絵文字に関するCSS(管理画面)
