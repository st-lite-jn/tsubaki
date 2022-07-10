import { registerBlockType } from "@wordpress/blocks";
import Edit from "./edit";
import Save from "./save";
import "./style.scss";


registerBlockType( "tsbk-block/firstblock" , {
	edit: Edit,
	save: Save
});
