<?php 
//カスタムロゴの取得
$logo_img = has_custom_logo() ? wp_get_attachment_image_src( get_theme_mod( 'custom_logo') , 'full' ) : false;
