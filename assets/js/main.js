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

/***/ "./src/js/carousels.js":
/*!*****************************!*\
  !*** ./src/js/carousels.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "carousels": () => (/* binding */ carousels)
/* harmony export */ });
//カルーセル処理
const carousels = () => {
    //トップページのメインカルーセル
    if($(".p-carousel-main .swiper-slide").length > 1)  {
        const carouselHome = new Swiper ('.p-carousel-main', {
            loop:true,
            centeredSlides: true,
            slidesPerView: 1,
            speed: 1000,
            autoHeight: true,
            autoplay: {
                delay: 5000,
                stopOnLastSlide: false,
                disableOnInteraction: false,
                reverseDirection: false
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            }
        });
    }
}




/***/ }),

/***/ "./src/js/gnav.js":
/*!************************!*\
  !*** ./src/js/gnav.js ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "gnavToggle": () => (/* binding */ gnavToggle),
/* harmony export */   "gnavPosition": () => (/* binding */ gnavPosition),
/* harmony export */   "bgElement": () => (/* binding */ bgElement)
/* harmony export */ });
/* harmony import */ var _screen_fixed__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./screen-fixed */ "./src/js/screen-fixed.js");
/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./header */ "./src/js/header.js");



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
        $bgLayer.className ="l-bg-layer animate__animated animate__fadeIn";
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

/***/ "./src/js/header.js":
/*!**************************!*\
  !*** ./src/js/header.js ***!
  \**************************/
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

/***/ "./src/js/main.js":
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _gnav__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./gnav */ "./src/js/gnav.js");
/* harmony import */ var _search__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./search */ "./src/js/search.js");
/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./header */ "./src/js/header.js");
/* harmony import */ var _over_container__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./over-container */ "./src/js/over-container.js");
/* harmony import */ var _carousels__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./carousels */ "./src/js/carousels.js");






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
        (0,_over_container__WEBPACK_IMPORTED_MODULE_3__.overContainer)();
        (0,_gnav__WEBPACK_IMPORTED_MODULE_0__.gnavPosition)();
        (0,_search__WEBPACK_IMPORTED_MODULE_1__.searchPosition)();
    }, wait);
},false);

window.addEventListener("DOMContentLoaded",()=>{
    (0,_over_container__WEBPACK_IMPORTED_MODULE_3__.overContainer)();
    (0,_gnav__WEBPACK_IMPORTED_MODULE_0__.gnavPosition)();
    (0,_search__WEBPACK_IMPORTED_MODULE_1__.searchPosition)();
    (0,_carousels__WEBPACK_IMPORTED_MODULE_4__.carousels)();
    (0,_gnav__WEBPACK_IMPORTED_MODULE_0__.gnavToggle)();
    (0,_search__WEBPACK_IMPORTED_MODULE_1__.searchToggle)();
    (0,_header__WEBPACK_IMPORTED_MODULE_2__.headerFixed)();
    //スクロール時に実行
    window.addEventListener( 'scroll' , () => {
        (0,_header__WEBPACK_IMPORTED_MODULE_2__.headerFixed)();
    });
});




/***/ }),

/***/ "./src/js/over-container.js":
/*!**********************************!*\
  !*** ./src/js/over-container.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "overContainer": () => (/* binding */ overContainer)
/* harmony export */ });
/**
 * l-containerクラス内の要素の横幅を
 * 画面幅まで拡大する処理
 */
const overContainer = () => {
    const containerStyles = getComputedStyle(document.querySelector(".l-container"));
    const containerPaddingRightLeft = parseInt(containerStyles.getPropertyValue("padding-left")) + parseInt(containerStyles.getPropertyValue("padding-right"));
    //console.log(containerPaddingRightLeft);
    const windwoWidth = window.innerWidth;
    // console.log(windwoWidth);
    const $overContainers = document.querySelectorAll(".is-over-container");
    // console.log($overContainers);
    if($overContainers) {
        $overContainers.forEach($overContainer => {
            //console.log($overContainer);
            $overContainer.style.marginRight = (windwoWidth - containerPaddingRightLeft) / 2 * -1 + "px";
            $overContainer.style.marginLeft = (windwoWidth - containerPaddingRightLeft) / 2 * -1 + "px";
        });
    }
}



/***/ }),

/***/ "./src/js/screen-fixed.js":
/*!********************************!*\
  !*** ./src/js/screen-fixed.js ***!
  \********************************/
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

/***/ "./src/js/search.js":
/*!**************************!*\
  !*** ./src/js/search.js ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "searchToggle": () => (/* binding */ searchToggle),
/* harmony export */   "searchPosition": () => (/* binding */ searchPosition)
/* harmony export */ });
/* harmony import */ var _gnav__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./gnav */ "./src/js/gnav.js");

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