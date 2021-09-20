<?php $paged = get_query_var('paged') ? intval( get_query_var( 'paged' ) ) : 1;?>
<?php get_header();?>
<?php require TEMPLATEPATH ."/template-parts/archive/header.php";?>
<div class="l-container">
<?php if(!get_search_query()):?>
    <div class="u-al--center u-pt--80">
        <p>検索ワードを入力してください。</p>
    </div>
<?php else:?>
    <?php
        $args = array(
            'posts_per_page' => 12,
            'post_status' => 'publish',
            'paged' => $paged,
            's' => get_search_query()
        );
        $the_query = new WP_Query( $args );
    ?>
    <?php if ($the_query->have_posts()): ?>
        <?php $the_query = new WP_Query($args);?>
        <?php require TEMPLATEPATH ."/template-parts/archive/loop.php";?>
        <?php Tsbk_Custom_Pagenation::pagination_method( $the_query->max_num_pages, $paged); ?>
    <?php else:?>
        <div class="u-al--center u-pt--80">
            <p>該当する記事がありません。</p>
        </div>
    <?php endif;?>
<?php endif;?>
</div>
<?php
get_footer();
