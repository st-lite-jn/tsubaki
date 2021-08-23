import {bgElement} from "./gnav";
const searchToggle = () => {
    if(document.querySelector(".l-bg-layer")) {
        document.querySelector(".l-bg-layer").parentNode.removeChild(document.querySelector(".l-bg-layer"));
    }
    const $searchBtn = document.getElementById("searchBtn");
    const $searchForm = document.getElementById("searchForm");
    let headerHeight = document.getElementById("header").offsetHeight;
    $searchBtn.addEventListener("click", (e) => {
        bgElement(e.currentTarget);
        e.currentTarget.classList.toggle("is-opened");
        $searchForm.classList.toggle("is-opened");
    });
}
const searchPosition = () => {
    const $searchForm = document.getElementById("searchForm");
    const headerHeight = document.getElementById("header").offsetHeight;
    $searchForm.style.top = headerHeight + "px";
}
export {searchToggle , searchPosition};
