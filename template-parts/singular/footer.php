<?php list($cat_terms,$tag_terms) = tsbk_get_pid_terms(get_the_ID());?>
<?php if(isset($cat_terms)||isset($tag_terms)):?>
<div class="p-sg-footer l-container">
<?php if(isset($cat_terms)):?>
<nav class="p-sg-footer-terms">
<?php foreach($cat_terms as $cat_term):?>
    <a class="c-btn--mini" href="<?php echo get_tag_link($cat_term->term_id);?>"><?php echo $cat_term->name;?></a>
<?php endforeach; ?>
</nav>
<?php endif;?>
<?php if(isset($tag_terms)):?>
<nav class="p-sg-footer-terms">
<?php foreach($tag_terms as $tag_term):?>
    <a class="c-btn--mini" href="<?php echo get_tag_link($tag_term->term_id);?>"><?php echo $tag_term->name;?></a>
<?php endforeach; ?>
</nav>
<?php endif;?>
</div >
<?php endif;?>
