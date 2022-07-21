<?php
/**
 *
 * Template Name: フロントページ
*/
?>
<?php get_header();?>
<?php require TEMPLATEPATH . "/template-parts/components/content-header.php";?>
<div class="wp-front-blocks c-container"><?php the_content();?></div>
<?php get_footer(); ?>
