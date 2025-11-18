console.log('Fun Fun Fun...');
function rand(min, max) {
    const minCeiled = Math.ceil(min);
    const maxFloored = Math.floor(max);
    return Math.floor(Math.random() * (maxFloored - minCeiled + 1) + minCeiled);
}

// 0. Kintamajam priskirti atsitiktinę reikšmę nuo 10 iki 99 ir tą reikšmę atspausdinti konsolėje.

// Kintamajam priskirti
// const kazkas =
// atsitiktinę reikšmę nuo 10 iki 99
// rand(10, 99)
// sujungiam
const kazkas = rand(10, 99);
// tą reikšmę atspausdinti konsolėje
console.log(kazkas);

// 1. Sugeneruoti atsitiktinę reikšmę nuo 10 iki 99. Jeigu ta reikšmė maženė už 50 kitamajam
// animal priskirti reikšmę 'Bebras'. Kitu atveju priskriri reikšmę 'Barsukas'. Atsitiktinę
// reikšmę ir animal kintamąjį atspausdinti konsolėje

const atsitiktinis = rand(10, 99);
let animal; // šitas BUS KEIČIAMAS (daromas priskyrimas) vėliau, todėl let
if (atsitiktinis < 50) {
    animal = 'Bebras';
} else {
    animal = 'Barsukas';
}
console.log(animal, atsitiktinis);


// 2. Parašyti funkciją, kuri spausdina atsitiktinį skaičių nuo 1 iki 5;

// Darom deklaraciją
// Sugalvoti funkcijai vardą 
// function vienasPenki()
// bloke aprašyti ką reik daryt
// {
//   console.log(rand(1, 5));
// }
// Deklaracija padaryta
// kviečiame
// vienasPenki()


function vienasPenki() {
    console.log(rand(1, 5));
}

vienasPenki();
vienasPenki();

// 3. Parašyti funkciją, kuri grąžina atsitiktinį skaičių nuo 1 iki 5. Grąžintą skaičių reikia priskirti
// kintamąjam skaicius15. Kintamąjį skaicius15 padauginti iš 5 ir gautą rezultatą atspausdinti konsolėje

function vienasPenkiA() {
    const A = rand(1, 5);
    return A;
}

let skaicius15 = vienasPenkiA();
skaicius15 = skaicius15 * 5;

console.log(skaicius15);


// 4. Parašyti funkciją kuri grąžina stringą 'Puiki diena'.
// 
// Gautą iš paleistos funkcijos stringą priskirti kintamąjam
// tą kintamąjį atspausdinti

function pd() {
    return 'Puiki diena';
}

const kokiaDiena = pd();

console.log(kokiaDiena);

// 5. Parašyti funkciją kuri grąžina atsitiktine tvarka arba stringą 'A' arba 'B'
// Gautą grąžintą stringą priskirti kintamajam raide. Kintamąjį atspausdinti

// Su dirbtiniu intelektu adaptacija "paprastai ir aiškiai"
// function aB() {
//     const r = rand(0, 1);
//     if (r === 0) {
//         return 'A';
//     } else {
//         return 'B';
//     }
// }

// Be dirbtinio intelekto adaptacija "normaliai"
function aB() {
    const r = rand(0, 1);
    if (r) {
        return 'A';
    }
    return 'B';
}

const raide = aB();

console.log(raide);

console.clear();


let kas;
if (24 > 15) {
    kas = 'TAIP'
} else {
    kas = 'NE'
}

console.log(kas);

const kas2 = 24 > 150 ? 'TAIP' : 'NE'; // priskiraimoji sąlyga - ternary operator

console.log(kas2);

function aBT() {
    return rand(0, 1) ? 'A' : 'B';
}

const raideT = aBT();

console.log(raideT);

// 6. Parašyti funkciją kuriai duodate bet kokį stringą, o ji grąžina pirmą stringo raidę.
// Pademonstruoti veikimą konsolėje

const firstLetter = function(pranasJonas6) {
    return pranasJonas6[0];
}

console.log(firstLetter('Bebras'));
console.log(firstLetter('Krokodilas'));

// 7. Parašyti funkciją kuriai duodate bet kokį stringą, o ji grąžina paskutinę stringo raidę.
// Pademonstruoti veikimą konsolėje

const lastLetter = function(pranasJonas6) {
    return pranasJonas6[pranasJonas6.length - 1];
}

console.log(lastLetter('Bebras'));
console.log(lastLetter('Krokodilas'));


// 8. Parašyti funkciją kuri konsolėje spausdina 'Labas'
// Funkcija turi pasileisti paspaudus mygtuką html faile (html faile reikia sukurti tokį mygtuką)


const showHello = function() {
    console.log('Labas');
}

const button = document.querySelector('button');

button.addEventListener('click', showHello);
