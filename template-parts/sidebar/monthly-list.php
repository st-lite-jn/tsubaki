<?php
	global $tsbk_post_type;
	$monthly_format = wp_get_archives(
		array(
			'type' => "monthly",
			'post_type' => $tsbk_post_type,
			'limit' => '',
			'format'=>'html',
			'before' => '',
			'after'  => '',
			'echo' => false,
			"show_count" => 0,
		)
	);
	$monthly_format = str_replace('<li>','<li class="l-sidebar-list__item">',$monthly_format);
?>
<div class="l-sidebar">
	<p class="l-sidebar__heading">月別アーカイブ</p>
	<ul class="l-sidebar-list">
		<?php echo $monthly_format;?>
	</ul>
</div>
