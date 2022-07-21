<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
</head>
<body <?php body_class("wp-body"); ?>>
<div id="wrapper">
	<header id="header" class="l-header ">
		<div class="c-container">
			<?php
				get_template_part( 'template-parts/header/logo');
				get_template_part( 'template-parts/header/utility' );
			?>
		</div>
		<?php
			get_template_part( 'template-parts/header/gnav' );
			get_search_form();
		?>
	</header>
	<main class="l-main">
