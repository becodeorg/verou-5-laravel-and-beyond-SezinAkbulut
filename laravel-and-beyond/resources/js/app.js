window.$ = window.jQuery = require('jquery');
require('owl.carousel');
require('./bootstrap');
require('owl.carousel/dist/assets/owl.carousel.min.css');


//toggle
document.addEventListener('DOMContentLoaded', function () {
    const toggleModeButton = document.getElementById('toggle-mode');
    const headerImage = document.getElementById('header-image');
    const slider = document.getElementById('slider');

    if (toggleModeButton && headerImage) {
        toggleModeButton.addEventListener('click', function () {
            // Toggle the mode (this is just an example, you need your own logic)
            const currentMode = document.body.classList.contains('light-mode') ? 'night' : 'day';

            // Update the body class to reflect the new mode
            document.body.classList.toggle('light-mode');
            document.body.classList.toggle('dark-mode');

            // Update the header image based on the mode
            headerImage.src = `/images/${currentMode}-header.png`;

            // Move the slider based on the mode
            if (currentMode === 'night') {
                slider.style.transform = 'translateX(16px)';
            } else {
                slider.style.transform = 'translateX(0)';
            }
        });
    }
});





//home page carousel for popular trend products
$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        items: 3,
        loop: true,
        nav: true,
        margin: 20,
        responsive: {
            0: {items: 1},
            600: {items: 2},
            1000: {items: 3},
        }
    });
});




//scroll down arrow
document.getElementById('scrollDown').addEventListener('click', function (event) {
    event.preventDefault();

    // Replace 'popularTrends' with the ID of the "Popular Trends" section
    const targetElement = document.getElementById('popularTrends');

    if (targetElement) {
        targetElement.scrollIntoView({behavior: 'smooth'});
    }
});







