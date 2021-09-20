
class Animation {
    hoverBounce () {
        const $targets = document.querySelectorAll(".hover-bounce");
        if($targets) {
            $targets.forEach($target =>{
                $target.addEventListener('mouseenter', (e) => {
                    cardEffects(e.currentTarget , 0.95, 800, 400);
                });
                $target.addEventListener('touchstart', (e) => {
                    cardEffects(e.currentTarget , 0.95, 800, 400);
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
}
export {Animation};
