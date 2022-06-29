import { __ } from '@wordpress/i18n';
import { RichText, useBlockProps } from '@wordpress/block-editor';
export default function save({attributes}) {
	const { style, content } = attributes;
	return (
		<div {...useBlockProps.save({ className: `is-custom-editor is-${style}` })}>
			<RichText.Content tagName={'p'} value={content} />
		</div>
	);

}
