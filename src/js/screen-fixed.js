//画面を固定化する処理
class ScreenFixed {
    constructor(scrollPosition) {
        this.scrollPosition = scrollPosition;
    }

    fixed () {

        this.scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
        document.getElementById("wrapper").style.position = "fixed";
        document.getElementById("wrapper").style.width = "100%";
        document.getElementById("wrapper").style.zIndex = "1";
        document.getElementById("wrapper").style.top = "-" + this.scrollPosition + "px";
    }
    reset () {
        const $wrapper = document.getElementById("wrapper");
        //スタイルシートを削除
        document.getElementById("wrapper").style.position = null;
        document.getElementById("wrapper").style.width = null;
        document.getElementById("wrapper").style.zIndex = null;
        document.getElementById("wrapper").style.top = null;
        //記憶したスクロール位置に移動
        document.scrollingElement.scrollTop = this.scrollPosition;
    }
}
export {ScreenFixed};
