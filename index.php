<?php
/**
 *
 * Template Name: アーカイブのテンプレート
*/
global $tsbk_post_type;
?>
<?php get_header(); ?>
<?php include TEMPLATEPATH . '/template-parts/module/archive.php';?>
<?php if( is_post_type_archive() ): ?>
<?php get_sidebar(); ?>
<?php endif;?>
<?php get_footer();?>
