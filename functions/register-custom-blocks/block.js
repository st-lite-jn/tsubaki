(function(wp) {
	let registerBlockType = wp.blocks.registerBlockType;
	let el = wp.element.createElement;
	let useBlockProps = wp.blockEditor.useBlockProps;
	let RichText = wp.blockEditor.RichText;

    registerBlockType('tsbk/marquee', {
		title: "Marquee",
		icon: "text",
		category : "text",
		attributes : {
			content: {
				type : 'array',
				source : "children",
				selector: "p",
			}
		},
		edit : (props) => {
			var blockProps = useBlockProps({className: "marquee-editor"});
			var content = props.attributes.content;
			function onChangeContent( newContent ) {
				props.setAttributes( { content: newContent } );
			}
			return el (
				'div',
				blockProps,
				el(
					RichText,
					{
						tagName: 'p',
						onChange: onChangeContent,
						value: content,
						placeholder: "マーキー"
					}
				)
			);
		},
		save: (props) => {
			var blockProps = useBlockProps.save({className: "marquee"});
			return el (
				'div',
				blockProps,
				el( RichText.Content,
					{
						tagName: "p",
						value: props.attributes.content
					}
				)
			);
		}
	});
})(wp);
