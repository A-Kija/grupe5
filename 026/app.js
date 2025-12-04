console.log('Labas dienas');

const namas = {
    kaminas: 'yra didelis',
    durys: 'metalinės'
}

console.log(structuredClone(namas)); // gilus kopijavimas
console.log({ ...namas }); // seklus kopijavimas

namas.lagai = 5;

console.log(namas);

const unshuffled = ['hello', 'a', 't', 'q', 1, 2, 3, { cats: true }];

const shuffled = unshuffled.sort(() => Math.random() - 0.5); // atsitiktinis išdėstymas paremtas rūšiavimu
console.log(shuffled);

/*
Naujos statybos name parduodami du butai (analogija product1 ir product2)

Butas. numeris: 45; užbaigtumas: "euroremontas", balkonas: nėra, kambariai: virtuvė 10m2,
miegamasis: 15m2, svetainė: 18m2; kaina 75500eur

Butas. numeris: 12; užbaigtumas: "neįrengtas", balkonas: yra,  kambariai: virtuvė 9m2,
miegamasis: 12m2, svetainė: 20m2, vaikų kambarys: 14m2; kaina 92500eur

Klausimas pirmas: Kuris butas turi daugiau kambarių?
Klausimas antras: Kurio buto kvadratinis metras yra brangesnis (nesikartojome šito, tiesiog kam
 per paprastas pirmas klausimas, kad turėtų ką veikti - tema masyvo metodai)

*/

const flat1 = {
    number: 45,
    finish: 'euroremontas',
    balcone: false,
    rooms: [
        { name: 'virtuvė', sq: 10 },
        { name: 'miegamasis', sq: 15 },
        { name: 'svetainė', sq: 18 }
    ],
    price: 75500
}

const flat2 = {
    number: 12,
    finish: 'neįrengtas',
    balcone: true,
    rooms: [
        { name: 'virtuvė', sq: 9 },
        { name: 'miegamasis', sq: 12 },
        { name: 'svetainė', sq: 20 },
        { name: 'vaikų kambarys', sq: 14 }
    ],
    price: 92500
}


if (flat1.rooms.length > flat2.rooms.length) {
    console.log(flat1.number);
} else {
    console.log(flat2.number);
}

const oneSqPrice = flat => {

    const size = flat.rooms.reduce((counter, room) => {
        return counter + room.sq;
    }, 0);

    return flat.price / size;
}

if (oneSqPrice(flat1) > oneSqPrice(flat2)) {
    console.log(flat1.number);
} else {
    console.log(flat2.number);
}

function rand(min, max) {
  const minCeiled = Math.ceil(min);
  const maxFloored = Math.floor(max);
  return Math.floor(Math.random() * (maxFloored - minCeiled + 1) + minCeiled);
}

const skaiciusA = rand(1, 45);
const skaiciusB = rand(1, 45);

console.log('A', skaiciusA, 'B', skaiciusB);

if (skaiciusA < skaiciusB) {
    console.log('Didesnis B'); // taip
} else {
    console.log('Didesnis A'); // ne
}


// Duoti random (nuo 1 iki 25) skaičiai A1 A2 ir B1 B2
// Išrinkiti didesnį iš A ir didesnį iš B ir pasakyti kuris mažesnis
// 8 ir 7 - 9 ir 4 ==> 8 9 ==> 8
// pateikti skaičių

const skaiciusA1 = rand(1, 25);
const skaiciusA2 = rand(1, 25);
const skaiciusB1 = rand(1, 25);
const skaiciusB2 = rand(1, 25);

console.log('A1', skaiciusA1, 'A2', skaiciusA2, 'B1', skaiciusB1, 'B2', skaiciusB2);

// priskiriamoji sąlyga - ternaris

const A = skaiciusA1 > skaiciusA2 ? skaiciusA1 : skaiciusA2;
// salyga skaiciusA1 > skaiciusA2
// jeigu sąlyga true tai A po ? = skaiciusA1
// jeigu sąlyga false tai A po : = skaiciusA1

const B = skaiciusB1 > skaiciusB2 ? skaiciusB1 : skaiciusB2;

const rez = A < B ? A : B;

const rez2 = Math.min(Math.max(skaiciusA1, skaiciusA2), Math.max(skaiciusB1, skaiciusB2));


let didesnisA;
let didesnisB;
let mazesnis;

if (skaiciusA1 > skaiciusA2) {
    didesnisA = skaiciusA1;
} else {
    didesnisA = skaiciusA2;
}

if (skaiciusB1 > skaiciusB2) {
    didesnisB = skaiciusB1;
} else {
    didesnisB = skaiciusB2;
}

if (didesnisA < didesnisB) {
    mazesnis = didesnisA;
} else {
    mazesnis = didesnisB;
}

console.log(rez, rez2, mazesnis);

// Duoti 2 random skaičiai nuo 1 iki 17.
// A. ar jie abudu yra didesni nei 11?
// B. ar yra bent vienas skaičius didesnis už 14?

console.clear();

const skaiciusC1 = rand(1, 17);
const skaiciusC2 = rand(1, 17);

console.log('C1', skaiciusC1, 'C2', skaiciusC2);

if (skaiciusC1 > 11 && skaiciusC2 > 11) {
    console.log('Abu didesni nei 11');
} else {
    console.log('Vinas ar abu ne didesni nei 11');
}

if (skaiciusC1 > 14 || skaiciusC2 > 14) {
    console.log('Kažkuris didesnis nei 14');
} else {
    console.log('Nei vienas ne didesnis nei 14');
}

// Atspausdinkite žodžio "Karakumai" kas antrą raide ====> Krkmi 

const word = 'Karakumai';
let word2 = '';
let word3 = '';

for (let i = 0; i < word.length; i = i + 2) { // einam kas du
    word2 = word2 + word[i];
}

for (let i = 0; i < word.length; i++) {
    // if (i % 2 == 0) {
    //     word3 = word3 + word[i];
    // }
    if (i % 2) {
        continue;
    }
    word3 = word3 + word[i];
}

console.log(word2, word3);