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


		$wp_customize -> add_setting(
			'tsbk_setting_color-main',
			array(
			  'default'           => '',
			  'priority'          => 1000,
			  'sanitize_callback' => 'sanitize_hex_color'
			)
		  );
		  $wp_customize->add_control(
			new WP_Customize_Color_Control(
			  $wp_customize,
			  'tsbk_control_color-main',
			  array(
				'section'     => 'tsbk_section_color',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_setting_color-main',  // 紐づける設定IDを指定
				'label'       => 'メインカラー',
				'description' => ''
			  )
			)
		);
		$wp_customize -> add_setting(
			'tsbk_setting_color-main-font',
			array(
				'default'           => '',
				'priority'          => 1100,
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);

		$wp_customize -> add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'tsbk_control_color-main-font',
				array(
				'section'     => 'tsbk_section_color',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_setting_color-main-font',  // 紐づける設定IDを指定
				'label'       => 'メインフォントカラー',
				'description' => ''
				)
			)
		);

		$wp_customize -> add_setting(
			'tsbk_setting_color-acc',
			array(
				'default'           => '',
				'priority'          => 1000,
				'sanitize_callback' => 'sanitize_hex_color'
			)
			);
			$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'tsbk_control_color-acc',
				array(
				'section'     => 'tsbk_section_color',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_setting_color-acc',  // 紐づける設定IDを指定
				'label'       => 'アクセントカラー',
				'description' => ''
				)
			)
		);

		$wp_customize -> add_setting(
			'tsbk_setting_color-acc-font',
			array(
				'default'           => '',
				'priority'          => 1100,
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize -> add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'tsbk_control_color-acc-font',
				array(
				'section'     => 'tsbk_section_color',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_setting_color-acc-font',  // 紐づける設定IDを指定
				'label'       => 'アクセントフォントカラー',
				'description' => ''
				)
			)
		);

		$wp_customize -> add_setting(
			'tsbk_setting_color-sub',
			array(
				'default'           => '',
				'priority'          => 1000,
				'sanitize_callback' => 'sanitize_hex_color'
			)
			);
			$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'tsbk_control_color-sub',
				array(
				'section'     => 'tsbk_section_color',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_setting_color-sub',  // 紐づける設定IDを指定
				'label'       => 'サブカラー',
				'description' => ''
				)
			)
		);

		$wp_customize -> add_setting(
			'tsbk_setting_color-sub-font',
			array(
				'default'           => '',
				'priority'          => 1100,
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize -> add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'tsbk_control_color-sub-font',
				array(
				'section'     => 'tsbk_section_color',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_setting_color-sub-font',  // 紐づける設定IDを指定
				'label'       => 'サブフォントカラー',
				'description' => ''
				)
			)
		);

		$wp_customize -> add_setting(
			'tsbk_setting_color-link',
			array(
				'default'           => '',
				'priority'          => 1000,
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'tsbk_control_color-link',
				array(
				'section'     => 'tsbk_section_color',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_setting_color-link',  // 紐づける設定IDを指定
				'label'       => 'リンクカラー',
				'description' => ''
				)
			)
		);

		$wp_customize -> add_setting(
			'tsbk_setting_color-border',
			array(
				'default'           => '',
				'priority'          => 1000,
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'tsbk_control_color-border',
				array(
				'section'     => 'tsbk_section_color',  // 紐づけるセクションIDを指定
				'settings'    => 'tsbk_setting_color-border',  // 紐づける設定IDを指定
				'label'       => 'ボーダーカラー',
				'description' => ''
				)
			)
		);

		/**
		 * テキスト設定
		 */
		$wp_customize -> add_section (
		'tsbk_section_txt',
			array(
				'title'    => 'テキスト設定',
				'panel'    => 'tsbk_general',
				'priority' => 1,
			)
		);
		$wp_customize->add_setting(
			'tsbk_setting_copyright', // 設定ID
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
			  'settings'    => 'tsbk_setting_copyright',  // 紐づける設定IDを指定
			  'label'       => 'コピーライト',
			  'description' => 'コピーライトを入力',
			  'type'        => 'text'
			)
		);
	}
}
add_action( 'customize_register', 'tsbk_tc_general' );


/**
 * 一般設定のカラー設定を格納する関数
 */
if( !function_exists( 'tsbk_tc_custom_color_style' ) ):
function tsbk_tc_custom_color_style( ) {
	$cutom_color_style = false;
	if(
		!empty( get_theme_mod( 'tsbk_setting_color-base' ) )
		|| !empty( get_theme_mod( 'tsbk_control_color-base-font' ) )
		|| !empty( get_theme_mod( 'tsbk_setting_color-main' ) )
		|| !empty( get_theme_mod( 'tsbk_setting_color-main-font' ) )
		|| !empty( get_theme_mod( 'tsbk_setting_color-acc' ) )
		|| !empty( get_theme_mod( 'tsbk_setting_color-acc-font' ) )
		|| !empty( get_theme_mod( 'tsbk_setting_color-sub' ) )
		|| !empty( get_theme_mod( 'tsbk_setting_color-sub-font' ) )
		|| !empty( get_theme_mod( 'tsbk_setting_color-link' ) )
		|| !empty( get_theme_mod( 'tsbk_setting_color-border' ) )
	):
		$colors = [
			"base" => get_theme_mod( 'tsbk_setting_color-base' ),
			"base-font" => get_theme_mod( 'tsbk_setting_color-base-font' ),
			"main" => get_theme_mod( 'tsbk_setting_color-main' ),
			"main-font" =>  get_theme_mod( 'tsbk_setting_color-main-font' ),
			"acc" => get_theme_mod( 'tsbk_setting_color-acc' ),
			"acc-font" => get_theme_mod( 'tsbk_setting_color-acc-font' ),
			"sub" => get_theme_mod( 'tsbk_setting_color-acc' ),
			"sub-font" => get_theme_mod( 'tsbk_setting_color-acc-font' ),
			"link" =>  get_theme_mod( 'tsbk_setting_color-link' ),
			"border" => get_theme_mod( 'tsbk_setting_color-border' )
		];

		$cutom_color_style .= "<style>:root{";
		if( !empty( $colors['base'] ) ){
			$cutom_color_style .= "	--tbk-color-base : {$colors['base']} ;";
		}
		if( !empty( $colors['base-font'] ) ) {
			$cutom_color_style .= "	--tbk-color-base-font : {$colors['base-font']} ;";
		}
		if( !empty( $colors['main'] ) ) {
			$cutom_color_style .= "	--tbk-color-main : {$colors['main']} ;";
		}
		if( !empty( $colors['main-font'] ) ) {
			$cutom_color_style .= "	--tbk-color-main-font : {$colors['main-font']} ;";
		}
		if( !empty( $colors['acc'] ) ) {
			$cutom_color_style .= "	--tbk-color-acc : {$colors['acc']} ;";
		}
		if( !empty( $colors['acc-font'] ) ) {
			$cutom_color_style .= "	--tbk-color-acc-font : {$colors['acc-font']} ;";
		}
		if( !empty( $colors['sub'] ) ) {
			$cutom_color_style .= "	--tbk-color-sub : {$colors['sub']} ;";
		}
		if( !empty( $colors['sub-font'] ) ) {
			$cutom_color_style .= "	--tbk-color-sub-font : {$colors['sub-font']} ;";
		}
		if( !empty( $colors['link'] ) ) {
			$cutom_color_style .= "	--tbk-color-link : {$colors['link']} ;";
		}
		if( !empty( $colors['border'] ) ) {
			$cutom_color_style .= "	--tbk-color-border : {$colors['border']} ;";
		}
		$cutom_color_style .= "}</style>";
	endif;
	echo $cutom_color_style;
}
endif;
add_action( 'wp_head', 'tsbk_tc_custom_color_style' );
add_action( 'admin_head', 'tsbk_tc_custom_color_style' );


