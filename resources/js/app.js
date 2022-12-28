import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Slider components
document.addEventListener("DOMContentLoaded", () => {
    const slider = document.querySelector("#slider");
    setTimeout(function moveSlide() {
        const max = slider.scrollWidth - slider.clientWidth;
        const left = slider.clientWidth;

        if (max === slider.scrollLeft) {
            slider.scrollTo({
                left: 0,
                behavior: "smooth",
            });
        } else {
            slider.scrollBy({
                left,
                behavior: "smooth",
            });
        }

        setTimeout(moveSlide, 5000);
    }, 5000);
});
// End of Slider components
