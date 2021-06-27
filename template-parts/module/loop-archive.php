<?php
/*
* WP_Queryによるサムネイル無しのループテンプレート
* $the_query : WP_Queryオブジェクト
*/
?>
<ul class="p-simple-archive">
	<?php while ( $the_query->have_posts()) :$the_query->the_post(); ?>
	<?php
		list($cat_terms,$tag_terms) = tsbk_get_pid_terms(get_the_ID());
	?>
	<li class="p-simple-archive__item">
	<article class="p-simple-archive-article">
		<div class="p-simple-archive-article__date"><?php echo get_the_time('Y.m.d',get_the_ID());?></div>
		<?php if($cat_terms):?>
			<div class="p-simple-archive-article__cat"><a href="<?php echo get_category_link($cat_terms[0]);?>"><?php echo $cat_terms[0]->name;?></a></div>
		<?php endif;?>
		<div class="p-simple-archive-article__content">
			<p class="p-simple-archive-article__title"><a href="<?php echo get_the_permalink(get_the_ID());?>"><?php echo get_the_title(get_the_ID());?></a></p>
			<?php if($tag_terms):?>
				<ul class="p-simple-archive-article__tags">
				<?php foreach($tag_terms as $tag_term):?>
					<li class="p-simple-archive-article__tag"><a href="<?php echo get_tag_link($tag_term->term_id);?>"><?php echo $tag_term->name;?></a></li>
				<?php endforeach; ?>
				</ul>
			<?php endif;?>
		</div>
	</article>
	</li>
	<?php endwhile;wp_reset_postdata();?>
</ul>
