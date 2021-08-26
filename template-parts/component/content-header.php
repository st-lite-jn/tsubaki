<?php
	global $tsbk_title;
    $fearued_img = get_post_thumbnail_id(get_the_ID()) ? wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()) , 'large' , false, array('class'=>'')) : false;
?>

<section class="p-singular-ttl">
    <?php if($fearued_img):?>
    <?php echo $fearued_img;?>
    <?php endif;?>
    <h1 class="p-singular-ttl__label"><?php echo $tsbk_title["content-label"];?></h1>
    <?php if(is_single()):?>
      <p class="p-singular-ttl__lead"><?php echo get_the_time("Y.m.d"); ?></p>
      <?php
      	list($cat_terms,$tag_terms) = tsbk_get_pid_terms(get_the_ID());
      ?>
        <?php if($tag_terms):?>
				<ul class="c-content-header__tags">
				<?php foreach($tag_terms as $tag_term):?>
					<li class="c-content-header__tag"><a href="<?php echo get_tag_link($tag_term->term_id);?>"><?php echo $tag_term->name;?></a></li>
				<?php endforeach; ?>
				</ul>
			<?php endif;?>
    <?php endif; ?>
</section>
