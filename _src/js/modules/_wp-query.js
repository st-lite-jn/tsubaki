/**
 *
 *
 */
export const wpQueryThumnail = () => {
	const $queryThumbnails = document.querySelectorAll(".wp-block-column.is-thumbnail");
	const span = document.createElement("span");
	$queryThumbnails.forEach(($queryThumbnail)=>{
		if(!$queryThumbnail.hasChildNodes()) {
			$queryThumbnail.innerHTML = `<div class="is-noimage"><span class="material-icons-outlined">image</span></div>`
		}
	});
}

