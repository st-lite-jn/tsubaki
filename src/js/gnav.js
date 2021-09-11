import { ScreenFixed } from "./screen-fixed";
import { headerFixed } from "./header";

//グローバルナビゲーションの開閉処理
const gnavToggle = () => {
    const screenFixed = new ScreenFixed();
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


export {gnavToggle , gnavPosition , bgElement};
