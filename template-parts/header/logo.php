<?php
    //カスタムロゴの取得
    $logo_img = has_custom_logo() ? wp_get_attachment_image( get_theme_mod( 'custom_logo') , 'full' , false, array('class'=>'img-fluid', 'decoding' =>'async')) : false;
?>
<figure class="l-header__heading">
    <a href="<?php echo home_url();?>">
    <?php if($logo_img):?>
    <?php echo $logo_img;?>
    <?php else:?>
    <?php echo bloginfo("name");?>
    <?php endif;?>
    </a>
</figure>
