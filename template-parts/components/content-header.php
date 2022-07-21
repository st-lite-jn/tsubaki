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
	$featured_img = false;
	if( is_home() && get_post_thumbnail_id( get_option( 'page_for_posts' ) ) ) {
		$featured_img = wp_get_attachment_image( get_post_thumbnail_id( get_option( 'page_for_posts' ) ) , 'large' , false , $args_featured );
	}else if (!is_404() && !is_archive() && get_post_thumbnail_id( get_the_ID() )) {
		$featured_img = wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()) , 'large' , false , $args_featured );
	} else {
		$featured_img = false;
	}
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
<header class="p-content-header-wrapper <?php if($featured_img):?>is-featured-img<?php endif;?>">
	<div class="p-content-header <?php if($featured_img):?>is-featured-img<?php endif;?>">
		<section class="c-container">
			<h1 class="p-content-header__label is-target u-fadein-up"><?php echo $tsbk_title['content-label']; ?></h1>
	<?php if(is_single()):?>
		<div class="p-content-header__meta u-mt--8 is-target u-fadein-up">
			<time datetime="<?php echo get_the_time("Y-m-d"); ?>" class="p-content-header__meta__item is-published"><?php echo get_the_time("Y.m.d"); ?></time>
			<time datetime="<?php echo get_the_modified_date("Y-m-d"); ?>" class="p-content-header__meta__item is-modified"><?php echo get_the_modified_date("Y.m.d"); ?></time>
			<p class="p-content-header__meta__item is-author">
				<span><?php echo $author->display_name; ?></span>
			</p>
		</div>

		<?php if( isset($cat_terms) || isset($tag_terms) ):?>
			<div class="p-content-header__tax u-mt--8 is-target u-fadein-up">
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
		<div class="p-content-header__lead is-target u-fadein-up">
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
<?php if ( is_active_sidebar( 'singular-title-widget' ) ):?>
<div class="wp-front-blocks c-container">
<?php dynamic_sidebar( 'singular-title-widget' ); ?>
</div>
<?php endif;?>
