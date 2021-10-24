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
export {ScreenFixed};
