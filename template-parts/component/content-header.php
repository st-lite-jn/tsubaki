<?php
	global $tsbk_title;
?>
<section class="c-content-header">
  <div class="l-container">
    <h1 class="c-content-header__ttl"><?php echo $tsbk_title["content-label"];?></h1>
    <?php if(is_single()):?>
      <p class="c-content-header__lead"><?php echo get_the_time("Y.m.d"); ?></p>
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
    </div>
</section>
