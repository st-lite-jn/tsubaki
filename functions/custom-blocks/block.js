(function(wp) {
	const registerBlockType = wp.blocks.registerBlockType;
	const el = wp.element.creatElement;
	const useBlockProps = wp.blockEditor.useBlockProps;
	const RichText = wp.blockEditor.RichText;

    registerBlockType('tsbk-block/marquee', {
		title: "Marquee",
		icon: "text",
		category : "text",
		attributes : {
			content: {
				type : 'array',
				source : "children",
				selector:"p",
			}
		},
		edit : (props) => {
			return el (
				'div',
				{
					className:"wp-marquee-edit",
				},
				el(
					'p',
					{},
					'マーキーをここに表示'
				)
			);
		},
		save: function() {
			return el (
				'div',
				{
					className:"wp-marquee",
				},
				el(
					'p',
					{},
					'マーキーをここに表示'
				)
			);
		}
	});
})(wp);
