<?php include TEMPLATEPATH . "/template-parts/components/content-header.php"; ?>
<div class="l-container">
<?php
$paged = get_query_var('paged') ? intval( get_query_var( 'paged' ) ) : 1;
$args = array(
	"post_type"=> $tsbk_post_type
	,'posts_per_page'  => 12
	,'orderby' => array( 'date' => 'DESC', 'menu_order' => 'ASC' )
	,'paged' => $paged
);
//テンプレート
if(is_post_type_archive('template')) {
	$args_template = array(
	'orderby' => array( 'menu_order' => 'ASC' , 'date' => 'DESC')
	);
	$args = array_merge($args , $args_template);
}
//カテゴリーアーカイブ
if(is_category()) {
$cat = get_query_var('cat');
if($cat) {
	$args_cat = array(
	"cat" => $cat
	);
	$args = array_merge($args , $args_cat);
}
}

//タグアーカイブ
if(is_tag()) {
$tag = get_query_var('tag');
if($tag) {
	$args_tag = array(
	"tag" => $tag
	);
	$args = array_merge($args , $args_tag);
}
}

//タクソノミーアーカイブ
if(is_tax()) {
$term = get_query_var('term');
$tax = get_query_var('taxonomy');
if($term) {
	$args_term = array(
	"tax_query" => array(
		array(
		'taxonomy' =>$tax,
		"field"=>"slug",
		"terms"=>$term
		)
	)
	,'orderby' => array( 'menu_order' => 'ASC' , 'date' => 'DESC')
	);
	$args = array_merge($args , $args_term);
}
}
//年別・月別アーカイブ
$year = get_query_var('year');
if($year) {
	$args_year = array(
	"year"=> $year
	);
	$args =  array_merge($args , $args_year);
}
$month = get_query_var('monthnum');
if($month) {
	$args_month = array(
	"monthnum"=> $month
	);
	$args =  array_merge($args , $args_month);
}
$day = get_query_var('day');
if($day) {
	$args_day = array(
		"day"=> $day
	);
	$args = array_merge($args , $args_day);
}
$the_query = new WP_Query($args);
?>
<?php if($the_query->have_posts()):?>

<?php require __DIR__ . "/loop.php"; ?>

<?php Tsbk_Output_Pagenation::pagination_method( $the_query->max_num_pages, $paged); ?>

<?php endif;?>

</div>
