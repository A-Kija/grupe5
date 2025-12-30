console.log('MapSet');


const arr = []; // sutrumpintas
const arr1 = new Array(); // pilnas

arr.push('red');
arr.push('blue');
arr.push('raccon');

console.log(arr, arr.length);
console.log(arr[2]); // gauti meškėną

const map = new Map(); // pilnas, sutrumpinto nėra, nes pasibaigė skliausteliai

map.set('spalva1', 'red');
map.set('spalva2', 'blue');
map.set('zveris', 'raccon');
map.set('spalva2', 'black');
map.set(87, 'skaičius');
map.set({bla: 123}, 'objektas1'); // raktas yra objektas su nuoroda į niekur
map.set({bla: 123}, 'objektas2');

const fun1 = _ => _;

map.set(fun1, 'fun1');

const o123 = {bla: 123};

map.set(o123, 'objektas3');

console.log(map, map.size);

console.log(map.get('zveris')); // gauti meškėną. Naudojam raktą ne indeksą
console.log(map.get({bla: 123})); // raktas yra naujas objektas

console.log({bla: 123} == {bla: 123}); // objektai lyginami pagal nuorodą ne reikšmę

console.log(map.get(o123)); // raktas yra objektas
console.log(map.get(fun1)); // raktas yra funkcija

// map turi forEach ciklą (kitko ką turi masyvas - neturi)

map.forEach((verte, raktas) => console.log(raktas, '===>', verte));

console.clear();

const fancyMap = new Map();

fancyMap.set(a => a * 3, 5);
fancyMap.set(a => a * 3, 8);
fancyMap.set(a => a * 10, 5);
fancyMap.set(a => a * 10, 15);
fancyMap.set(a => a / 3, 2);

console.log(fancyMap);

fancyMap.forEach((v, f) => console.log(f(v)));

console.log(map.has(87)); // ar yra elementas su tokiu raktu
map.delete(87);
console.log(map.has(87)); // ar yra elementas su tokiu raktu

// bandom pasortint

const arrFromMap = [...map];

console.log(arrFromMap);

arrFromMap.sort((a, b) => a[1].localeCompare(b[1]));

console.log(arrFromMap);

const sortedMap = new Map(arrFromMap); // ne tuščias, o pagal duomeni iš masyvo

console.log(sortedMap);


const set = new Set();

set.add('red');
set.add('blue');
set.add('racoon');
set.add('red'); // setas yra unikalių reikšmių rinkinys

console.log(set, set.size, set.has('red'), set.delete('red'), set.has('red'));
console.clear();

// for in
// for of

for (let i = 0; i < arr.length; i++) {
    console.log(arr[i]);
}

for (const element of arr) {
    console.log(element);
}

for (const index in arr) {
    console.log(index);
}

// neiteruojamas, t.y. objektas neturintis indeksų
const obj = {  
    kas: 'Malkos',
    kam: 'Krosniai',
    kodel: 'Nes šalta',
    // prop: 'Bla bla bla' 
};

// for in skirtas pagrinde neiteruojamų objektų iteracijai

for (const prop in obj) {
    console.log(prop, ':', obj[prop]); // savybės vardas įrašytas į kitamąjį "prop" todėl [prop]
}