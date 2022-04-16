/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./_src/js/_animations.js":
/*!********************************!*\
  !*** ./_src/js/_animations.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "animations": () => (/* binding */ animations)
/* harmony export */ });

const animations = {
	hoverBounce (event) {
		anime.remove(event.currentTarget);
		anime({
			targets: event.currentTarget,
			scale: this.scale,
			duration: this.duration,
			elasticity: this.elasticity
		});
	},
	delayFadeinUp () {
		anime({
			targets: ".u-dalay-fadein-up",
			keyframes:[
				{opacity : 0 ,translateY:40},
				{opacity : 1,translateY:0}
			],
			duration: 2000,
			easing: 'easeOutCirc',
			delay: anime.stagger(200, {start: 0})
		})
	}
}




/***/ }),

/***/ "./_src/js/_bg-layer.js":
/*!******************************!*\
  !*** ./_src/js/_bg-layer.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "bgLayer": () => (/* binding */ bgLayer)
/* harmony export */ });
const bgLayer = (e) => {
	if(e) {
		let $bgLayer = document.createElement('div');
		$bgLayer.className ="l-bg-layer";
		anime({
			targets: $bgLayer,
			keyframes:[
				{opacity:0},
				{opacity:.4},
				{opacity:1}
			],
			duration: 300,
			easing: 'linear'
		})
		if(!e.classList.contains("is-opened")) {
			document.getElementById("wrapper").insertBefore($bgLayer , document.getElementById("header"));
		} else {
			if(document.querySelector(".l-bg-layer")) {
				document.querySelector(".l-bg-layer").parentNode.removeChild(document.querySelector(".l-bg-layer"));
			}
		}
	}
}



/***/ }),

/***/ "./_src/js/_gnav.js":
/*!**************************!*\
  !*** ./_src/js/_gnav.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "gnavToggle": () => (/* binding */ gnavToggle),
/* harmony export */   "gnavPosition": () => (/* binding */ gnavPosition)
/* harmony export */ });
/* harmony import */ var _screen_fixed__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_screen-fixed */ "./_src/js/_screen-fixed.js");
/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_header */ "./_src/js/_header.js");
/* harmony import */ var _bg_layer__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./_bg-layer */ "./_src/js/_bg-layer.js");




//グローバルナビゲーションの開閉処理
const gnavToggle = () => {
	const screenFixed = new _screen_fixed__WEBPACK_IMPORTED_MODULE_0__.ScreenFixed();
	const $gnavBtn = document.getElementById("gnavBtn");
	const $gnav = document.getElementById("gnav");

	$gnavBtn.addEventListener('click', (e) => {
		let $bgLayer = document.querySelector(".l-bg-layer");
		if($bgLayer) {
			$bgLayer.parentNode.removeChild(document.querySelector(".l-bg-layer"));
		}
		(0,_bg_layer__WEBPACK_IMPORTED_MODULE_2__.bgLayer)(e.currentTarget);
		e.currentTarget.textContent;
		if(!e.currentTarget.classList.contains("is-opened")) {
			let $targets = document.querySelectorAll(".is-opened");
			$targets.forEach(($target) => {
				$target.classList.remove("is-opened");
			});
		}
		if(document.getElementById("searchBtn").textContent === "close"){document.getElementById("searchBtn").textContent = "search";};
		e.currentTarget.textContent = e.currentTarget.textContent === "close" ? "menu ": "close";
		e.currentTarget.classList.toggle("is-opened");
		$gnav.classList.toggle("is-opened");
		if($gnav.classList.contains("is-opened")) {
			screenFixed.fixed();
			(0,_header__WEBPACK_IMPORTED_MODULE_1__.headerFixed)();
		} else {
			screenFixed.reset();
			(0,_header__WEBPACK_IMPORTED_MODULE_1__.headerFixed)();
		}
	});
}
const gnavPosition = () => {
	const $gnav = document.getElementById("gnav");
	const headerHeight = document.getElementById("header").offsetHeight;
	//WordPressの管理バーが表示されている場合は高さを取得
	//表示されていない場合は0を代入
	const wpadminbarHeight = document.getElementById('wpadminbar') ? document.getElementById('wpadminbar').offsetHeight : 0 ;
	$gnav.style.paddingTop = `${headerHeight + wpadminbarHeight}px`;
}



/***/ }),

/***/ "./_src/js/_header.js":
/*!****************************!*\
  !*** ./_src/js/_header.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "headerFixed": () => (/* binding */ headerFixed)
/* harmony export */ });
//ヘッダー固定
const headerFixed = () => {
	const $header = document.getElementById("header");
	const $wrapper = document.getElementById("wrapper");
	const $gnav = document.getElementById("gnav");

	//WordPressの管理バーが表示されている場合は高さを取得
	//表示されていない場合は0を代入
	const wpadminbarHeight = document.getElementById('wpadminbar') ? document.getElementById('wpadminbar').offsetHeight : 0 ;

	let headerHeight = $header.offsetHeight;
	let scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

	if(!$gnav.classList.contains("is-opened")) {
		if( scrollPosition >= headerHeight) {
			$header.classList.add("is-scrolled");
			$header.style.top = wpadminbarHeight + "px";
			$wrapper.style.paddingTop = headerHeight + "px";
		} else {
			$header.classList.remove("is-scrolled");
			$header.style.top = null;
			$wrapper.style.paddingTop = null;
		}
	}
}



/***/ }),

/***/ "./_src/js/_screen-fixed.js":
/*!**********************************!*\
  !*** ./_src/js/_screen-fixed.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "ScreenFixed": () => (/* binding */ ScreenFixed)
/* harmony export */ });
/**
 * 画面の高さを固定化する処理
 */
class ScreenFixed {
	constructor(scrollPosition) {
		this.scrollPosition = scrollPosition;
	}
	fixed () {
		//WordPressの管理バーが表示されている場合は高さを取得
		const wpadminbarHeight = document.getElementById('wpadminbar') ? document.getElementById('wpadminbar').offsetHeight : 0 ;
		this.scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
		document.getElementById("wrapper").style.position = "fixed";
		document.getElementById("wrapper").style.width = "100%";
		document.getElementById("wrapper").style.zIndex = `1`;
		document.getElementById("wrapper").style.top = `-${this.scrollPosition - wpadminbarHeight}px`;
	}
	reset () {
		//スタイルシートを削除
		document.getElementById("wrapper").style.position = null;
		document.getElementById("wrapper").style.width = null;
		document.getElementById("wrapper").style.zIndex = null;
		document.getElementById("wrapper").style.top = null;
		//記憶したスクロール位置に移動
		document.scrollingElement.scrollTop = this.scrollPosition;
	}
}



/***/ }),

/***/ "./_src/js/_search.js":
/*!****************************!*\
  !*** ./_src/js/_search.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "searchToggle": () => (/* binding */ searchToggle),
/* harmony export */   "searchPosition": () => (/* binding */ searchPosition)
/* harmony export */ });
/* harmony import */ var _bg_layer__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_bg-layer */ "./_src/js/_bg-layer.js");


const searchToggle = () => {
	if(document.querySelector(".l-bg-layer")) {
		document.querySelector(".l-bg-layer").parentNode.removeChild(document.querySelector(".l-bg-layer"));
	}
	const $searchBtn = document.getElementById("searchBtn");
	const $searchForm = document.getElementById("searchForm");
	let headerHeight = document.getElementById("header").offsetHeight;
	$searchBtn.addEventListener("click", (e) => {
		let $isOpenElements = document.querySelectorAll("is-opened");
		$isOpenElements.forEach((isOpenElement)=>{
			isOpenElement.classList.remove("is-opened");
		});
		(0,_bg_layer__WEBPACK_IMPORTED_MODULE_0__.bgLayer)(e.currentTarget);
		if(document.getElementById("gnavBtn").textContent === "close"){document.getElementById("gnavBtn").textContent = "menu";};
		e.currentTarget.textContent = e.currentTarget.textContent === "close" ? "search" : "close";
		e.currentTarget.classList.toggle("is-opened");
		$searchForm.classList.toggle("is-opened");
	});
}

/**
 * 検索フォームの位置
 */
const searchPosition = () => {
	//WordPressの管理バーが表示されている場合は高さを取得
	//表示されていない場合は0を代入
	const wpadminbarHeight = document.getElementById('wpadminbar') ? document.getElementById('wpadminbar').offsetHeight : 0 ;
	const $searchForm = document.getElementById("searchForm");
	const headerHeight = document.getElementById("header").offsetHeight;
	$searchForm.style.top = `{headerHeight} + {wpadminbarHeight}px`;
}



/***/ }),

/***/ "./_src/js/_wp-embed.js":
/*!******************************!*\
  !*** ./_src/js/_wp-embed.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "wpEmbedVideo": () => (/* binding */ wpEmbedVideo)
/* harmony export */ });
/**
 * 埋め込み動画のサイズに応じて
 * 自動的に高さを変える処理
 */
const wpEmbedVideo = () => {
	const $embedVideos = document.querySelectorAll(".is-type-video iframe");
	$embedVideos.forEach(($embedVideo)=>{
		let embedWidth =  $embedVideo.clientWidth;
		let embedAttrWidth =  $embedVideo.getAttribute('width');
		let embedAttrHeight =  $embedVideo.getAttribute('height');
		$embedVideo.style.height = embedWidth / embedAttrWidth * embedAttrHeight + "px";
	});
}



/***/ }),

/***/ "./_src/js/_wp-query.js":
/*!******************************!*\
  !*** ./_src/js/_wp-query.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "wpQueryThumnail": () => (/* binding */ wpQueryThumnail)
/* harmony export */ });
/**
 *
 *
 */
const wpQueryThumnail = () => {
	const $queryThumbnails = document.querySelectorAll(".wp-block-column.is-thumbnail");
	const span = document.createElement("span");
	$queryThumbnails.forEach(($queryThumbnail)=>{
		if(!$queryThumbnail.hasChildNodes()) {
			$queryThumbnail.innerHTML = `<div class="is-noimage"><span class="material-icons-outlined">image</span></div>`
		}
	});
}



/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*************************!*\
  !*** ./_src/js/main.js ***!
  \*************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _gnav__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_gnav */ "./_src/js/_gnav.js");
/* harmony import */ var _search__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_search */ "./_src/js/_search.js");
/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./_header */ "./_src/js/_header.js");
/* harmony import */ var _animations__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./_animations */ "./_src/js/_animations.js");
/* harmony import */ var _wp_embed__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./_wp-embed */ "./_src/js/_wp-embed.js");
/* harmony import */ var _wp_query__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./_wp-query */ "./_src/js/_wp-query.js");







/**
 * 関数の発火処理
 */
//最初の HTML 文書の読み込みと解析が完了したとき、スタイルシート、画像、サブフレームの読み込みが完了するのを待たずに発火
window.addEventListener('DOMContentLoaded', () => {
    (0,_gnav__WEBPACK_IMPORTED_MODULE_0__.gnavPosition)();
    (0,_search__WEBPACK_IMPORTED_MODULE_1__.searchPosition)();
    (0,_gnav__WEBPACK_IMPORTED_MODULE_0__.gnavToggle)();
    (0,_search__WEBPACK_IMPORTED_MODULE_1__.searchToggle)();
    (0,_header__WEBPACK_IMPORTED_MODULE_2__.headerFixed)();
    (0,_wp_embed__WEBPACK_IMPORTED_MODULE_4__.wpEmbedVideo)();
	(0,_wp_query__WEBPACK_IMPORTED_MODULE_5__.wpQueryThumnail)();
});
//ページ全体が、スタイルシートや画像などのすべての依存するリソースを含めて読み込まれたときに発火
window.addEventListener('load', () => {
    _animations__WEBPACK_IMPORTED_MODULE_3__.animations.delayFadeinUp();
});

//画面をリサイズしたときに発火
let queue = null,
    wait = 100;
window.addEventListener( 'resize', () => {
    clearTimeout( queue );
    queue = setTimeout(() => {
        (0,_gnav__WEBPACK_IMPORTED_MODULE_0__.gnavPosition)();
        (0,_search__WEBPACK_IMPORTED_MODULE_1__.searchPosition)();
        (0,_wp_embed__WEBPACK_IMPORTED_MODULE_4__.wpEmbedVideo)();
    }, wait);
},false);

//画面をスクロール時に実行
window.addEventListener( 'scroll' , () => {
    (0,_header__WEBPACK_IMPORTED_MODULE_2__.headerFixed)();
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
	$target.addEventListener('mouseenter', _animations__WEBPACK_IMPORTED_MODULE_3__.animations.hoverBounce.bind(bounceOn));
	$target.addEventListener('touchstart', _animations__WEBPACK_IMPORTED_MODULE_3__.animations.hoverBounce.bind(bounceOn));
	$target.addEventListener('mouseleave', _animations__WEBPACK_IMPORTED_MODULE_3__.animations.hoverBounce.bind(bounceOff));
	$target.addEventListener('touchend', _animations__WEBPACK_IMPORTED_MODULE_3__.animations.hoverBounce.bind(bounceOff));
});

})();

/******/ })()
;
//# sourceMappingURL=main.js.map