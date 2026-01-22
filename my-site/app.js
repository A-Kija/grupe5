

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

const topPhraseElement = document.querySelector('[data-top-phrase]');

const getPhrase = _ => {
        fetch('api-phrases.php')
        .then(response => response.json())
        .then(data => {
            topPhraseElement.textContent = data.phrase;
        })
        .catch(error => {
            console.error('Error fetching phrase:', error);
        });
    };

if (topPhraseElement) {
    // Initial fetch
    getPhrase();
    setInterval(getPhrase, 2000);
}

