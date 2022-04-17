
const animations = {
	hoverBounce (event) {
		anime.remove(event.currentTarget);
		anime({
			targets: event.currentTarget,
			scale: this.scale,
			duration: this.duration,
			elasticity: this.elasticity
		});
	},
	delayFadeinUp () {
		anime({
			targets: ".u-dalay-fadein-up",
			keyframes:[
				{opacity : 0 ,translateY:40},
				{opacity : 1,translateY:0}
			],
			duration: 2000,
			easing: 'easeOutCirc',
			delay: anime.stagger(200, {start: 0})
		})
	}
}

export {animations};
