//画面を固定化する処理
class BodyFixed {
    constructor(scrollPosition) {
        this.scrollPosition = scrollPosition;
    }
    fixed () {
        this.scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
        document.body.style.cssText = "position:fixed;width:100%;z-index:1;top:-" + this.scrollPosition + "px";
    }
    reset () {
        //スタイルシートを削除
        document.body.style.cssText = "position:;width:;z-index:;top:"
        //記憶したスクロール位置に移動
        document.scrollingElement.scrollTop = this.scrollPosition;
    }
}
export {BodyFixed};
