<?php
	/**
	 * タイトルの取得
	 */
	global $tsbk_title;

	/**
	 * アイキャッチ画像の取得
	 */
	$args_featured = [
		'class' => 'p-content-header-visual__img',
		'loading'=>'auto',
		'decoding'=>'async'
	];
	$featured_img = !is_404() && !is_archive() && !is_home() && get_post_thumbnail_id( get_the_ID() )
				  ? wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()) , 'large' , false , $args_featured )
				  : false;
	/**
	 * 制作者名取得
	 */
	$author = false;
	if( is_singular() ) {
		$author = get_userdata($post->post_author);
	}
	/**
	 * カテゴリとタグの取得
	 */
	if(is_single()) {
		list($cat_terms,$tag_terms) = tsbk_get_pid_terms(get_the_ID());
	}
?>
<header class="p-content-header-wrapper">
	<div class="p-content-header <?php if($featured_img):?>is-featured-img<?php endif;?>">
		<section class="l-container">
			<h1 class="p-content-header__label u-dalay-fadein-up"><?php echo $tsbk_title['content-label']; ?></h1>
	<?php if(is_single()):?>
		<div class="p-content-header__meta u-mt--8 u-dalay-fadein-up">
			<time datetime="<?php echo get_the_time("Y-m-d"); ?>" class="p-content-header__meta__item is-published"><?php echo get_the_time("Y.m.d"); ?></time>
			<time datetime="<?php echo get_the_modified_date("Y-m-d"); ?>" class="p-content-header__meta__item is-modified"><?php echo get_the_modified_date("Y.m.d"); ?></time>
			<p class="p-content-header__meta__item is-author">
				<span><?php echo $author->display_name; ?></span>
			</p>
		</div>

		<?php if( isset($cat_terms) || isset($tag_terms) ):?>
			<div class="p-content-header__tax u-mt--8 u-dalay-fadein-up">
			<?php if( isset($cat_terms) ):?>
				<?php foreach($cat_terms as $cat_term):?>
				<a href="<?php echo get_tag_link($cat_term->term_id);?>" class="p-content-header__tax__item is-cat"><?php echo $cat_term->name;?></a>
				<?php break; endforeach; ?>
			<?php endif;?>
			<?php if(isset($tag_terms)):?>
				<?php foreach($tag_terms as $tag_term):?>
					<a href="<?php echo get_tag_link($tag_term->term_id);?>" class="p-content-header__tax__item is-tag <?php if($featured_img):?>is-featured-img<?php endif;?>"><?php echo $tag_term->name;?></a>
				<?php endforeach; ?>
			<?php endif;?>
			</div>
		<?php endif;?>

	<?php endif;?>

	<?php if(is_page() && has_excerpt()):?>
		<div class="p-content-header__lead u-dalay-fadein-up">
		<p><?php echo get_the_excerpt();?></p>
		</div>
	<?php endif; ?>
		</section>
	</div>
	<?php if($featured_img):?>
	<figure class="p-content-header-visual">
		<?php echo $featured_img;?>
	</figure>
	<?php endif;?>
</header>
