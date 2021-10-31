import { ScreenFixed } from "./_screen-fixed";
import { headerFixed } from "./_header";
import { bgLayer } from "./_bg-layer";

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
		bgLayer(e.currentTarget);
		e.currentTarget.textContent;
		if(!e.currentTarget.classList.contains("is-opened")) {
			let $targets = document.querySelectorAll(".is-opened");
			$targets.forEach(($target) => {
				$target.classList.remove("is-opened");
			});
			e.currentTarget.textContent = "close";
		} else {
			e.currentTarget.textContent = "menu";
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
	$gnav.style.paddingTop = `${headerHeight + wpadminbarHeight}px`;
}
export {gnavToggle , gnavPosition};
