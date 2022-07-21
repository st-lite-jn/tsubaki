<article itemscope="itemscope" itemprop="blogPost" itemtype="https://schema.org/BlogPosting">
	<?php get_template_part( 'template-parts/components/content-header' ); ?>
	<div class="">
		<?php if ( have_posts() ): ?>
			<?php while( have_posts() ): the_post(); ?>
			<div class="wp-front-blocks c-container" itemprop="mainEntityOfPage">
				<?php the_content();?>
				<?php
					//ページ区切り
					wp_link_pages(
						array(
						'before'   => '<nav class="wp-blocks-pager" aria-label="' . esc_attr__( 'ページ', 'tsubaki' ) . '">',
						'after'    => '</nav>',
						/* translators: %: Page number. */
						'pagelink' => esc_html__( 'ページ %', 'tsubaki' ),
						)
					);
				?>
			</div>
			<?php if(is_single()) require TEMPLATEPATH .'/template-parts/components/prev-next.php'; ?>
			<?php endwhile;?>
		<?php endif; ?>
	</div>
</article>
<?php if ( is_active_sidebar( 'singular-content-bottom-widget' ) ):?>
<div class="wp-front-blocks c-container">
<?php dynamic_sidebar( 'singular-content-bottom-widget' ); ?>
</div>
<?php endif;?>
<?php
if( is_single() ) {
	comments_template();
}

