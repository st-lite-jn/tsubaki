<?php
	global $tsbk_description;
	global $tsbk_ogtype;
	global $tsbk_title;
?>
<head>
<meta charset="<?php echo get_bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="<?php echo $tsbk_description;?>" />
<meta name="title" content="<?php echo $tsbk_title["title-tag"];?>" />
<meta property="og:site_name" content="<?php echo $tsbk_title["site-name"];?>" />
<meta property="og:title" content="<?php echo $tsbk_title["title-tag"];?>" />
<meta property="og:description" content="<?php echo $tsbk_description;?>" />
<meta property="og:type" content="<?php echo $tsbk_ogtype;?>" />
<meta name="twitter:description" content="<?php echo $tsbk_description;?>" />
<meta name="twitter:card" content="summary_large_image" />
<title><?php echo $tsbk_title["title-tag"];?></title>
<?php wp_head();?>
</head>
