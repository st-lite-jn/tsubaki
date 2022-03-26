<?php get_sidebar(); ?>
</main>
<div class="l-footer-wrapper">
<?php tsbk_output_breadcrumb();?>
<footer class="l-footer">
<?php
	get_template_part('template-parts/footer/fnav');
	get_template_part('template-parts/footer/copyright');
?>
</footer>
</div>
</div>
<!-- //wrapper -->
<?php wp_footer(); ?>
</body>
</html>
