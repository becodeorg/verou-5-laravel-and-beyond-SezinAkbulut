
require('./bootstrap');

// app.js

// app.js

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






