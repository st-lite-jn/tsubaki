<?php
/**
 *
 * Template Name: フロントページ
*/
?>
<?php get_header();?>
<?php require TEMPLATEPATH . "/template-parts/components/content-header.php";?>
<div class="l-container">
<div class="editor-styles-wrapper"><?php the_content();?></div>
</div>
<?php get_footer(); ?>
