<?php
if(!function_exists('tsbk_tc_general')) {
	function tsbk_tc_general( $wp_customize ) {
		$wp_customize -> add_panel(
			'tsbk_general',
			array(
				'title'    => '一般設定',
				'description' => 'サイトの共通で設定する項目です。',
				'priority' => 30,
			)
		);

		$wp_customize -> add_section (
		'tsbk_visual_section',
			array(
				'title'    => 'ビジュアル設定',
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
		$wp_customize -> add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'tsbk_control_header_logo',
				array(
					'section'  => 'tsbk_visual_section',
					'settings' => 'tsbk_header_logo',
					'label'    => '画像アップロード',
					'description' => 'ロゴ画像をアップロード'
				)
			)
		);


		$wp_customize->add_setting(
			'tsbk_header-bgcolor',
			array(
			  'default'           => '',
			  'priority'          => 1000,
			  'sanitize_callback' => 'sanitize_hex_color'
			)
		  );
		  $wp_customize->add_control(
			new WP_Customize_Color_Control(
			  $wp_customize,
			  'tsbk_control_header-bgcolor',
			  array(
				'section'     => 'tsbk_visual_section',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_header-bgcolor',  // 紐づける設定IDを指定
				'label'       => 'ヘッダー背景色',
				'description' => ''
			  )
			)
		);
		$wp_customize->add_setting(
			'tsbk_header-color',
			array(
			  'default'           => '',
			  'priority'          => 1100,
			  'sanitize_callback' => 'sanitize_hex_color'
			)
		  );
		  $wp_customize->add_control(
			new WP_Customize_Color_Control(
			  $wp_customize,
			  'tsbk_control_header-color',
			  array(
				'section'     => 'tsbk_visual_section',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_header-color',  // 紐づける設定IDを指定
				'label'       => 'ヘッダーフォントカラー',
				'description' => ''
			  )
			)
		);

		$wp_customize->add_setting(
			'tsbk_footer-bgcolor',
			array(
			  'default'           => '',
			  'priority'          => 1000,
			  'sanitize_callback' => 'sanitize_hex_color'
			)
		  );
		  $wp_customize->add_control(
			new WP_Customize_Color_Control(
			  $wp_customize,
			  'tsbk_control_footer-bgcolor',
			  array(
				'section'     => 'tsbk_visual_section',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_footer-bgcolor',  // 紐づける設定IDを指定
				'label'       => 'フッター背景色',
				'description' => ''
			  )
			)
		);
		$wp_customize->add_setting(
			'tsbk_footer-color',
			array(
			  'default'           => '',
			  'priority'          => 1100,
			  'sanitize_callback' => 'sanitize_hex_color'
			)
		  );
		  $wp_customize->add_control(
			new WP_Customize_Color_Control(
			  $wp_customize,
			  'tsbk_control_footer-color',
			  array(
				'section'     => 'tsbk_visual_section',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_footer-color',  // 紐づける設定IDを指定
				'label'       => 'フッターフォントカラー',
				'description' => ''
			  )
			)
		);



		

		$wp_customize -> add_section (
		'tsbk_txt_section',
			array(
				'title'    => 'テキスト設定',
				'panel'    => 'tsbk_general',
				'priority' => 1,
			)
		);

		$wp_customize->add_setting(
			'tsbk_copyright', // 設定ID
			array(
				'default' => '',
				'priority' => 1000,
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control(
			'tsbk_control_copyright',
			array(
			  'section'     => 'tsbk_txt_section',  // 紐づけるセクションIDを指定
			  'settings'    => 'tsbk_copyright',  // 紐づける設定IDを指定
			  'label'       => 'コピーライト',
			  'description' => '説明',
			  'type'        => 'text'
			)
		);
	}
}
add_action( 'customize_register', 'tsbk_tc_general' );




