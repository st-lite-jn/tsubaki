<?php
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="l-container">
	<?php if( have_comments() ):?>
	<h3>コメント</h3>
	<ol class="p-commets-list">
		<?php wp_list_comments( 'avatar_size=80' ); ?>
	</ol>
	<?php endif; ?>
	<?php comment_form(); ?>
</div>
