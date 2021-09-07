<?php
	global $tsbk_post_type;
	$recent_args = array(
		"post_type" => $tsbk_post_type,
		'posts_per_page'=> 5
	);
	$recent_posts = get_posts($recent_args);
?>
<?php if($recent_posts):?>
<div class="p-sidebar">
<p class="p-sidebar-heading">最近の記事</p>
<ul class="p-sidebar-list">
<?php foreach($recent_posts as $recent_post):?>
<li class="p-sidebar-list__item"><a href="<?php echo get_the_permalink($recent_post->ID);?>"><?php echo get_the_title($recent_post->ID);?></a></li>
<?php endforeach;?>
</ul>
</div>
<?php endif;?>
