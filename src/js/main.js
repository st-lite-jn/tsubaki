import {gnavToggle , gnavPosition} from "./_gnav";
import {searchToggle , searchPosition} from "./_search";
import {headerFixed} from "./_header";
import {carousels} from "./_carousels";
import {wpEmbedVideo} from "./_wp-embed";

/**
 * インポートした関数の発火処理
 */
let queue = null,
    wait = 100;
window.addEventListener( 'resize', function() {
    clearTimeout( queue );
    queue = setTimeout(function() {
        gnavPosition();
        searchPosition();
        wpEmbedVideo();
    }, wait);
},false);

window.addEventListener("DOMContentLoaded",()=>{
    gnavPosition();
    searchPosition();
    carousels();
    gnavToggle();
    searchToggle();
    headerFixed();
    wpEmbedVideo();
    //画面をスクロール時に実行
    window.addEventListener( 'scroll' , () => {
        headerFixed();
    });
});
hljs.highlightAll();
