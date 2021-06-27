<?php include __DIR__ . '/template-parts/header/theme-customizers.php'; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part( 'template-parts/header/head' );?>
<body>
<div id="wrapper">
<header class="l-header">
<a href="<?php echo home_url();?>" class="l-header-logo">
<?php if($logo_img):?>
<img src="<?php echo $logo_img[0];?>" width="<?php echo $logo_img[1];?>" height="<?php echo $logo_img[2];?>" alt="<?php echo bloginfo("name");?>" class="l-header-logo__img" decoding="async" />
<?php else:?>
<?php echo bloginfo("name");?>
<?php endif; ?>
</a>
<div class="l-header__content l-container">

<?php get_search_form()?>
</div>
<?php get_template_part( 'template-parts/header/gnav');?>
</header>
<?php tsbk_breadcrumb();?>
