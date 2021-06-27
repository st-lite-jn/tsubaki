<?php if ( have_posts() ): ?>
<?php while( have_posts() ): the_post(); ?>
<?php
  $fearued_img = get_post_thumbnail_id(get_the_ID()) ? wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "large"):false;
?>
<?php require TEMPLATEPATH . "/template-parts/component/content-header.php";?>
<main class="l-main">
  <div class="l-container">
    <div class="p-content-body">
      <?php if($fearued_img):?>
        <figure class="p-content-body__featured">
          <img src="<?php echo $fearued_img[0];?>" width="<?php echo $fearued_img[1];?>" height="<?php echo $fearued_img[2];?>" alt="">
        </figure>
      <?php endif;?>
      <div class="p-content-body__block">
        <?php the_content();?>
      </div>
      <?php
        if(is_single()) {
          require TEMPLATEPATH .'/templates/component/prev-next.php';
        }
      ?>
    </div>
  </div>
</main>
<?php endwhile;?>
<?php endif; ?>
