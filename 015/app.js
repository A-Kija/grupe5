console.log('Are you having fun learning functions?');

console.log('Top');

if (true) {
    console.log('If');
}

function fun1() {  // funkcijos deklaracija
    console.log('Block');
}

console.log('Bottom0');


fun1();
console.log('Bottom1');
fun1();
console.log('Bottom2');
fun1();

function fun2() {
    console.log('%cFancy', 'color:skyblue;font-size:25px');
}

fun2();
fun2();

// Anoniminė funkcija
const fun3 = function () {
    console.log('%cFancy', 'color:crimson;font-size:25px');
}

fun3();
fun3();

const fun4 = function () {
    console.log('Button Clicked');
    const h2 = document.querySelector('h2');
    h2.innerText = 'Fun Fun Fun!';
}


const button1 = document.querySelector('#nr1');

button1.addEventListener('click', fun4); // Kai click ant button1 paleidžiam fun4 funkciją


const fun5 = function () {
    console.log('%cTRUE', 'color:darkgreen;font-size:25px');
}

const fun6 = function () {
    console.log('%cFALSE', 'color:crimson;font-size:25px');
}

if (52 > 6) {
    fun5();
} else {
    fun6();
}

