<?php get_header(); ?>
<?php require TEMPLATEPATH . "/template-parts/components/content-header.php";?>
<div class="l-container">
    <p class="u-al--center u-pt--40 u-pb--40">お探しのページが見つかりませんでした。<br>
    お手数ですが、URLを確認し、もう一度リクエストを試すか、<br>
    以下のボタンからサイトのホームにアクセスしてください。</p>
    <nav class="u-al--center"><a href="<?php echo home_url();?>" class="c-btn">Homeへ戻る</a></nav>
</div>
<?php get_footer();?>
