<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
</head>
<body>
<div id="wrapper">
	<header id="header" class="l-header ">
		<div class="l-container">
			<?php
				include TEMPLATEPATH .'/template-parts/header/logo.php';
				include TEMPLATEPATH .'/template-parts/header/utility.php';
			?>
		</div>
		<?php require_once TEMPLATEPATH .'/template-parts/header/gnav.php'; ?>
		<?php get_search_form();?>
	</header>
	<main class="l-main">
