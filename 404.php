<?php get_header(); ?>

<?php require TEMPLATEPATH . "/template-parts/components/content-header.php";?>
<div class="c-container">
	<p class="u-al--center u-pt--80 u-pb--80">お探しのページが見つかりませんでした。<br>
	お手数ですが、URLを確認し、もう一度リクエストを試すか、<br>
	以下のボタンからサイトのホームにアクセスしてください。</p>
	<nav class="u-al--center"><a href="<?php echo home_url();?>" class="button">Homeへ戻る</a></nav>
</div>
<?php get_footer();?>
