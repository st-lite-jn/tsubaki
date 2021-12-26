<?php
/*
* WP_Queryによるサムネイル付きのループテンプレート
* $the_query : WP_Queryオブジェクト
*/
?>
<div class="p-card-wrapper">
	<?php while ( $the_query->have_posts()) :$the_query->the_post(); ?>
	<?php
		//サムネイル画像を取得
		$thumbnail = get_post_thumbnail_id( get_the_ID()) ? wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ) , 'medium', false , array('class'=>'')) : false;
		//POST IDからタクソノミーを取得
		list($cat_terms,$tag_terms) = tsbk_get_pid_terms(get_the_ID());
	?>
	<a class="p-card" href="<?php echo get_the_permalink(get_the_ID());?>">
		<figure class="p-card__thumb <?php if(!$thumbnail) echo 'is-no-image'; ?>">
			<?php echo $thumbnail;?>
		</figure>
		<div class="p-card__body">
			<?php if($cat_terms):?>
				<?php foreach($cat_terms as $cat_term):?>
			<p class="c-label-cat"><?php echo $cat_term->name;?></p>
				<?php break; endforeach; ?>
			<?php endif;?>
			<p class="p-card__body__title"><?php echo get_the_title(get_the_ID());?></p>
			<div class="p-card__body__date">
				<time itemprop="dateCreated" datetime="<?php echo get_the_time("Y-m-d"); ?>">公開日 : <?php echo get_the_time("Y.m.d"); ?></time>
				<time itemprop="dateModified" datetime="<?php echo get_the_time("Y-m-d"); ?>">更新日 : <?php echo get_the_modified_date("Y.m.d"); ?></time>
			</div>
			<p class="p-card__body__txt"><?php echo get_the_excerpt(get_the_ID());?></p>
	</div>
	</a>
<?php endwhile;wp_reset_postdata();?>
</div>

