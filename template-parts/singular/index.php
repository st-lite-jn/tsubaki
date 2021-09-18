<?php require TEMPLATEPATH . "/template-parts/components/header.php";?>
<div class="l-container u-mt--40 <?php if(is_single()):?>l-col<?php endif;?>">
    <div class="is-col-wide">
        <?php if ( have_posts() ): ?>
            <?php while( have_posts() ): the_post(); ?>
            <div class="p-block"><?php the_content();?></div>
            <?php require __DIR__ . "/footer.php";?>
            <?php if(is_single()) require TEMPLATEPATH .'/template-parts/components/prev-next.php'; ?>
            <?php endwhile;?>
        <?php endif; ?>
    </div>
    <!-- // is-col-wide -->
    <?php if(is_single()) get_sidebar(); ?>
</div>

