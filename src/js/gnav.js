import { ScreenFixed } from "./screen-fixed";
import { headerFixed } from "./header-fixed";

//グローバルナビゲーションの開閉処理
const screenFixed = new ScreenFixed();

const gnavToggle = () => {
    const $gnavBtn = document.getElementById("gnavBtn");
    const $gnav = document.getElementById("gnav");

    $gnavBtn.addEventListener( "click", (e) => {
        let $bgLayer = document.querySelector(".l-bg-layer");
        if($bgLayer) {
            $bgLayer.parentNode.removeChild(document.querySelector(".l-bg-layer"));
        }
        bgElement(e.currentTarget);
        e.currentTarget.classList.toggle("is-opened");
        $gnav.classList.toggle("is-opened");
        if($gnav.classList.contains("is-opened")) {
           screenFixed.fixed();
           headerFixed();
        } else {
           screenFixed.reset();
           headerFixed();
        }
    });
}
const gnavPosition = () => {
    const $gnav = document.getElementById("gnav");
    const headerHeight = document.getElementById("header").offsetHeight;
    $gnav.style.paddingTop = headerHeight + "px";
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


export {gnavToggle , gnavPosition , bgElement};
