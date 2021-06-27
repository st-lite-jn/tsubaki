<?php
	$recent_args = array(
		"post_type" => tsbk_glb_cr_pt(),
		'posts_per_page'=> 5
	);
	$recent_posts = get_posts($recent_args);
?>
<?php if($recent_posts):?>
<div class="c-sidebar">
<p class="c-sidebar__heading">最近の記事</p>
<ul class="c-sidebar-list">
<?php foreach($recent_posts as $recent_post):?>
<li class="c-sidebar-list__item"><a href="<?php echo get_the_permalink($recent_post->ID);?>"><?php echo get_the_title($recent_post->ID);?></a></li>
<?php endforeach;?>
</ul>
</div>
<?php endif;?>
