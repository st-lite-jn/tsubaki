<?php
	global $tsbk_post_type;
	$cat_terms = tsbk_get_pt_terms($tsbk_post_type,true);
	$cat_partents = array();
	$cat_children = array();
?>
<?php if($cat_terms):?>
<div class="l-sidebar">
    <p class="l-sidebar__heading">カテゴリ</p>
<?php foreach($cat_terms as $cat_term):?>
    <?php
        if ( $cat_term->parent == 0 ) {
            array_push($cat_partents,$cat_term);
        } else {
            array_push($cat_children,$cat_term);
            $cat_children = array_reverse($cat_children);
        }
    ?>
<?php endforeach;?>
<?php if($cat_partents):?>
    <ul class="l-sidebar-list">
        <?php foreach ($cat_partents as $cat_partent):?>
            <li class="l-sidebar-list__item"><a href="<?php echo get_term_link($cat_partent->term_id,$cat_partent->taxonomy)?>"><?php echo $cat_partent->name;?></a>
            <?php if($cat_children):?>
                <ul class="l-sidebar-list">
                <?php foreach($cat_children as $cat_child):?>
                    <?php if($cat_child->parent == $cat_partent->term_id):?>
                        <li class="l-sidebar-list__item"><a href="<?php echo get_term_link($cat_child->term_id,$cat_child->taxonomy)?>"><?php echo $cat_child->name;?></a></li>
                    <?php endif;?>
                <?php endforeach;?>
                </ul>
                <?php endif;?>
            </li>
        <?php endforeach;?>
    </ul>
<?php endif;?>
</div>
<?php endif;?>
<?php
	$tag_terms = tsbk_get_pt_terms($tsbk_post_type , false);
?>
<?php if($tag_terms):?>
<div class="l-sidebar">
	<p class="l-sidebar__heading">タグ</p>
	<nav class="l-sidebar-tags">
	<?php foreach($tag_terms as $tag_term):?>
		<a class="c-label-tag" href="<?php echo get_term_link($tag_term->term_id,$tag_term->taxonomy)?>"><?php echo $tag_term->name;?></a>
	<?php endforeach;?>
	</nav>
</div>
<?php endif;?>
