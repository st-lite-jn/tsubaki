
class Animation {
    hoverBounce () {
        const $targets = document.querySelectorAll(".u-hover-bounce");
        if($targets) {
            $targets.forEach($target =>{
                $target.addEventListener('mouseenter', (e) => {
                    cardEffects(e.currentTarget , 0.9, 1000, 400);
                });
                $target.addEventListener('touchstart', (e) => {
                    cardEffects(e.currentTarget , 0.9, 1000, 400);
                });
                $target.addEventListener('mouseleave', (e) => {
                    cardEffects(e.currentTarget ,1.0, 600, 300);
                });
                $target.addEventListener('touchend', (e) => {
                    cardEffects(e.currentTarget ,1.0, 600, 300);
                });
            })
            const cardEffects = ( target , scale, duration, elasticity) => {
                anime.remove(target);
                anime({
                    targets: target,
                    scale: scale,
                    duration: duration,
                    elasticity: elasticity
                });
            }
        }
    }
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
export {Animation};
