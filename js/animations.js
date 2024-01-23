gsap.config({nullTargetWarn: false});

/* MAP INFO ANIMATION */

const TLMapInfo = gsap.timeline({defaults: {ease: 'power2.out'}});

TLMapInfo.fromTo('.map_info_anchor_right', {x: 500}, {
    x: 0,
    duration: 1
}).fromTo('.map_info .map_info_anchor_left', {x: -500}, {x: 0, duration: 1}, '-=1')
    .fromTo('.map_info .map_info_text h2', {opacity: 0, y: -25}, {opacity: 1, y: 0, duration: 1}, '-=0.5')
    .fromTo('.map_info .map_name_title', {opacity: 0, y: -25}, {opacity: 1, y: 0, duration: 1}, '-=0.8')
    .fromTo('.map_info .map_name', {opacity: 0, y: -25}, {opacity: 1, y: 0, duration: 1}, '-=0.8')
    .fromTo('.map_info .map_biographie_title', {opacity: 0, y: -25}, {opacity: 1, y: 0, duration: 1}, '-=0.8')
    .fromTo('.map_info .map_biographie', {opacity: 0, y: -25}, {opacity: 1, y: 0, duration: 1}, '-=0.8')
    .fromTo('.map_info .map_info_text hr', {scaleX: 0}, {scaleX: 1, duration: 1.5}, '-=0.5')

/* MAP PAGE ANIMATION */

const TLMapPage = gsap.timeline({defaults: {ease: 'power2.out'}});

TLMapPage.fromTo('.map .map_card .map_text h2', {opacity: 0, y: -150}, {
    opacity: 1,
    y: 0,
    duration: 1.5
}, '-=0.5')
    .fromTo('.map .map_card .map_text .map_biographie_title', {opacity: 0, y: -25}, {
        opacity: 1,
        y: 0,
        duration: 1
    }, '-=0.5')
    .fromTo('.map .map_card .map_text .map_biographie', {opacity: 0, y: -25}, {opacity: 1, y: 0, duration: 1}, '-=0.5')

/* ENCYCLOPEDIA PAGE ANIMATION */

const TLEncyclopediaPage = gsap.timeline({defaults: {ease: 'power2.out'}});

TLEncyclopediaPage
    .fromTo('.encyclopedia .encyclopedia_images_main', {scale: 0}, {scale: 1, duration: 1.5})
    .fromTo('.encyclopedia .encyclopedia_card .encyclopedia_text h2', {opacity: 0, y: -200}, {
        opacity: 1,
        y: 0,
        duration: 1.5
    }, '-=0.5')
    .fromTo('.encyclopedia .encyclopedia_card .encyclopedia_text p', {
        opacity: 0,
        y: -25
    }, {
        opacity: 1,
        y: 0,
        duration: 1
    }, '-=0.5')
    .fromTo('.encyclopedia .encyclopedia_card .encyclopedia_anchor_left', {
        x: -500
    }, {x: 0, duration: 1}, '-=0.8')
    .fromTo('.encyclopedia .encyclopedia_card .encyclopedia_anchor_right', {
        x: 500
    }, {x: 0, duration: 1}, '-=1')
    .fromTo('.encyclopedia hr', {scaleX: 0}, {scaleX: 1, duration: 1.5}, '-=0.5')
