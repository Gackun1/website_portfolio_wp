document.addEventListener("DOMContentLoaded", () => {
    const elms = document.querySelectorAll(".js-image-popup");
    elms.forEach(elm => {
        const button = elm.querySelector(".js-image-popup__button");
        const bg = elm.querySelector(".js-image-popup__bg");
        const closeButton = elm.querySelector(".js-image-popup__close-button");
        const zoomButton = elm.querySelector(".js-image-popup__zoom-button");
        // button.addEventListener("click", () => {
        //     bg.classList.toggle("js-image-popup__is-show");
        // });
        // bg.addEventListener("click", () => {
        //     bg.classList.toggle("js-image-popup__is-show");
        // });
        // closeButton.addEventListener("click", () => {
        //     bg.classList.toggle("js-image-popup__is-show");
        // });
        // zoomButton.addEventListener("click", () => {
        //     bg.classList.toggle("js-image-popup__is-show");
        // });
        for (const elm of [button, bg, closeButton, zoomButton]) {
            elm.addEventListener("click", () => {
                bg.classList.toggle("js-image-popup__is-show");
            });
        }
    });
});