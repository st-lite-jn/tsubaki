import {gnavToggle , gnavPosition} from "./_gnav";
import {searchToggle , searchPosition} from "./_search";
import {headerFixed} from "./_header";
import {animations} from "./_animations";
import {wpEmbedVideo} from "./_wp-embed";
import {wpQueryThumnail} from "./_wp-query";

/**
 * 関数の発火処理
 */
//最初の HTML 文書の読み込みと解析が完了したとき、スタイルシート、画像、サブフレームの読み込みが完了するのを待たずに発火
window.addEventListener('DOMContentLoaded', () => {
    gnavPosition();
    searchPosition();
    gnavToggle();
    searchToggle();
    headerFixed();
    wpEmbedVideo();
	wpQueryThumnail();
});
//ページ全体が、スタイルシートや画像などのすべての依存するリソースを含めて読み込まれたときに発火
window.addEventListener('load', () => {
    animations.delayFadeinUp();
});

//画面をリサイズしたときに発火
let queue = null,
    wait = 100;
window.addEventListener( 'resize', () => {
    clearTimeout( queue );
    queue = setTimeout(() => {
        gnavPosition();
        searchPosition();
        wpEmbedVideo();
    }, wait);
},false);

//画面をスクロール時に実行
window.addEventListener( 'scroll' , () => {
    headerFixed();
});

//要素をホバーしたらバウンスする処理を発火
const $bounceTargets = document.querySelectorAll(".u-hover-bounce");
const bounceOn = {
	scale: 1.1,
	duration: 1000,
	elasticity: 50
}
const bounceOff = {
	scale: 1,
	duration: 500,
	elasticity: 0
}
$bounceTargets.forEach($target =>{
	$target.addEventListener('mouseenter', animations.hoverBounce.bind(bounceOn));
	$target.addEventListener('touchstart', animations.hoverBounce.bind(bounceOn));
	$target.addEventListener('mouseleave', animations.hoverBounce.bind(bounceOff));
	$target.addEventListener('touchend', animations.hoverBounce.bind(bounceOff));
});
