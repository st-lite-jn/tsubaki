
</main>
<div class="l-footer-wrapper">
<?php tsbk_breadcrumb();?>
<footer class="l-footer">
<?php
    include TEMPLATEPATH . '/template-parts/footer/fnav.php';
    include TEMPLATEPATH . '/template-parts/footer/copyright.php';
?>
</footer>
</div>
</div>
<!-- //wrapper -->
<?php include TEMPLATEPATH .'/assets/img/svg-icons.svg';?>
<?php wp_footer(); ?>
<?php get_template_part( 'template-parts/footer', 'scripts'); ?>
</body>
</html>
