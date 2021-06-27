<?php
/**
 * POST IDからアイキャッチ画像を取得する
 * アイキャッチ画像がない場合は変わりの画像を代入する
 */
function tsbk_get_featured_img($post_id){
	$thumbnail_id = get_post_thumbnail_id($post_id);
	if($thumbnail_id):
		$thumbnail = wp_get_attachment_image_src($thumbnail_id, "thumbnail");
		$medium = wp_get_attachment_image_src($thumbnail_id, "medium");
		$large = wp_get_attachment_image_src($thumbnail_id, "large");
		$featured_img = array(
			'thumbnail' => $thumbnail[0],
			'thumbnail-width' => $thumbnail[1],
			'thumbnail-height' => $thumbnail[2],
			'medium' => $medium[0],
			'medium-width' => $medium[1],
			'medium-height' => $medium[2],
			'large' => $large[0],
			'large-width' => $large[1],
			'large-height' => $large[2],
			'alt'=> get_post_meta( $thumbnail_id ,'_wp_attachment_image_alt', true )
		);
	else:
		$featured_img = array(
			'thumbnail'  => get_template_directory_uri()."/assets/img/no_img_thumb.png",
			'thumbnail-width' => 150,
			'thumbnail-height' => 150,
			'medium' => get_template_directory_uri()."/assets/img/no_img_medium.png",
			'medium-width' => 300,
			'medium-height' => 300,
			'large' => get_template_directory_uri()."/assets/img/no_img_large.png",
			'large-width' => 1024,
			'large-height' => 575,
			'alt'=> ""
		);
	endif;
	return $featured_img;
}

// アタッチメイントIDから画像を取得する関数
function tsbk_get_attachment_img($attachment_id){
		$thumbnail = wp_get_attachment_image_src($attachment_id, "thumbnail");
		$medium = wp_get_attachment_image_src($attachment_id, "medium");
		$large = wp_get_attachment_image_src($attachment_id, "large");
		$small_carousel = wp_get_attachment_image_src($attachment_id, "small-carousel");
		$large_carousel = wp_get_attachment_image_src($attachment_id, "large-carousel");
		$gallery_thumbnail = wp_get_attachment_image_src($attachment_id, "gallery-thumbnail");
		$small_square = wp_get_attachment_image_src($attachment_id, "small-square");
		$large_square = wp_get_attachment_image_src($attachment_id, "large-square");
		$large_hero = wp_get_attachment_image_src($attachment_id, "large-hero");
		$ogimg = wp_get_attachment_image_src($attachment_id, "ogimg");
		$attachment_img = array(
		'thumbnail' => $thumbnail[0],
		'thumbnail-width' => $thumbnail[1],
		'thumbnail-height' => $thumbnail[2],
		'medium' => $medium[0],
		'medium-width' => $medium[1],
		'medium-height' => $medium[2],
		'large' => $large[0],
		'large-width' => $large[1],
		'large-height' => $large[2],
		'alt'=> get_post_meta( $attachment_id ,'_wp_attachment_image_alt', true )
	);
	return $attachment_img;
}
