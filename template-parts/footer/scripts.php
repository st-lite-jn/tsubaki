<?php if(is_front_page()):?>
<script>
window.addEventListener('load', function() {
	//スライダー
	const homeswiper = new Swiper ('.swiper-container', {
		loop:true,
		centeredSlides: true,
		slidesPerView: 1,
		speed: 1000,
		autoHeight: true,
		autoplay: {
			delay: 5000,
			stopOnLastSlide: false,
			disableOnInteraction: false,
			reverseDirection: false
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev'
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true
		}
	});
},false);
</script>
<?php endif;?>
