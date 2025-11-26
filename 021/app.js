console.log('Masyvai ir dar objektai juose...');

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

console.log(animals);

// ieškom vilko

let findIndex = -1;

for (let i = 0; i < animals.length; i++) {

    // animals visi žvėrys
    // animals[i] konkretus itasis žvėris
    // animals[i].name konkretaus itojo žvėries vardas

    if ('Vilkas' == animals[i].name) {
        findIndex = i;
    }
}

console.log(findIndex);

const pencils = [
    {
        color: 'Raudonas',
        size: 12
    },
    {
        color: 'Mėlynas',
        size: 8
    },
    {
        color: 'Žalias',
        size: 15
    },
    {
        color: 'Geltonas',
        size: 7
    },
    {
        color: 'Juodas',
        size: 10
    },
    {
        color: 'Violetinis',
        size: 9
    },
    {
        color: 'Oranžinis',
        size: 11
    }
];

// Marytė paišė paišė ir supaišė. Kuris Marytės pieštukas mylimiausias?

let favorite = null; // dar nežinom koks pieštukas todėl joks (null) pieštukas

for (let i = 0; i < pencils.length; i++) {
    if (null === favorite) { // jeigu dar neturim favorito, 
        favorite = pencils[i]; // tai favoritu padarom pirmą pasitaikiusį pieštuką
    } else { // jeigu turim favoritą
        if (favorite.size > pencils[i].size) { // lyginam favoritą su sekančiu pieštuku
            favorite = pencils[i]; // jeigu sekantis geresni nei turimas favoritas - sekantį padarome favoritu
        }
    }
}

console.log(favorite.color);

// Marytė sudėliojo savo pieštukus į vieną liniją. Kokio ilgumo linija gavosi (Agregacija)

let line = 0;

for (let i = 0; i < pencils.length; i++) {
    // line = line + pencils[i].size;
    line += pencils[i].size; // niekuo nesiskiria
}

console.log(line);

// Marytė geltoną pieštuką išmetė per balkoną. Likusius pieštukus sudėliojo į vieną liniją. Kokio ilgumo linija gavosi (Agregacija)

line = 0;

for (let i = 0; i < pencils.length; i++) {

    if (pencils[i].color == 'Geltonas') {
        continue; // grįžtame į pradžią
    }

    line += pencils[i].size;
}


// for (let i = 0; i < pencils.length; i++) {

//     if (pencils[i].color != 'Geltonas') {
//         line += pencils[i].size;
//     }
// }

console.log(line);


if (true) {
    console.log('Taip');
} else {
    console.log('Ne');
}

// Bloga praktika, bet sintaksė teisinga
if (false) console.log('Taip'); // jeigu viena eilutė, galima praleisti garbanotus skliaustus
else console.log('Ne');

// Kietai, bet irgi ne kas

const D = false;

D && console.log('Taip');
D || console.log('Ne');


const oldAnimals = []; // tiems kam virš 10 metų

for (let i = 0; i < animals.length; i++) {
    if (animals[i].age > 10) {
        oldAnimals.push(animals[i]);
    }
}

console.log(oldAnimals);

// Marytė susisrinko pieštukus ilgesnius nei 10 ir išėjo. 
// Kokie pieštukai liko voliotis? (filtaravimas su for ciklu)

const shortPencils = [];

for (let i = 0; i < pencils.length; i++) {
    if (pencils[i].size <= 10) {
        shortPencils.push(pencils[i]);
    }
}

console.log(shortPencils);

// Bubble sort pencils by size
for (let i = 0; i < pencils.length - 1; i++) {
    for (let j = 0; j < pencils.length - 1 - i; j++) {
        if (pencils[j].size > pencils[j + 1].size) {
            const temp = pencils[j];
            pencils[j] = pencils[j + 1];
            pencils[j + 1] = temp;
        }
    }
}

// Quick sort pencils by size using for cycle
function quickSortPencils(arr, left = 0, right = arr.length - 1) {
    if (left < right) {
        const pivotIndex = partition(arr, left, right);
        quickSortPencils(arr, left, pivotIndex - 1);
        quickSortPencils(arr, pivotIndex + 1, right);
    }
    return arr;
}

function partition(arr, left, right) {
    const pivot = arr[right].size;
    let i = left - 1;
    
    for (let j = left; j < right; j++) {
        if (arr[j].size < pivot) {
            i++;
            const temp = arr[i];
            arr[i] = arr[j];
            arr[j] = temp;
        }
    }
    
    const temp = arr[i + 1];
    arr[i + 1] = arr[right];
    arr[right] = temp;
    
    return i + 1;
}

quickSortPencils(pencils);

console.log(pencils);