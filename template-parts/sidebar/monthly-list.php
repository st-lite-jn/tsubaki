
<?php
	$monthly_format = wp_get_archives(
		array(
			'type' => "monthly",
			'post_type' => tsbk_glb_cr_pt(),
			'limit' => '',
			'format'=>'html',
			'before' => '',
			'after'  => '',
			'echo' => false,
			"show_count" => 0,
		)
	);
	$monthly_format = str_replace('<li>','<li class="c-sidebar-list__item">',$monthly_format);
?>
<div class="c-sidebar">
	<p class="c-sidebar__heading">月別アーカイブ</p>
	<ul class="c-sidebar-list">
		<?php echo $monthly_format;?>
	</ul>
</div>
