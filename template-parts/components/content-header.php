<?php
	/**
	 * タイトルの取得
	 */
	$title = get_the_title();
	/**
	 * アイキャッチ画像の取得
	 */
	$featured_img = !is_404() && get_post_thumbnail_id(get_the_ID()) ? wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()) , 'large' , false, array('class'=>'p-content-header-visual__img')) : false;
	if($featured_img) {
		$featured_id = get_post_thumbnail_id(get_the_ID());
		$featured_array = wp_get_attachment_image_src($featured_id, 'large');
	}

	/**
	 * 制作者名取得
	 */
	$author = get_userdata($post->post_author);

	/**
	 * カテゴリとタグの取得
	 */
	if(is_single()) {
		list($cat_terms,$tag_terms) = tsbk_get_pid_terms(get_the_ID());
	}
?>
<header class="p-content-header-wrapper">
	<div class="p-content-header">
		<section class="l-container">
			<h1 class="p-content-header__label u-dalay-fadein-up" itemprop="headline"><?php echo $title; ?></h1>
	<?php if(is_single()):?>
		<div class="p-content-header__meta u-mt--8 u-dalay-fadein-up">
			<time itemprop="datePublished" datetime="<?php echo get_the_time("Y-m-d"); ?>" class="p-content-header__meta__item is-published">公開日 : <?php echo get_the_time("Y.m.d"); ?></time>
			<time itemprop="dateModified" datetime="<?php echo get_the_time("Y-m-d"); ?>" class="p-content-header__meta__item is-modified">更新日 : <?php echo get_the_modified_date("Y.m.d"); ?></time>
			<p itemprop="author" itemscope itemtype="https://schema.org/Person" class="p-content-header__meta__item is-author">
				<span itemprop="name" ><?php echo $author->display_name; ?></span>
				<?php if($author->user_url):?><link rel="author" itemprop="url" href="<?php echo $author->user_url;?>" /><?php endif;?>
			</p>
		</div>
		<?php if(is_single()): ?>
			<?php if( isset($cat_terms) || isset($tag_terms) ):?>
				<div class="p-content-header__tax u-mt--8 u-dalay-fadein-up">
				<?php if( isset($cat_terms) ):?>
					<?php foreach($cat_terms as $cat_term):?>
					<a href="<?php echo get_tag_link($cat_term->term_id);?>" class="p-content-header__tax__item is-cat" itemprop="about"><?php echo $cat_term->name;?></a>
					<?php break; endforeach; ?>
				<?php endif;?>
				<?php if(isset($tag_terms)):?>
					<?php foreach($tag_terms as $tag_term):?>
						<a href="<?php echo get_tag_link($tag_term->term_id);?>" class="p-content-header__tax__item is-tag"><?php echo $tag_term->name;?></a>
					<?php endforeach; ?>
				<?php endif;?>
				</div>
			<?php endif;?>
		<?php endif;?>
	<?php endif; ?>
	<?php if(is_page() && has_excerpt()):?>
		<div class="p-content-header__lead u-dalay-fadein-up">
		<p itemprop="description"><?php echo get_the_excerpt();?></p>
		</div>
	<?php endif; ?>
		</section>
	</div>
	<?php if($featured_img):?>
	<figure class="p-content-header-visual" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
		<?php echo $featured_img;?>
		<meta itemprop="url" content="<?php echo $featured_array[0];?>" />
		<meta itemprop="width" content="<?php echo $featured_array[1];?>" />
		<meta itemprop="height" content="<?php echo $featured_array[2];?>" />
	</figure>
	<?php endif;?>
</header>
