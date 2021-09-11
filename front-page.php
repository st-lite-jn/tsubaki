<?php
/**
 *
 * Template Name: フロントページ
*/
?>
<?php get_header();?>
<div class="p-block-body"><?php the_content();?></div>
<?php
    $args = array(
        "post_type"=> "post"
        ,'posts_per_page'  => 4
        ,'orderby' => array( 'date' => 'DESC', 'menu_order' => 'ASC' )
    );
    $the_query = new WP_Query($args);
    $post_obj = get_post_type_object( 'post');
?>
    <?php if($the_query->have_posts()): ?>
       <?php require TEMPLATEPATH . "/template-parts/archive/loop.php";?>
        <nav class="u-al--center u-mt--40">
            <a class="c-btn" href="<?php echo get_post_type_archive_link( "post" );?>"><?php echo $post_obj->labels->name; ?>一覧を表示</a>
        </nev>
    <?php endif; ?>
<?php get_footer(); ?>
