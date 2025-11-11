function rand(min, max) {
    const minCeiled = Math.ceil(min);
    const maxFloored = Math.floor(max);
    return Math.floor(Math.random() * (maxFloored - minCeiled + 1) + minCeiled);
}


console.log('Labas, Džiava Skriptai!');

let myVar1 = 54 + 2;

console.log(myVar1);

let myResultDiv = document.querySelector('div.my-result');

myResultDiv.innerText = myVar1;


myResultDiv.style.fontSize = '160px';

// font-size ===> fontSize   nes kintamasis negali turėti "minusų"
// 160px ====> '160px' be kabučių būtu kintamojo vardas arba skaičius

let myH2 = document.querySelector('h2');

myH2.style.letterSpacing = '5px';

// Parašyti JS kodą kuris antrą h2 nuspalvintų orange spalva

let myH22 = document.querySelector('h2 + h2');

myH22.style.color = 'orange';


let myFancyRandom = rand(5, 18);

console.log(myFancyRandom);

console.clear();

const A = 11;
const B = 5;

console.log(A + B);
console.log(A - B);
console.log(A * B);
console.log(A / B);
console.log(A % B);