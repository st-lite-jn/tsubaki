import { bgLayer } from "./_bg-layer";

const searchToggle = () => {
	if(document.querySelector(".l-bg-layer")) {
		document.querySelector(".l-bg-layer").parentNode.removeChild(document.querySelector(".l-bg-layer"));
	}
	const $searchBtn = document.getElementById("searchBtn");
	const $searchForm = document.getElementById("searchForm");
	let headerHeight = document.getElementById("header").offsetHeight;
	$searchBtn.addEventListener("click", (e) => {
		let $isOpenElements = document.querySelectorAll("is-opened");
		$isOpenElements.forEach((isOpenElement)=>{
			isOpenElement.classList.remove("is-opened");
		});
		bgLayer(e.currentTarget);
		if(document.getElementById("gnavBtn").textContent === "close"){document.getElementById("gnavBtn").textContent = "menu";};
		e.currentTarget.textContent = e.currentTarget.textContent === "close" ? "search" : "close";
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
export {searchToggle , searchPosition};
