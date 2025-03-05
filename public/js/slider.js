var slider = tns({
    arrowKeys: true,
    autoplay: false,
    container: ".js-slider-product-tray",
    controls: true,
    controlsContainer: ".js-controls",
    gutter: 10,
    items: 1,
    loop: true,
    mouseDrag: true,
    nav: false,
    responsive: {
        360: {
            items: 1.08
        },
        600: {
            items: 3.1
        },
        900: {
            items: 4
        },
        1600: {
            items: 5
        },

    },
    slideBy: "page",
    touch: true
});
