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
map.set({bla: 123}, 'objektas1');
map.set({bla: 123}, 'objektas2');

console.log(map, map.size);

console.log(map.get('zveris')); // gauti meškėną. Naudojam raktą ne indeksą
console.log(map.get({bla: 123}));