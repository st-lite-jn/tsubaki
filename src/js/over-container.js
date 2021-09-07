/**
 * l-containerクラス内の要素の横幅を
 * 画面幅まで拡大する処理
 */
const overContainer = () => {
    const containerStyles = getComputedStyle(document.querySelector(".l-container"));
    const containerPaddingRightLeft = parseInt(containerStyles.getPropertyValue("padding-left")) + parseInt(containerStyles.getPropertyValue("padding-right"));
    //console.log(containerPaddingRightLeft);
    const windwoWidth = window.innerWidth;
    // console.log(windwoWidth);
    const $overContainers = document.querySelectorAll(".is-over-container");
    // console.log($overContainers);
    if($overContainers) {
        $overContainers.forEach($overContainer => {
            //console.log($overContainer);
            $overContainer.style.marginRight = (windwoWidth - containerPaddingRightLeft) / 2 * -1 + "px";
            $overContainer.style.marginLeft = (windwoWidth - containerPaddingRightLeft) / 2 * -1 + "px";
        });
    }
}
export {overContainer};
