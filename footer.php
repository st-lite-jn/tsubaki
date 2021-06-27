
<footer class="l-footer">
<?php get_template_part( 'template-parts/footer', 'nav-menu'); ?>
<?php if(get_theme_mod( 'tsbk_copyright' )):?>
<p class="l-footer__copyright">
<?php echo get_theme_mod( 'tsbk_copyright' );?>
</p>
<?php endif;?>
</footer>
</div>
<!-- //wrapper -->
<?php wp_footer(); ?>
<?php get_template_part( 'template-parts/footer', 'scripts'); ?>
</body>
</html>
