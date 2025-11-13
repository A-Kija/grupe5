console.log('Veikia...');


// 1. Naudokime innerHTML

const section1 = document.querySelector('#nr1');

const divHtmlString = '<div class="circle1"></div>';

section1.innerHTML = divHtmlString;

const circle1 = document.querySelector('.circle1');

circle1.style.width = '100px';
circle1.style.height = '100px';
circle1.style.border = '1px solid white';
circle1.style.borderRadius = '50%';

// 2. Naudokime createElement

const section2 = document.querySelector('#nr2');

const divCircle = document.createElement('div');

divCircle.style.width = '100px';
divCircle.style.height = '100px';
divCircle.style.border = '1px solid white';
divCircle.style.borderRadius = '50%';

section2.appendChild(divCircle);

// 3. Naudokime innerHTML sudėtingam html

const section3 = document.querySelector('#nr3');

const Bebras = 'Bebras';
const Iguana = 'Iguana';

const fancyDiv = `
            <div class="fancy">
                <div class="fancy2">
                    <span>
                        <b>${Bebras}</b>
                        <i>${Iguana}</i>
                    </span>
                </div>
            </div>`;

section3.innerHTML = fancyDiv;