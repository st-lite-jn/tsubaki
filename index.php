<?php
/**
 *
 * Template Name: アーカイブのテンプレート
*/
?>
<?php get_header(); ?>
<?php require TEMPLATEPATH . '/template-parts/module/archive.php';?>
<?php if( is_post_type_archive() ): ?>
<?php get_sidebar(); ?>
<?php endif;?>
<?php get_footer();?>
