<?php
if(!function_exists("tsbk_widgets_init")) {
	function tsbk_widgets_init() {
		register_sidebar(
			array(
				'name' => __( 'サイドバーエリア', 'tsubaki' ),
				'id' => 'sidebar-widget',
				'description' => __( 'サイドバーエリアのウィジェットです。', 'tsubaki' ),
				'before_widget' => '',
				'after_widget'  => '',
			)
		);
	}
}

add_action( 'widgets_init', 'tsbk_widgets_init' );
