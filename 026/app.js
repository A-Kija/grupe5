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

console.log('A1', skaiciusA1, 'A2', skaiciusA2, 'B1', skaiciusB1, 'B2', skaiciusB2)

