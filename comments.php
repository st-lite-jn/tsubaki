<?php if ( post_password_required() ) return;?>
<div id="comments" class="editor-styles-wrapper l-container">
	<?php if( have_comments() ):?>
	<h3>この投稿へのコメント</h3>
	<div class="p-comment-wrapper">
	<?php
		$args = array(
			'style' => 'div',
			'type' => 'comment',
			'format' => 'html5',
			'walker' => new Tsbk_Walker_Comment,
		);
		wp_list_comments($args);
	?>
	</div>
	<!-- //p-comment-wrapper -->
	<?php endif; ?>
	<?php comment_form(); ?>
</div>
