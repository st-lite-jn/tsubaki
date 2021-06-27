<?php
	$fnav_args = array(
		'theme_location' => 'footer_navigation',
		'container' => 'nav',
		'container_class' => 'l-footer-nav',
		'container_id' => '',
		'menu'=>'Footer Navigation',
		'menu_id' => false,
		'fallback_cb' => 'tsbk_empty_menu',
		'items_wrap' => '%3$s',
		'echo'=> true,
		'depth' => 1,
		'walker'  => new Tsbk_Footer_Nav_Menu
	);
?>
<div class="l-footer-bottom">
	<div class="l-container">
	<?php wp_nav_menu($fnav_args); ?>
	</div>
</div>
