<?php
# -----------------------------------------------------------------
# クラシックエディタ版の記事投稿画面のカスタマイズ
# -----------------------------------------------------------------
/**
* サブカテゴリIDを取得する関数
*/
function get_subcat_id( $cat_id = null ) {
	global $wpdb;
	if($cat_id == null) return false;
	// サブカテゴリを取得
	$sub_cat = $wpdb->get_col($wpdb->prepare("SELECT term_id FROM $wpdb->term_taxonomy WHERE parent=%d", $cat_id));
	$sub_cat = implode( ",", $sub_cat);
	return $sub_cat;
}

/**
* 小カテゴリにチェックを入れると自動的に親カテゴリにもチェックが入る関数
*/
function tsbk_category_parent_check_script() {
echo <<< EOM
<script>
jQuery(function($) {
	$('#taxonomy-category .children input').change(function() {
	function parentNodes(checked, nodes) {
		parents = nodes.parent().parent().parent().prev().children('input');
		if (parents.length != 0) {
		parents[0].checked = checked;
		parentNodes(checked, parents);
		}
	}
	var checked = $(this).is(':checked');
	$(this).parent().parent().siblings().children('label').children('input').each(function() {
		checked = checked || $(this).is(':checked');
	})
		parentNodes(checked, $(this));
	});
});
</script>
EOM;
}
add_action('admin_head-post-new.php', 'tsbk_category_parent_check_script');
add_action('admin_head-post.php', 'tsbk_category_parent_check_script');

/**
* 階層化カテゴリのチェックボックスが勝手に順番が変わる現象を止める処理
*/
function tsbk_disable_checked_ontop( $args ) {
  $args['checked_ontop'] = false;
  return $args;
}
add_action( 'wp_terms_checklist_args', 'tsbk_disable_checked_ontop' );

/**
* 条件に応じてカテゴリーの表示をカスタマイズ
*/
function tsbk_post_category_category() {
	$post_type = get_post_type();
?>
<?php if($post_type == "hogehoge") {
echo <<< EOM
<script>
jQuery(function($) {
	//カテゴリチェックボックスをラジオボタンに変更
	var cat_checkbox = $('.categorydiv input[type=checkbox]');
	cat_checkbox.each(function() {
		$(this).replaceWith($(this).clone().attr('type', 'radio'));
	});
});
</script>
EOM;
}
echo <<< EOM
<script>
jQuery(function($) {
	// 「新規カテゴリーを追加」「よく使うもの」を非表示
	$('.category-tabs,.taxonomy-add-new').remove();
});
</script>
EOM;
}
add_action( 'admin_head-post-new.php', 'tsbk_post_category_category' );
add_action( 'admin_head-post.php', 'tsbk_post_category_category' );

/**
* 記事のタイトルを必須化
*/
function tsbk_required_title() {
echo <<< EOM
<script>
jQuery(function($) {
	var the_post_title = $('#title');
	$('#post').submit(function(e) {
		if(the_post_title.val() == '') {
			alert('タイトルを入力してください。');
			e.preventDefault();
			the_post_title.css({"border":"solid #ff0000 2px","background-color":"#ffe6e6"});
		}
	});
});
</script>
EOM;
}
add_action('admin_head-post-new.php', 'tsbk_required_title');
add_action('admin_head-post.php', 'tsbk_required_title');

/**
* カテゴリ選択を必須化
*/
function tsbk_required_cat() {
	$post_type = get_post_type();
	if($post_type == "hogehoge") {
		echo <<< EOM
<script>
jQuery(function($) {
	$('#post').submit(function(e) {
		var checkLength = $('.categorydiv input:checked').length;
		var catetoryList = $(".categorydiv");
		var aleartMessage = "カテゴリを選択してください。";
		if(checkLength == 0) {
			alert(aleartMessage);
			e.preventDefault();
			catetoryList.css({"border":"solid #ff0000 2px","background-color":"#ffe6e6"});
		}
	});
});
</script>
EOM;
	}
}
add_action('admin_head-post-new.php', 'tsbk_required_cat');
add_action('admin_head-post.php', 'tsbk_required_cat');

/**
* 抜粋を必ずタイトルの直下に表示させる
*/
function tsbk_appear_excerpt(){
echo <<< EOM
	<style>
	/* 抜粋を表示 */
	#postexcerpt {
		display: block;
	}
	/* 抜粋の説明文非表示 */
	#postexcerpt p {
		display: none;
	}
	#postexcerpt .handle-actions {
		display:none;
	}
	/* 間隔調節 */
	#titlediv {
		margin-bottom: 10px;
	}
	#postexcerpt {
		margin-bottom: 0;
	}
	</style>
	<script>
	(function ($) {
		$(function () {
			const elmExcerpt = $('#postexcerpt');
			// タイトル文字を変更
			$('.hndle', elmExcerpt).text('ディスクリプション');
			// 表示位置をタイトルの下に移動
			$('#titlediv').after(elmExcerpt);
		});
	})(jQuery);
	</script>
EOM;
}
add_action("admin_head-post-new.php", "tsbk_appear_excerpt");
add_action("admin_head-post.php", "tsbk_appear_excerpt");

/**
* ページ属性に応じて本文の表示非表示を切り替え
*/
function tsbk_remove_wysiwyg() {
	$page_template = get_page_template_slug();
	if($page_template == "front-page.php") {
		remove_post_type_support("page","editor");
	}
	echo <<< EOM
<script>
jQuery(function($) {
	$('[name=page_template]').change(function() {
		var page_template = $('[name=page_template]').val();
		console.log(page_template);
		if(page_template=="front-page.php" || page_template=="page-profile.php") {
			$("#postdivrich").css("display","none");
		} else {
			$("#postdivrich").css("display","");
		}
	});
});
</script>
EOM;
}
add_action( 'admin_head-post-new.php', 'tsbk_remove_wysiwyg' );
add_action( 'admin_head-post.php', 'tsbk_remove_wysiwyg' );
