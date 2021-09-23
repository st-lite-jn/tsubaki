<?php
/**
 * POST IDからアイキャッチ画像の情報を配列で取得
 * @param int $post_id
 * @return array
 */
function tsbk_get_featured_img($post_id){
	$thumbnail_id = get_post_thumbnail_id($post_id);
    $featured_img = array();
	if($thumbnail_id) {
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
	}
	return $featured_img;
}
/**
 * アタッチメイントIDから画像の情報を配列で取得する関数
 * @param int $attachment_id
 * @return array
 */
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
