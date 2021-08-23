//ヘッダー固定
const headerFixed = () => {
    const $header = document.getElementById("header");
    const $wrapper = document.getElementById("wrapper");
    const $gnav = document.getElementById("gnav");

    let headerHeight = $header.offsetHeight;
    let scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

    console.log($gnav.classList.contains("is-opened"));
    if(!$gnav.classList.contains("is-opened")) {
        if( scrollPosition >= headerHeight) {
            $header.classList.add("is-scrolled");
            $wrapper.style.paddingTop = headerHeight + "px";
        } else {
            $header.classList.remove("is-scrolled");
            $wrapper.style.paddingTop = null;
        }
    }
}
export {headerFixed};
