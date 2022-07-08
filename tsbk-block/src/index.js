// var registerBlockType = wp.blocks.registerBlockType;
import { registerBlockType } from "@wordpress/blocks"


registerBlockType( "tsbk-block/firstblock" , {
  edit: function () {
   return <p className="class wp-block">Edit JSX</p>
  },
  save: function () {
	return <p className="class">Save JSX</p>
  },
});
