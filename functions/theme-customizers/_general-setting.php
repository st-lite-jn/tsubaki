<?php
if(!function_exists('tsbk_tc_general')) {
	function tsbk_tc_general( $wp_customize ) {
		$wp_customize -> add_panel(
			'tsbk_general',
			array(
				'title'    => '一般設定',
				'description' => 'サイトの共通で設定する項目',
				'priority' => 30,
			)
		);

		$wp_customize -> add_section (
		'tsbk_section_color',
			array(
				'title'    => 'カラー設定',
				'panel'    => 'tsbk_general',
				'priority' => 1,
			)
		);

		$wp_customize -> add_setting(
			'tsbk_header_logo' ,
			array(
				'default' => get_theme_mod('tsbk_header_logo'),
				'priority' => 100,
				'sanitize_callback' => 'esc_url_raw'
			)
		);
		// $wp_customize -> add_control(
		// 	new WP_Customize_Image_Control(
		// 		$wp_customize,
		// 		'tsbk_control_header_logo',
		// 		array(
		// 			'section'  => 'tsbk_section_color',
		// 			'settings' => 'tsbk_header_logo',
		// 			'label'    => '画像アップロード',
		// 			'description' => 'ロゴ画像をアップロード'
		// 		)
		// 	)
		// );

		$wp_customize -> add_setting(
			'tsbk_setting_color-base',
			array(
			  'default'           => '',
			  'priority'          => 1000,
			  'sanitize_callback' => 'sanitize_hex_color'
			)
		  );
		  $wp_customize->add_control(
			new WP_Customize_Color_Control(
			  $wp_customize,
			  'tsbk_control_color-base',
			  array(
				'section'     => 'tsbk_section_color',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_setting_color-base',  // 紐づける設定IDを指定
				'label'       => 'ベースカラー',
				'description' => ''
			  )
			)
		);

		$wp_customize -> add_setting(
			'tsbk_setting_color-base-font',
			array(
			  'default'           => '',
			  'priority'          => 1100,
			  'sanitize_callback' => 'sanitize_hex_color'
			)
		  );
		  $wp_customize -> add_control(
			new WP_Customize_Color_Control(
			  $wp_customize,
			  'tsbk_control_color-base-font',
			  array(
				'section'     => 'tsbk_section_color',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_setting_color-base-font',  // 紐づける設定IDを指定
				'label'       => 'ベースフォントカラー',
				'description' => ''
			  )
			)
		);


		$wp_customize -> add_section (
		'tsbk_section_txt',
			array(
				'title'    => 'テキスト設定',
				'panel'    => 'tsbk_general',
				'priority' => 1,
			)
		);
		$wp_customize->add_setting(
			'tsbk_seeting_copyright', // 設定ID
			array(
				'default' => '',
				'priority' => 1000,
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control(
			'tsbk_control_copyright',
			array(
			  'section'     => 'tsbk_section_txt',  // 紐づけるセクションIDを指定
			  'settings'    => 'tsbk_seeting_copyright',  // 紐づける設定IDを指定
			  'label'       => 'コピーライト',
			  'description' => 'コピーライトを入力',
			  'type'        => 'text'
			)
		);
	}
}
add_action( 'customize_register', 'tsbk_tc_general' );




