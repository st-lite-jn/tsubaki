<?php
	global $tsbk_title;
    $fearued_img = get_post_thumbnail_id(get_the_ID()) ? wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()) , 'large' , false, array('class'=>'p-title-visual__img')) : false;
?>
<header class="p-title">
    <section class="p-title-props l-container">
        <h1 class="p-title-props__label"><?php echo $tsbk_title["content-label"];?></h1>
    <?php if(is_single()):?>
        <time class="p-title-props__date">公開日 : <?php echo get_the_time("Y.m.d"); ?></time>
        <time class="p-title-props__date">最終更新日 : <?php echo get_the_modified_date("Y.m.d"); ?></time>
    <?php endif; ?>
    </section>
    <?php if($fearued_img):?>
    <figure class="p-title-visual"><?php echo $fearued_img;?></figure>
    <?php endif;?>
</header>
