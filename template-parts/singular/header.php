<?php
	global $tsbk_title;
    $fearued_img = get_post_thumbnail_id(get_the_ID()) ? wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()) , 'large' , false, array('class'=>'')) : false;
?>
<header class="p-sg-header l-container">
    <section class="p-sg-header-props">
        <h1 class="p-sg-header-props__ttl"><?php echo $tsbk_title["content-label"];?></h1>
    <?php if(is_single()):?>
        <time class="p-sg-header-props__date"><?php echo get_the_time("Y.m.d"); ?></time>
    <?php endif; ?>
    </section>
    <?php if($fearued_img):?>
    <figure class="p-sg-header-visual"><?php echo $fearued_img;?></figure>
    <?php endif;?>
</header>
