<?php get_sidebar(); ?>
</main>
<div class="l-footer-wrapper">
<?php tsbk_output_breadcrumb();?>
<footer class="l-footer">
<?php
	include TEMPLATEPATH . '/template-parts/footer/fnav.php';
	include TEMPLATEPATH . '/template-parts/footer/copyright.php';
?>
</footer>
</div>
</div>
<!-- //wrapper -->
<?php wp_footer(); ?>
</body>
</html>
