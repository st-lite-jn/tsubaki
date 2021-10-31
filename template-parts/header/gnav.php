
<nav id="gnav" class="l-gnav" role="navigation">
<?php
	wp_nav_menu(
		array(
		'theme_location' => 'global_navigation',
		'menu'=>'Global Navigation',
		'container' => false,
		'container_id' => false,
		'menu_class'=>"l-gnav-main",
		'fallback_cb' => 'tsbk_empty_menu',
		'echo' => true,
		'depth' => 0,
		'walker'  => new Tsbk_Global_Nav_Menu,
		'items_wrap' => '<ul class="%2$s">%3$s</ul>',
		)
	);
?>
</nav>
