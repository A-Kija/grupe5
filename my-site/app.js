

// Landing page color theme switcher

const topColorElement = document.querySelector('[data-top-color]');
const topColorButtonElement = document.querySelector('[data-top-color-button]');

if (topColorElement && topColorButtonElement) {
    topColorButtonElement.addEventListener('click', _ => {
        // Generate random color
        const randomColor = '#' + Math.floor(Math.random()*16777215).toString(16).padStart(6, '0');
        // Apply color to elements
        topColorElement.style.color = randomColor;
        topColorButtonElement.style.backgroundColor = randomColor;
    });
}
