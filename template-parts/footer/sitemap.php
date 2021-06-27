<div class="l-footer__sitemap">
	<div class="l-container">
	<?php // 指定の固定ページの本文を抽出
	$tsbk_post = get_page_by_path ( 'sitemap' );
	echo apply_filters ( 'the_content', $tsbk_post -> post_content );
	?>
	</div>
</div>
