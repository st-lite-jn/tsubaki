<?php

function tsbk_first_block_init () {
	register_block_type_from_metadata( __DIR__ );
	//wp_enqueue_script( "ourscript", $src:string, ["jQuery"], "1.0" , $in_footer:boolean );
}

add_action( "init", "tsbk_first_block_init");
