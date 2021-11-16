<?php
//======================================================================
// メタ要素生成し出力する関数
//======================================================================
if(!function_exists('tsbk_output_meta')) {
	function tsbk_output_meta() {
		$title = wp_get_document_title();
		global $tsbk_description;
		global $tsbk_title;
		global $tsbk_ogtype;
		$charset = get_bloginfo('charset');
		$site_name = get_bloginfo('name');
		$site_desc = get_bloginfo('description');
		$site_url = home_url();
		$site_icon = get_site_icon_url();
		$html_meta = "";
		$html_meta .= "
			<meta charset=\"{$charset}\" />
			<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
		";
		//Jetpackを使用していない場合のみ出力
		if(!class_exists('jetpack')) {
			$html_meta .= "
			<meta name=\"description\" content=\"{$tsbk_description}\" />
			<meta property=\"og:site_name\" content=\"{$tsbk_title["site-name"]}\" />
			<meta property=\"og:title\" content=\"{$title}\" />
			<meta property=\"og:description\" content=\"{$tsbk_description}\" />
			<meta property=\"og:type\" content=\"{$tsbk_ogtype}\" />
			<meta name=\"twitter:description\" content=\"{$tsbk_description}\" />
			<meta name=\"twitter:card\" content=\"summary_large_image\" />
			";
		}
		$html_meta .= "
			<script type=\"application/ld+json\">
			{
				\"@context\" : \"https://schema.org\",
				\"@type\": \"WebSite\",
				\"url\": \"{$site_url}\",
				\"name\": \"{$site_name}\",
				\"description\":\"{$site_desc}\",
				\"potentialAction\": {
					\"@type\": \"SearchAction\",
					\"target\": \"{$site_url}/?s={search_term_string}\",
					\"query-input\": \"required name=search_term_string\"
				}
			}
			</script>
		";
		echo $html_meta;
	}
}
add_action( 'wp_head' , 'tsbk_output_meta' , 5);
