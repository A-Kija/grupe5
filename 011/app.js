console.log('Labas, Bebriau!');


var x = 10;

console.log(x);

var pasisveikinimasSuBarsuku = 'Labas rytas, ponas Barsukai!';

console.log('pasisveikinimasSuBarsuku', pasisveikinimasSuBarsuku);

x = 20;

console.log(x, pasisveikinimasSuBarsuku); // MATAVIMAS

let L = 20; // deklaracija - vardo ir reikšmės suteikimas
const N = 20;

// 1. Kintamojo vardas
// 2. Kintamojo reikšmė (turinys)
// 3. Kintamojo tipas

let K1 = 25; // tipas Number
let K2 = 'Barsukas' // tipas String
let K3 = '102' // tipas String
let K4 = 54.78 // tipas Number
let K8 = -78.0002 // tipas Number

let K20 = K1 + 30;
console.log(K20);

let K30 = 100 + 20 * 5;
console.log(K30);

let K40 = K1 + K3; // sulipdymas
console.log(K40, typeof K40); // tipo pasitikrinimas

let K50 = K2 + ' ' + K2 + ' Bebras';
console.log(K50);

console.log(5 + 12 + 6 + 'Labas' + 20);

let bebrasVardas = 'Jonas';
let bebrasAmzius = 12;

// object tipas
let bebras = {
    vardas: 'Jonas', //cia yra property
    amzius: 12
}

bebras.uodega = 'Pusilgė';
bebras.amzius = 14;

console.log(bebras);

console.log(bebras.amzius);

let h1 = document.querySelector('h1');

console.log(h1, typeof h1);


let b = document.querySelector('body');

console.log(b, typeof h1);

let color = 'blue';
let like = 'sky';
let dark = 'dark';

let bodyColor = like + color;


b.style.background = bodyColor;
