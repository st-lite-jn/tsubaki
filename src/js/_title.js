
const title = () => {
    anime({
        targets: ".fadeInUp",
        keyframes:[
            {opacity : 0 ,translateY:20},
            {opacity : 1,translateY:0}
        ],
        duration: 1000,
        easing: 'easeOutCirc',
        delay: anime.stagger(250, {start: 0})
    })
}
export {title};
