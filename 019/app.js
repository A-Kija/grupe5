console.log('Ką tu, Masyvai?');


const animal = {
    name: 'Zuikis',
    eat: 'morkas',
    tail: 'trumpa'
};

const colorPensObj = {
    one: 'Raudonas',
    two: 'Žalias',
    four: 'Geltonas'
};

console.log(colorPensObj.two);

// Masyvas yra objektas skirtas saugoti vienodiems*, iš eilės sudėliotiems kintamiesiems
// *nebūtinai 
const colorPens = [
    'Raudonas',
    'Žalias', // jo indeksas yra 1
    'Geltonas'
];

console.log(colorPens);

console.log(colorPens[1]);

colorPens[1] = 85;
colorPens[7] = 'Juodas';

// 1, 7 vadinami indeksais



console.log(colorPens);
console.log(colorPens[3], colorPens.length);

const animals = [];

animals[0] = 'Bebras';
animals[1] = 'Barsukas';

animals.push('Briedis'); // dedam sekantį iš eilės elementą
animals.push('Vilkas');
animals.push('Zuikis', 'Kiškis', 'Zuikis'); // kelis (daug) iškart
// animals.push(50, 87);

console.log(animals);

const word = 'rabarbaras';
const found = [];

for (let i = 0; i < word.length; i++) {
    if (word[i] == 'r') {
        found.push(i); // dedam "r" raidės vietą
    }
} // blokas kartojasis

console.log(found);

// 1. padaryti masyvą iš skaičių 55, 77, 2 (naudojant push)

const myNumbers1 = [];
myNumbers1.push(55);
myNumbers1.push(77);
myNumbers1.push(2);

console.log(myNumbers1);


// 2. padaryti masyvą iš skaičių 1, 2, 3... 99, 100 naudojant for ciklą

const myNumbers2 = [];

for (let i = 1; i <= 100; i++) {
    myNumbers2.push(i);
}

console.log(myNumbers2);


const h2First = document.querySelector('h2');
const h2Second = document.querySelector('h2 + h2');

console.log(h2First.innerText);
console.log(h2Second.innerText);

const h2All = document.querySelectorAll('h2'); // node list - kuris iš principo yra masyvas


console.log(h2All[2].innerText);

for (let i = 0; i < h2All.length; i++) {
    console.log(h2All[i].innerText);
}

h2Second.style.color = 'crimson';

// h2All.style.color = 'skyblue'; nesigauna taip

for (let i = 0; i < h2All.length; i++) {
    h2All[i].style.color = 'skyblue';
}


// 3. Elemente section sukurti 3 h3 tagus su skaičiais 1, 2, 3

const sectionElement = document.querySelector('section');

for (let i = 1; i <= 3; i++) { // skaičiuoja 1,2,3
    const h3Element = document.createElement('h3'); // naujas blizgantis h3 elementas "danguje"
    h3Element.innerText = i; // pridedam tekstą kaip skaičių (1 arba 2 arba 3)
    sectionElement.appendChild(h3Element); // sekcijos viduje "materelizuojame" naują h3
}

console.clear();

const colors = [];

colors.push('Red');
colors.push('Blue');
colors.push('Green');


colors.unshift('Black'); // prideda į pradžią


console.log(colors);
