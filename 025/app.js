console.log('Kartojimas - žinojimo žinios');

// Mergaitė turi penkis spalvotus pieštukus.

let mergaitesPiestukuKiekis = 5; // priskyrimas

console.log(mergaitesPiestukuKiekis);

mergaitesPiestukuKiekis = 7;

console.log(mergaitesPiestukuKiekis);

mergaitesPiestukuKiekis = 9;

console.log(mergaitesPiestukuKiekis);


mergaitesPiestukuKiekis = 25;

console.log(mergaitesPiestukuKiekis);


// Mergaitės vardas Marytė

const mergaitesVardas = 'Marytė';


// Berniukas, kurio vardas Tomukas, turi 5 pieštukus


const berniukas = {} // objektas tuščias

berniukas.piestukuKiekis = 5;
berniukas.vardas = 'Tomukas';

console.log(berniukas);


const kazkas = {}; 


const piestukai = []; // tuščias masyvas

piestukai[0] = 'Raudonas';
piestukai[1] = 'Geltonas';
piestukai[2] = 'Žalias';


// Gyveno žvėris - Bebras. Jis turėjo užtvanką ant Neries upės. Užtvankoje buvo sutempta 59 pagaliai
// Bebro uodega buvo ilga 39cm. Bebras turėjo 3 vaikus: 'Bebrius', 'Bebrikė' ir 'Bebroidas'.
// Aprašyti žvėrį


// Prekė 'Rašiklių rinkinys'. Prekės kodas: 6548942158789. Kaina: 3.75 Rašiklių spalvos: 'Mėlyna', 'Juoda', 'Raudona'


const zveris1 = {}

zveris1.tipas = 'Bebras';
zveris1.uztvankosUpe = 'Neris';
zveris1.uztvankosPagaliuKiekis = 59;
zveris1.uodegosIlgis = '39cm';
zveris1.vaikai = [];
zveris1.vaikai[0] = 'Bebrius';
zveris1.vaikai[1] = 'Bebrikė';
zveris1.vaikai[2] = 'Bebroidas';


const zveris2 = {
    tipas: 'Bebras',
    uztvankosUpe: 'Neris',
    uztvankosPagaliuKiekis: 59,
    uodegosIlgis: '39cm',
    vaikai: ['Bebrius', 'Bebrikė', 'Bebroidas']
}

console.log(zveris1, zveris2);


const product1 = {
    title: 'Rašiklių rinkinys TRYS',
    code: '6548942158789',
    price: 3.75,
    colors: ['Mėlyna', 'Juoda', 'Raudona']
}

const product2 = {
    title: 'Rašiklių rinkinys KETURI',
    code: '5666465135954',
    price: 4.25,
    colors: ['Mėlyna', 'Juoda', 'Raudona', 'Geltona']
}

// Kurio rinkinio vienas rašiklis yra pigesnis?


// if (sąlygos vieta) {
// TAIP veiksmas
// } else {
// NE veiksmas
// }

if (product1.price / product1.colors.length < product2.price / product2.colors.length) {
    console.log(product1.title);
} else {
    console.log(product2.title);
}


const getOnePenPrice = product => {
    product.price / product.colors.length;
}


if (getOnePenPrice(product1) < getOnePenPrice(product2)) {
    console.log(product1.title);
} else {
    console.log(product2.title);
}

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

   



