import { __ } from '@wordpress/i18n';
import { PanelBody, SelectControl } from '@wordpress/components';
import { InspectorControls,	RichText, useBlockProps,} from '@wordpress/block-editor';
import './editor.scss';
export default function Edit( {attributes, setAttributes } ) {
	const { style , content} = attributes;
	const blockProps = useBlockProps(
		{className: `is-custom-editor is-${style}`}
	);
	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Style Settings', 'editor-block')}>
					<SelectControl
						value={style}
						onChange={(value) => setAttributes({ style: value })}
						options={[
							{
								label: __('デフォルト', 'editor-block'),
								value: 'default',
							},
							{ label: __('ボーダーライン', 'editor-block'),
								value: 'border' },
						]}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...blockProps}>
				<RichText
					tagName="p"
					onChange={(value) => setAttributes({ content: value })}
					value={content}
				/>
			</div>
		</>
	);
}
