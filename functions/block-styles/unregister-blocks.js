wp.domReady( () => {
	//
	wp.blocks.unregisterBlockStyle( 'core/heading', 'default' );

	// 区切り（ドット）
	wp.blocks.unregisterBlockStyle( 'core/separator', 'dots' );
});
