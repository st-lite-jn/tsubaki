<?php
/*
* WP_Queryによるサムネイル付きのループテンプレート
* $the_query : WP_Queryオブジェクト
*/
?>
<div class="p-card-wrapper">
    <?php while ( $the_query->have_posts()) :$the_query->the_post(); ?>
    <?php
        //サムネイル画像を取得
        $thumbnail = get_post_thumbnail_id( get_the_ID()) ? wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ) , 'medium', false , array('class'=>'')) : false;
        //POST IDからタクソノミーを取得
        list($cat_terms,$tag_terms) = tsbk_get_pid_terms(get_the_ID());
    ?>
    <article class="p-card">
        <a class="p-card__header" href="<?php echo get_the_permalink(get_the_ID());?>">
            <figure class="p-card__header__img <?php if(!$thumbnail) echo 'no-image'; ?>"><?php echo $thumbnail;?></figure>
            <p class="p-card__header__ttl"><?php echo get_the_title(get_the_ID());?></p>
        </a>
        <div class="p-card__body">
            <p class="p-card__body__date">更新日：<?php echo get_the_time('Y.m.d',get_the_ID());?></p>
            <p class="p-card__body__txt"><?php echo get_the_excerpt(get_the_ID());?></p>
        <?php if($cat_terms):?>
            <nav class="p-card__body__cats">
            <?php foreach($cat_terms as $cat_term):?>
                <a class="c-btn--mini" href="<?php echo get_term_link($cat_term->term_id);?>"><?php echo $cat_term->name;?></a>
            <?php break; endforeach; ?>
        </nav>
        <?php endif;?>
       </div>
    </article>
<?php endwhile;wp_reset_postdata();?>
</div>

