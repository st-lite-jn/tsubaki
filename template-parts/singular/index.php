<?php if ( have_posts() ): ?>
    <?php while( have_posts() ): the_post(); ?>
    <?php require __DIR__ . "/header.php";?>
    <div class="l-container">
        <div class="p-singular-content"><?php the_content();?></div>
    <?php if(is_single()) require TEMPLATEPATH .'/template-parts/component/prev-next.php'; ?>
    </div>
    <?php endwhile;?>
<?php endif; ?>
