/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/scss/style.scss":
/*!*****************************!*\
  !*** ./src/scss/style.scss ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/js/_animation.js":
/*!******************************!*\
  !*** ./src/js/_animation.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "Animation": () => (/* binding */ Animation)
/* harmony export */ });

class Animation {
    hoverBounce () {
        const $targets = document.querySelectorAll(".u-hover-bounce");
        if($targets) {
            $targets.forEach($target =>{
                $target.addEventListener('mouseenter', (e) => {
                    cardEffects(e.currentTarget , 0.9, 900, 400);
                });
                $target.addEventListener('touchstart', (e) => {
                    cardEffects(e.currentTarget , 0.9, 900, 400);
                });
                $target.addEventListener('mouseleave', (e) => {
                    cardEffects(e.currentTarget ,1.0, 600, 300);
                });
                $target.addEventListener('touchend', (e) => {
                    cardEffects(e.currentTarget ,1.0, 600, 300);
                });
            })
            const cardEffects = ( target , scale, duration, elasticity) => {
                anime.remove(target);
                anime({
                    targets: target,
                    scale: scale,
                    duration: duration,
                    elasticity: elasticity
                });
            }
        }
    }
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

/***/ "./src/js/_carousels.js":
/*!******************************!*\
  !*** ./src/js/_carousels.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "carousels": () => (/* binding */ carousels)
/* harmony export */ });
//カルーセル処理
const carousels = () => {
    //トップページのメインカルーセル
    // if($(".p-carousel-main .swiper-slide").length > 1)  {
    //     const carouselHome = new Swiper ('.p-carousel-main', {
    //         loop:true,
    //         centeredSlides: true,
    //         slidesPerView: 1,
    //         speed: 1000,
    //         autoHeight: true,
    //         autoplay: {
    //             delay: 5000,
    //             stopOnLastSlide: false,
    //             disableOnInteraction: false,
    //             reverseDirection: false
    //         },
    //         pagination: {
    //             el: '.swiper-pagination',
    //             type: 'bullets',
    //             clickable: true
    //         }
    //     });
    // }
}




/***/ }),

/***/ "./src/js/_gnav.js":
/*!*************************!*\
  !*** ./src/js/_gnav.js ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "gnavToggle": () => (/* binding */ gnavToggle),
/* harmony export */   "gnavPosition": () => (/* binding */ gnavPosition),
/* harmony export */   "bgElement": () => (/* binding */ bgElement)
/* harmony export */ });
/* harmony import */ var _screen_fixed__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_screen-fixed */ "./src/js/_screen-fixed.js");
/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_header */ "./src/js/_header.js");



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
        bgElement(e.currentTarget);
        if(!e.currentTarget.classList.contains("is-opened")) {
            let $targets = document.querySelectorAll(".is-opened");
            $targets.forEach(($target) => {
                $target.classList.remove("is-opened");
            });
        }
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
    $gnav.style.paddingTop = headerHeight + wpadminbarHeight + "px";
}
const bgElement = (e) => {
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

/***/ "./src/js/_header.js":
/*!***************************!*\
  !*** ./src/js/_header.js ***!
  \***************************/
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

/***/ "./src/js/_screen-fixed.js":
/*!*********************************!*\
  !*** ./src/js/_screen-fixed.js ***!
  \*********************************/
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
        document.getElementById("wrapper").style.zIndex = "1";
        document.getElementById("wrapper").style.top = "-" + (this.scrollPosition - wpadminbarHeight) + "px";
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

/***/ "./src/js/_search.js":
/*!***************************!*\
  !*** ./src/js/_search.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "searchToggle": () => (/* binding */ searchToggle),
/* harmony export */   "searchPosition": () => (/* binding */ searchPosition)
/* harmony export */ });
/* harmony import */ var _gnav__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_gnav */ "./src/js/_gnav.js");

const searchToggle = () => {
    if(document.querySelector(".l-bg-layer")) {
        document.querySelector(".l-bg-layer").parentNode.removeChild(document.querySelector(".l-bg-layer"));
    }
    const $searchBtn = document.getElementById("searchBtn");
    const $searchForm = document.getElementById("searchForm");
    let headerHeight = document.getElementById("header").offsetHeight;
    $searchBtn.addEventListener("click", (e) => {
        let $iopenElements = document.querySelectorAll("is-opened");
        $iopenElements.forEach((iopenElements)=>{
            iopenElements.classList.remove("is-opened");
        });
        (0,_gnav__WEBPACK_IMPORTED_MODULE_0__.bgElement)(e.currentTarget);
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
    $searchForm.style.top = headerHeight + wpadminbarHeight + "px";
}



/***/ }),

/***/ "./src/js/_wp-embed.js":
/*!*****************************!*\
  !*** ./src/js/_wp-embed.js ***!
  \*****************************/
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

/***/ "./src/js/main.js":
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _gnav__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_gnav */ "./src/js/_gnav.js");
/* harmony import */ var _search__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_search */ "./src/js/_search.js");
/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./_header */ "./src/js/_header.js");
/* harmony import */ var _carousels__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./_carousels */ "./src/js/_carousels.js");
/* harmony import */ var _animation__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./_animation */ "./src/js/_animation.js");
/* harmony import */ var _wp_embed__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./_wp-embed */ "./src/js/_wp-embed.js");







const animation = new _animation__WEBPACK_IMPORTED_MODULE_4__.Animation();

/**
 * 関数の発火処理
 */

//最初の HTML 文書の読み込みと解析が完了したとき、スタイルシート、画像、サブフレームの読み込みが完了するのを待たずに発火
window.addEventListener('DOMContentLoaded',()=>{
    (0,_gnav__WEBPACK_IMPORTED_MODULE_0__.gnavPosition)();
    (0,_search__WEBPACK_IMPORTED_MODULE_1__.searchPosition)();
    (0,_carousels__WEBPACK_IMPORTED_MODULE_3__.carousels)();
    (0,_gnav__WEBPACK_IMPORTED_MODULE_0__.gnavToggle)();
    (0,_search__WEBPACK_IMPORTED_MODULE_1__.searchToggle)();
    (0,_header__WEBPACK_IMPORTED_MODULE_2__.headerFixed)();
    (0,_wp_embed__WEBPACK_IMPORTED_MODULE_5__.wpEmbedVideo)();
    animation.hoverBounce();
    hljs.highlightAll();
});
//ページ全体が、スタイルシートや画像などのすべての依存するリソースを含めて読み込まれたときに発火
window.addEventListener('load', () => {
    animation.delayFadeinUp();
});

//画面をリサイズしたときに発火
let queue = null,
    wait = 100;
window.addEventListener( 'resize', () => {
    clearTimeout( queue );
    queue = setTimeout(() => {
        (0,_gnav__WEBPACK_IMPORTED_MODULE_0__.gnavPosition)();
        (0,_search__WEBPACK_IMPORTED_MODULE_1__.searchPosition)();
        (0,_wp_embed__WEBPACK_IMPORTED_MODULE_5__.wpEmbedVideo)();
    }, wait);
},false);

//画面をスクロール時に実行
window.addEventListener( 'scroll' , () => {
    (0,_header__WEBPACK_IMPORTED_MODULE_2__.headerFixed)();
});



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
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _js_main_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./js/main.js */ "./src/js/main.js");
/* harmony import */ var _scss_style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./scss/style.scss */ "./src/scss/style.scss");



})();

/******/ })()
;
//# sourceMappingURL=main.js.map