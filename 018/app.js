console.log('Hello, Loop!');
function rand(min, max) {
    const minCeiled = Math.ceil(min);
    const maxFloored = Math.floor(max);
    return Math.floor(Math.random() * (maxFloored - minCeiled + 1) + minCeiled);
}

// Duotas žodis "Meškėnas". Reikia konsolėje atskirai atspausdinti po vieną visas raides

const word = 'Meškėnas';
let out = '';

for (let i = 0; i < word.length; i++) {
    console.log(word[i]); // konsolė spausdina daug kartų
    out += word[i] + '\n'; 
} // blokas kartojasis

console.log(out); // konsolė spausdina vieną kartą

// Duotas žodis "Meškėnas". Reikia HTML žodį atspausdinti stulpeliu

const body = document.querySelector('body');

for (let i = 0; i < word.length; i++) {
    const div = document.createElement('div'); // sukuriam kiekvienai raidei divą
    div.innerText = word[i]; // piridedam į tą divą raidę
    body.appendChild(div); // divą su raide įkeliam į body
}

console.clear();

let number1;


do {

    number1 = rand(0, 10);
    console.log(number1);

} while(number1 > 5);


// Sakykime, kad metate monetą ir ji gali iškristi H, kaip herbas arba S, kaip skaičius. Tam panaudojame
// rand funkciją

// let coin = rand(0, 1) ? 'H' : 'S';
// console.log(coin);

// Mesti monetą, kol iškris H t.y. herbas

let coin;

do {

    coin = rand(0, 1) ? 'H' : 'S';
    console.log(coin);

} while (coin != 'H');

/*
    == <---> !=
    > <---> <=
    < <---> >=
    || <---> &&

*/

// Mesti monetą, kol iškris 3 H t.y. 3 kartus herbas
console.clear();
let times = 0;

let saugiklis = 100;

do {
    coin = rand(0, 1) ? 'H' : 'S';
    console.log(coin);
    if (coin == 'H') {
        times++;
    }

    saugiklis--;
    if (!saugiklis) {
        console.log('Suveikė saugiklis');
        break;
    }

} while (times < 3);