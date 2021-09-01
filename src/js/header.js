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
export {headerFixed};
