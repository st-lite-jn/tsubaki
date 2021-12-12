<?php
# -----------------------------------------------------------------
# コメント機能のカスタマイズ
# -----------------------------------------------------------------

/**
 * コメント投稿フォームの修正
 */
if(!function_exists("tsbk_comment_form_fields")) {
	function tsbk_comment_form_fields($fields) {

		$commenter = wp_get_current_commenter();
		$comment_author = esc_attr( $commenter['comment_author'] );
		$comment_email = esc_attr(  $commenter['comment_author_email'] );

		$req_class = get_option( 'require_name_email' ) ? "<span class=\"p-comment-form__required\">*</span>" : '' ;
		$req_aria = get_option( 'require_name_email' ) ? " aria-required='true' " : '';

		$fields =  array(
			"author" => "
				<div class='p-comment-form is-author'>
					<label for='author'>名前{$req_class}</label>
					<input id='author' name='author' type='text' value='{$comment_author}' size='30' {$req_aria} />
				</div>",
			"email" => "
				<div class='p-comment-form is-email'>
					<label for='email'>Email{$req_class}</label>
					<input id='email' name='email' type='email' value='{$comment_email}' size='30' {$req_aria} />
				</div>",
			"url" => "
			<div class='p-comment-form is-url'>
				<label for='url'>Webサイト</label>
				<input id='url' name='url' type='url' value='' size='30' maxlength='200' />
			</div>",
		);
		return $fields;
	}
}

function tsbk_custom_comment_form( $args ) {
	$args['comment_notes_after'] = '<p class="p-comment-form__notice">内容に問題なければ、下記の「コメントを送信する」ボタンを押してください。</p>';
	$args['label_submit'] = 'コメントを送信する';
	return $args;
}

add_filter( 'comment_form_default_fields', 'tsbk_comment_form_fields' );
add_filter( 'comment_form_defaults', 'tsbk_custom_comment_form' );
