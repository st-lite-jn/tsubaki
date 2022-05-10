<?php
	/*
	* WP_Queryによるサムネイル付きのループテンプレート
	* $the_query : WP_Queryオブジェクト
	*/
?>
<div class="wp-block-query">
	<ul class="wp-block-post-template">
<?php while ( $the_query -> have_posts()) : $the_query -> the_post(); ?>
<?php
	//サムネイル画像を取得
	$thumbnail = get_post_thumbnail_id( get_the_ID()) ? wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ) , 'medium', false , array('class'=>'')) : false;

	if($thumbnail) {
		$thumbnail = '<figure class="wp-block-post-featured-image"><a href="' . get_the_permalink( get_the_ID() ) .'">'.$thumbnail.'</a></figure>';
	}

	//POST IDからタクソノミーを取得
	list($cat_terms,$tag_terms) = tsbk_get_pid_terms(get_the_ID());
?>
<li class="wp-block-post post type-post status-publish format-standard hentry category-uncategorized">
	<div class="wp-block-columns alignwide">
		<div class="wp-block-column is-thumbnail" style="flex-basis:25%"><?php echo $thumbnail;?></div>
		<div class="wp-block-column" style="flex-basis:75%">
			<div class="wp-block-group">
				<div class="wp-block-group__inner-container">
					<?php if(!is_search(  )):?>
					<div class="wp-block-post-date">
						<time datetime="<?php echo get_the_time("Y-m-d"); ?>"><?php echo get_the_time("Y.m.d"); ?></time>
					</div>
					<?php endif;?>
					<h2 class="wp-block-post-title">
						<a href="<?php echo get_the_permalink(get_the_ID());?>"><?php echo get_the_title( get_the_ID() );?></a>
					</h2>
					<div class="wp-block-post-excerpt">
						<p class="wp-block-post-excerpt__excerpt"><?php echo get_the_excerpt( get_the_ID() );?></p>
						<p class="wp-block-post-excerpt__more-text">
							<a class="wp-block-post-excerpt__more-link" href="<?php echo get_the_permalink( get_the_ID() );?>">続きを読む</a>
						</p>
					</div>
					<?php if(!is_search(  )):?>
					<div class="wp-block-columns">
						<?php if($cat_terms):?>
							<div class="wp-block-column" style="flex-basis:33.33%">
								<div class="taxonomy-category is-cat wp-block-post-terms">
									<?php foreach($cat_terms as $cat_term): ?>
										<a href="<?php echo get_term_link( $cat_term->term_id );?>" rel="tag"><?php echo $cat_term->name;?></a>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif;?>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</li>
<?php endwhile; wp_reset_postdata();?>
</ul>
</div>

