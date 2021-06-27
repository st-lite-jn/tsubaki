<?php
	$prev_post = get_previous_post();
	$next_post = get_next_post();
?>
<?php if($prev_post || $next_post):?>
<nav class="p-prev-next">
	<?php if ($prev_post):?>
	<a href="<?php echo get_the_permalink($prev_post->ID);?>" rel="prev" class="p-prev-next__item">前の記事</a>
	<?php endif;?>
	<?php if ($next_post):?>
	<a href="<?php echo get_the_permalink($next_post->ID);?>" rel="next" class="p-prev-next__item">次の記事</a>
	<?php endif;?>
</nav>
<?php endif;?>
