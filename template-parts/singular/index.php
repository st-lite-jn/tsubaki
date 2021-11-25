<article itemscope="itemscope" itemprop="blogPost" itemtype="https://schema.org/BlogPosting">
	<?php require TEMPLATEPATH . "/template-parts/components/content-header.php";?>
	<div class="l-container u-mt--40">
		<?php if ( have_posts() ): ?>
			<?php while( have_posts() ): the_post(); ?>
			<div class="editor-styles-wrapper" itemprop="mainEntityOfPage">
				<?php the_content();?>
				<?php
					//ページ区切り
					wp_link_pages(
						array(
						'before'   => '<nav class="p-content-block__pages" aria-label="' . esc_attr__( 'ページ', 'tsubaki' ) . '">',
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

