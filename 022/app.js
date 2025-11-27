console.log('Masyvo triukai');

const numbersArray = [45, 5, 87, 96, -1, 51, 0, 36];

// rasti 96 indeksą

let indexOf96 = -1;

// paskutiniam pvz šito nereikia
const find96Index = (number, i) => {
    if (number == 96) {
        indexOf96 = i;
    }
}

// for (let i = 0; i < numbersArray.length; i++) {

//     find96Index(numbersArray[i], i);

// }

// analogija
// numbersArray.forEach(find96Index);

// Taip kaip ir visada rašysim
numbersArray.forEach((number, i) => {
    if (number == 96) {
        indexOf96 = i;
    }
});

console.log(indexOf96);

const animals = [
    {
        name: 'Briedis',
        age: 54
    },
    {
        name: 'Lapė',
        age: 12
    },
    {
        name: 'Vilkas',
        age: 8
    },
    {
        name: 'Kiškis',
        age: 4
    },
    {
        name: 'Erelis',
        age: 16
    },
    {
        name: 'Voverė',
        age: 3
    }
];

// Kiek Vilkui metų? - spręsti naudojant forEach

let wolfAge; // undefined

// nepriskiriam undefined - tada kai turim primityvu tipą number ar string
// priskiriam -1 kai skaičiuojam indeksus
// priskiriam null - tada kai turim objektą
// priskiriam pradinę reikšmę dažniausiai 0 jeigu darome agregacijas (sumą pvz skaičiuojam)

// zveris pats sugalvojau ir pavadinau kaip užsimaniau
animals.forEach(zveris => {
    if (zveris.name == 'Vilkas') {
        wolfAge = zveris.age;
    }
});

console.log(wolfAge);

// Koks visų gyvūnų bendras amžius? (Susumuoti visus metus)
// Koks visų gyvūnų amžiaus vidurkis?

let animalsAge = 0;

animals.forEach(zveris => {
    animalsAge += zveris.age;
});

console.log(animalsAge, animalsAge / animals.length);

const surastasErelis = animals.find(zveris => {
    let arTas;
    if (zveris.name == 'Erelis') {
        arTas = true;
    } else {
        arTas = false;
    }
    return arTas;
});

console.log(surastasErelis);

const surastasKiškis = animals.find(zveris => zveris.name == 'Kiškis');

console.log(surastasKiškis);

const kiškioMetai1 = animals.find(zveris => zveris.name == 'Kiškis').age;


const { age: kiškioMetai2, name } = animals.find(zveris => zveris.name == 'Kiškis');

console.log(kiškioMetai1, kiškioMetai2, name);


const animalsAgePlus1 = animals.map(zveris => {
    const zverisPlus = {};
    zverisPlus.name = zveris.name;
    zverisPlus.age = zveris.age + 1;
    return zverisPlus;
});

console.log(animalsAgePlus1);

const animalsAgePlus1a = animals.map(zveris => ({ ...zveris, age: zveris.age + 1 }));

console.log(animalsAgePlus1a);


const ufo1 = {
    speed: 500,
    size: 'Big',
    power: 2000
};

const ufo2 = ufo1; // priskirimas pagal reference tas pat objektas

const ufo3 = { ...ufo1 }; //  ---> {speed: 500, size: 'Big', power: 2000}


const ufo4 = { ...ufo1, size: 'Small' }; 
// ---> {speed: 500, size: 'Big', power: 2000, size: 'Small'}
// ---> size: 'Small' overwrite size: 'Big'
// ---> {speed: 500, size: 'Small', power: 2000}


ufo2.power = 3000;




console.log(ufo1, ufo2, ufo3)