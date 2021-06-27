<?php
function tsbk_custom_post_type_template(){
	$labels = array(
		"name" =>"テンプレート",
		"singular_name" => "テンプレート"
	);
	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		'menu_position' => 5,
		"rewrite" => array(
			"slug" => "template",
			"with_front" => false
		),
		"query_var" => true,
		"show_in_rest" => true,
		'supports' => array('title','editor','thumbnail','excerpt','revisions')
	);
	register_post_type( "template", $args );
}
//add_action( 'init', 'tsbk_custom_post_type_template');
