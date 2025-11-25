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

