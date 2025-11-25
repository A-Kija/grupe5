console.log('Masyvai, vėl masyvai');

const animals = [];

animals.push('Zuikis', 'Bebras', 'Barsukas');

animals.unshift('Briedis', 'Mamutas'); // indeksai persiskaičiuoja

console.log(animals);

animals.pop(); // išmeta paskutinį elementą (tik vieną)

console.log(animals);

animals.shift();  // išmeta pirmą elementą (tik vieną) indeksai persiskaičiuoja

console.log(animals);

const pushResult = animals.push('Vilkas'); // grąžina masyvo dydį su pridėtais elementais

console.log(animals);
console.log(pushResult);

const popResult = animals.pop();

console.log(animals);
console.log(popResult); // grąžina išmestą elementą


/*

Paieška
Agregacija
Filtracija
Rūšiavimas

*/

const numbers = [54, 85, 31, -4, 57, 131, -78, 54, 54, 798, 0, 3, 74];

// paieška 

let findWhat = 54;
let findRow = 4; // kelinto rezultato mums reikia

let findResultIndex = -1; // rasto skaičiaus indeksas -1 reiškia kad indekso dar neradom
let findResultRow = 0;

for (let i = 0; i < numbers.length; i++) {
    if (findWhat == numbers[i]) {

        findResultRow++; // skaičiuojam kelintas rezultatas

        if (findRow == findResultRow) {
            findResultIndex = i;
            break; // nutraukia ciklą ir iš jo išeina
        }
    }
}

console.clear();

console.log(findResultIndex);

// 1. Koks meškos numeris - numerį atspausdinti konsolėje

const allAnimalsLi = document.querySelectorAll('li'); // visi LI elementai
let meska = -1;

console.log(allAnimalsLi); // visi elementai

// nekreipian dėmesio - bus vėliau
console.log(Array.from(allAnimalsLi).map(el => el.innerText));

for (let i = 0; i < allAnimalsLi.length; i++) {

    // allAnimalsLi ---> visi elementai
    // allAnimalsLi[i] ---> konkretus vienas elementas
    // allAnimalsLi[i].innerText ---> konkretaus vieno elemento tekstas

    if (allAnimalsLi[i].innerText == 'Meška') {
                
        meska = i; // meska gauna elemento indeksą 4
        break; // einam lauk iš ciklo
    }
}

console.log('Meška:', meska + 1); // +1 pakoreguojam indeksą, kad jis taptų eilės numeriu

// 2. Sąraše varną nuspalvinkit baltai

for (let i = 0; i < allAnimalsLi.length; i++) {

    if (allAnimalsLi[i].innerText == 'Varna') {
         // allAnimalsLi[i] varnos elementas
        allAnimalsLi[i].style.color = 'white'; // stilius ant elemento kuris turi varnos tekstą
        break;
    }

}

// Sąraše visus išskyrus Pelėdą ir Gaidį nuspalvinti orange

for (let i = 0; i < allAnimalsLi.length; i++) {

    if (allAnimalsLi[i].innerText == 'Pelėda' || allAnimalsLi[i].innerText == 'Gaidys') {
        continue; // pradeda naują iteraciją (ciklo prasukimą) toliau +1
    }

    allAnimalsLi[i].style.color = 'orange';
}


// su if neigiama logika
// for (let i = 0; i < allAnimalsLi.length; i++) {

//     if (allAnimalsLi[i].innerText != 'Pelėda' && allAnimalsLi[i].innerText != 'Gaidys') {
//         allAnimalsLi[i].style.color = 'orange';
//     }
// }