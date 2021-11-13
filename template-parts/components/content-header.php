<?php
	$title = wp_get_document_title();
	$featured_img = !is_404() && get_post_thumbnail_id(get_the_ID()) ? wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()) , 'large' , false, array('class'=>'p-content-header-visual__img')) : false;

	if($featured_img) {
		$featured_id = get_post_thumbnail_id(get_the_ID());
		$featured_array = wp_get_attachment_image_src($featured_id, 'large');
	}
	if(is_single()) {
		list($cat_terms,$tag_terms) = tsbk_get_pid_terms(get_the_ID());
	}
?>
<header class="p-content-header-wrapper">
	<div class="p-content-header">
		<section class="l-container">
			<?php if(is_single() && isset($cat_terms) ):?>
				<div class="is-cat wp-block-post-terms u-dalay-fadein-up">
				<?php foreach($cat_terms as $cat_term):?>
			<p itemprop="about"><?php echo $cat_term->name;?></p>
				<?php break; endforeach; ?>
				</div>
			<?php endif;?>
			<h1 class="p-content-header__label u-dalay-fadein-up" itemprop="headline"><?php echo $title; ?></h1>
	<?php if(is_single()):?>
		<div class="p-content-header__date u-dalay-fadein-up">
			<time itemprop="datePublished" datetime="<?php echo get_the_time("Y-m-d"); ?>">公開日 : <?php echo get_the_time("Y.m.d"); ?></time>
			<time itemprop="dateModified" datetime="<?php echo get_the_time("Y-m-d"); ?>">更新日 : <?php echo get_the_modified_date("Y.m.d"); ?></time>
		</div>
		<?php if(isset($tag_terms)):?>
		<div class="is-tag wp-block-post-terms u-mt--20 u-dalay-fadein-up">
			<?php foreach($tag_terms as $tag_term):?><?php if($tag_term !== reset($tag_terms)):?> | <?php endif;?><a href="<?php echo get_tag_link($tag_term->term_id);?>"><?php echo $tag_term->name;?></a><?php endforeach; ?>
		</div>
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
