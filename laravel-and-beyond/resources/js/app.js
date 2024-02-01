
require('./bootstrap');
document.addEventListener('DOMContentLoaded', function () {
    const toggleModeButton = document.getElementById('toggle-mode');
    const headerImage = document.getElementById('header-image');

    let currentMode = 'day'; // Set the default mode

    toggleModeButton.addEventListener('click', function () {
        // Toggle between day and night mode
        currentMode = currentMode === 'day' ? 'night' : 'day';

        // Update background image based on the selected mode
        const imageUrl = currentMode === 'day' ? '{{ asset("images/day-header.png") }}' : '{{ asset("images/night-header.png") }}';
        headerImage.src = imageUrl;

        // You can also update other styles or classes based on the mode if needed
        document.body.classList.toggle('night-mode', currentMode === 'night');
    });
});
