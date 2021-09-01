<?php if ( have_posts() ): ?>
    <?php while( have_posts() ): the_post(); ?>
    <?php require __DIR__ . "/header.php";?>
    <div class="l-container">
        <div class="p-sg-content"><?php the_content();?></div>
    </div>
    <?php require __DIR__ . "/footer.php";?>
    <?php if(is_single()) require TEMPLATEPATH .'/template-parts/components/prev-next.php'; ?>
    <?php endwhile;?>
<?php endif; ?>
