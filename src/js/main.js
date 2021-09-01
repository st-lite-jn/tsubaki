import {gnavToggle , gnavPosition} from "./gnav";
import {searchToggle , searchPosition} from "./search";
import {headerFixed} from "./header";

import {carousels} from "./carousels";

//
// 	const $wrapper = $("#wrapper"),
// 		  $header = $("#header"),
// 		  $gnav = $(".l-gnav"),
// 		  $gnavBtn = $(".l-header-utility__item--gnav"),
// 		  $gnavItem = $(".l-gnav-main__item"),
// 		  $dropDown = $(".p-dropdown-sub"),
// 		  $dropDownBtn = $(".p-dropdown-btn"),
// 		  $search = $(".l-header-search"),
// 		  $searchBtn = $(".l-header-utility__item--search"),
// 		  $accordionBtn = $(".js-accordion")



// 	const gnavToggle = () => {
// 		//グローバルナビゲーションの開閉処理
// 		$gnavBtn.on("click",function() {
// 			if($(this).hasClass('is-opened')) {
// 				bgElement($gnavBtn);
// 				$(this).removeClass("is-opened");
// 				$gnav.removeClass("is-opened");
// 				$gnav.addClass("is-closed");
// 				$gnav.attr("aria-hidden","true");
// 				$search.removeClass("is-opened");
// 				bodyFixReset();
// 				headerFixed();
// 			} else {
// 				if($(".l-bg-layer").length === 0 ) {
// 					bgElement($gnavBtn);
// 				}
// 				$(this).addClass("is-opened");
// 				$gnav.removeClass("is-closed");
// 				$gnav.addClass("is-opened");
// 				$gnav.attr("aria-hidden","false");
// 				$search.removeClass("is-opened");
// 				$searchBtn.removeClass("is-opened");
// 				bodyFix();
// 			}
// 			$(".l-bg-layer").on("click",function(){
// 				bgElement();
// 				$gnavBtn.removeClass("is-opened");
// 				$gnav.removeClass("is-opened");
// 				$gnav.addClass("is-closed");
// 				bodyFixReset();
// 				headerFixed();
// 			});
// 		});
// 	}
// 	const searchToggle = () =>{
// 		$searchBtn.on("click",function() {
// 			if($(this).hasClass("is-opened")){
// 				bgElement($searchBtn);
// 				$(this).removeClass("is-opened");
// 				$search.removeClass("is-opened");
// 			} else {
// 				if($(".l-bg-layer").length === 0 ) {
// 					bgElement($searchBtn);
// 				}
// 				$(this).addClass("is-opened");
// 				$search.addClass("is-opened");
// 			}
// 			$(".l-bg-layer").on("click",function(){
// 				bgElement();
// 				$searchBtn.removeClass("is-opened");
// 				$search.removeClass("is-opened");
// 			})
// 		});
// 	}

// 	const bgElement = (e = null) => {
// 		if(e) {
// 			if(!e.hasClass("is-opened")) {
// 				$('<div class="l-bg-layer animate__fadeIn animate__animated"></div>').appendTo("#header");
// 			} else {
// 				$(".l-bg-layer").remove();
// 			}
// 		} else {
// 			$(".l-bg-layer").remove();
// 		}
// 	}

// 	const accordionToggle = ()=>{
// 		$accordionBtn.on("click",function(){
// 			if($(this).hasClass("is-opened")) {
// 				$(this).next().slideUp();
// 				$(this).next().attr("aria-hidden","true");
// 				$(this).next().attr("aria-disabled","true");
// 				$(this).removeClass("is-opened");
// 			} else {
// 				$(this).next().slideDown();
// 				$(this).next().attr("aria-hidden","false");
// 				$(this).next().attr("aria-disabled","false");
// 				$(this).addClass("is-opened");
// 			}
// 		});
// 	}


// 	//画面をスクロールするとヘッダーの背景色がつく処理
// 	const headerBgColor = () => {
// 		let flagHeight;
// 		//トップページはスライダーの高さを超えると背景色がつく
// 		if($wrapper.hasClass("is-home")) {
// 			flagHeight = $(".p-carousel-parent").outerHeight();
// 		//下層ページはヘッダーの高さを超えると背景色がつく
// 		} else {
// 			flagHeight= $("#header").outerHeight();
// 		}
// 		if(flagHeight < window.scrollY) {
// 			$header.addClass("is-active");
// 		} else {
// 			$header.removeClass("is-active");
// 		}
// 	}



// 	const dropDownOpen = () => {
// 		$dropDownBtn.on("click keyup", function () {
// 			$(this).toggleClass("is-opened");
// 			$dropDown.slideToggle();
// 		});
// 	}

// 	function naviCurrent() {
// 		const path = location.pathname;
// 		const dir = path.substring(0, path.lastIndexOf('/')) + '/';
// 		const rootDir = dir.split("/");
// 		$gnavItem.each(function(i){
// 			if($(this).hasClass(rootDir[1])){
// 				$(this).addClass("is-current");
// 			}
// 		});
// 	}

// 	window.addEventListener("DOMContentLoaded",()=>{
// 		headerFixed();
// 		carousels();
// 		searchToggle();
// 		gnavToggle();
// 		dropDownOpen();
// 		naviCurrent();
// 		accordionToggle();
// 		window.addEventListener('scroll',()=>{
// 			headerBgColor();
// 		});
// 	});

// 	let queue = null, // キューをストック
// 		wait = 100;
// 	window.addEventListener( 'resize', function() {
// 		clearTimeout( queue );
// 		queue = setTimeout(function() {
// 			// リサイズ時に行う処理
// 			headerFixed();
// 			bodyFixReset();
// 		}, wait);
// 	},false);
//

let queue = null,
    wait = 100;
window.addEventListener( 'resize', function() {
    clearTimeout( queue );
    queue = setTimeout(function() {
        gnavPosition();
        searchPosition();
    }, wait);
},false);

window.addEventListener("DOMContentLoaded",()=>{
    gnavPosition();
    searchPosition();
    carousels();
    gnavToggle();
    searchToggle();
    headerFixed();
    //スクロール時に実行
    window.addEventListener( 'scroll' , () => {
        headerFixed();
    });
});


