<?php
/*
* WP_Queryによるサムネイル付きのループテンプレート
* $the_query : WP_Queryオブジェクト
*/
?>
<div class="p-archive">
	<?php while ( $the_query->have_posts()) :$the_query->the_post(); ?>
	<?php
		$thumbnail = tsbk_get_featured_img(get_the_ID());
		//POST IDからタクソノミーを取得
		list($cat_terms,$tag_terms) = tsbk_get_pid_terms(get_the_ID());
	?>
	<article class="p-archive-article">
		<a href="<?php echo get_the_permalink(get_the_ID());?>">
			<figure class="p-archive-article__thumb"><img src="<?php echo $thumbnail["medium"];?>" width="<?php echo $thumbnail["medium-width"];?>" height="<?php echo $thumbnail["medium-height"];?>" alt="<?php echo $thumbnail["alt"];?>"></figure>
			<p class="p-archive-article__date">更新日：<?php echo get_the_time('Y.m.d',get_the_ID());?></p>
			<p class="p-archive-article__title"><?php echo get_the_title(get_the_ID());?></p>
			<p class="p-archive-article__description"><?php echo get_the_excerpt(get_the_ID());?></p>
		</a>
		<div class="p-archive-article__property">
			<?php if($cat_terms):?>
			<nav class="p-archive-article__property__cat">
			<?php foreach($cat_terms as $cat_term):?>
				<a href="<?php echo get_term_link($cat_term->term_id);?>"><?php echo $cat_term->name;?></a>
			<?php break; endforeach; ?>
			</nav>
			<?php endif;?>
		</div>
	</article>
<?php endwhile;wp_reset_postdata();?>
</div>

