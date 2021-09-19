<?php
	global $tsbk_title;
    $fearued_img = get_post_thumbnail_id(get_the_ID()) ? wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()) , 'large' , false, array('class'=>'p-title-visual__img')) : false;
?>
<header id="content-title" class="p-title">
    <div class="p-title-props">
        <section class="l-container">
        <h1 class="p-title-props__label fadeInUp"><?php echo $tsbk_title["content-label"];?></h1>
    <?php if(is_single()):?>
        <div class="p-title-props__date fadeInUp">
            <time itemprop="dateCreated" datetime="<?php echo get_the_time("Y-m-d"); ?>">公開日 : <?php echo get_the_time("Y.m.d"); ?></time>
            <time itemprop="dateModified" datetime="<?php echo get_the_time("Y-m-d"); ?>">最終更新日 : <?php echo get_the_modified_date("Y.m.d"); ?></time>
        </div>
    <?php endif; ?>
    <?php if(is_page() && has_excerpt()):?>
        <div class="p-title-props__lead fadeInUp">
           <p><?php echo get_the_excerpt();?></p>
        </div>
    <?php endif; ?>
        </section>
    </div>
    <?php if($fearued_img):?>
    <figure class="p-title-visual"><?php echo $fearued_img;?></figure>
    <?php endif;?>
</header>
