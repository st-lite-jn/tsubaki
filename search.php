<?php $paged = get_query_var('paged') ? intval( get_query_var( 'paged' ) ) : 1;?>
<?php get_header();?>
<main class="l-main">
<div class="l-container">
  <form class="p-search-form" role="search" method="get" action="/">
    <input type="text" placeholder="検索ワードを入力" value="<?php echo htmlentities($_GET["s"], ENT_QUOTES, "utf-8");?>" name="s" id="s" size="1" class="p-search-form__input">
    <button type="submit" class="p-search-form__btn">検索</button>
  </form>
	<?php if(!get_search_query()):?>
		<p>検索ワードを入力してください。</p>
	<?php else:?>
	<?php
		$args = array(
			'posts_per_page' => 12,
			'post_status' => 'publish',
			'paged' => $paged,
			's' => get_search_query()
		);
		$the_query = new WP_Query( $args );
	?>
      <?php if ($the_query->have_posts()): ?>
        <?php $the_query = new WP_Query($args);?>
        <?php require TEMPLATEPATH ."/template-parts/archive/loop.php";?>
        <?php Tsbk_Custom_Pagenation::pagination_method( $the_query->max_num_pages, $paged); ?>
      <?php else:?>
        <p>該当する記事がありません。</p>
      <?php endif;?>
  <?php endif;?>
</div>
</main>
<?php
get_footer();
