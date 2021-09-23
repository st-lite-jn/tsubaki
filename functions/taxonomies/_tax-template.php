<?php
# -----------------------------------------------------------------
#
# -----------------------------------------------------------------
function tsbk_register_tax_template() {
	$labels = array(
		"name" =>"カテゴリー",
		"singular_name" => "カテゴリー",
		'menu_name'     => 'カテゴリー'
	);
	$args = array(
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite_withfront"=>true,
		"rewrite_hierarchical" => true,
		"rewrite" => array(
			true,
			'slug' => 'cat',
			'with_front' => false
		),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "cat_template",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "cat_template", array( "template" ), $args );
}
// add_action( 'init', 'tsbk_register_tax_template' );
