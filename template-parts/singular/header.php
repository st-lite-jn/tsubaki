<?php
	global $tsbk_title;
    $fearued_img = get_post_thumbnail_id(get_the_ID()) ? wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()) , 'large' , false, array('class'=>'')) : false;
?>
<header class="p-block-header">
    <section class="p-block-header-props">
        <h1 class="p-block-header-props__ttl"><?php echo $tsbk_title["content-label"];?></h1>
    <?php if(is_single()):?>
        <time class="p-block-header-props__date"><?php echo get_the_time("Y.m.d"); ?></time>
    <?php endif; ?>
    </section>
    <?php if($fearued_img):?>
    <figure class="p-block-header-visual"><?php echo $fearued_img;?></figure>
    <?php endif;?>
</header>
