console.log('Hello, darkness my old friend');

// const clickMeNo1 = function() {
//     console.log('Button No1');
// }

const buttonNo1 = document.querySelector('#nr1');

// inline funkcija
buttonNo1.addEventListener('click', function() {
    console.log('Button No1');
});



// const clickMeNo2 = function() {
//     console.log('Button No2');
// }

// Arrow funkcija
const clickMeNo2 = () => {
    console.log('Button No2');
}

// skiriasi žodeliu this

const buttonNo2 = document.querySelector('#nr2');


// inline arrow
// buttonNo2.addEventListener('click', () => {
//     console.log('Button No2');
// });


buttonNo2.addEventListener('click', _ => console.log('Button No2'));


const sum1 = function(a, b) {
    return a + b;
}

const sum2 = (a, b) => {
    return a + b;
}

// Jeigu funkcijos bloke yra tik 1 eilutė galime suprastinti:

const sum3 = (a, b) => a + b;

console.log(sum1(5, 3));
console.log(sum2(5, 3));
console.log(sum3(5, 3));

const add5 = function(a) {
    return a + 5;
}

const add5a = (a) => {
    return a + 5;
}

// Jeigu yra tik 1 parametras, galima praleisti parametrų skliaustelius

const add5b = a => a + 5

console.log(add5(12));
console.log(add5a(12));
console.log(add5b(12));


const bebras1 = () => {
    return 'BEBRAS';
}

const bebras2 = () => 'BEBRAS';

const bebras3 = neneudoju => 'BEBRAS';

// Kintamasis vardu _ yra naudojamas sintaksei užpildyti, bet nenaudojamas skaičiavimuose

const bebras4 = _ => 'BEBRAS';


console.log(bebras1());
console.log(bebras2());
console.log(bebras3());
console.log(bebras4());