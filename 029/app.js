console.log('Vietinis Podėlis app.js is loaded.');

function rand(min, max) {
    const minCeiled = Math.ceil(min);
    const maxFloored = Math.floor(max);
    return Math.floor(Math.random() * (maxFloored - minCeiled + 1) + minCeiled)
}


const manoSkaicius = rand(1, 10);
console.log(`Sugeneruotas skaicius: ${manoSkaicius}`);

// localStorage.setItem('skaicius', manoSkaicius); // padedu skaičių į storage


const gautasSkaicius = localStorage.getItem('skaicius');
console.log(`Gautas skaicius: ${gautasSkaicius}`, typeof gautasSkaicius);


const bebras = {
    name: 'bebras',
    age: 11
};

localStorage.setItem('animal', bebras); // ===> [object Object] "suplotas objektas" kai objektas yra paverčiamas į stringą


const bebrasStringas = JSON.stringify(bebras); // prieš įrašant verčiame į json

localStorage.setItem('animal2', bebrasStringas); // užsaugojam


const gautasBebras = localStorage.getItem('animal2'); // gaunam atgal užsaugotą jsom

const bebroObjektas = JSON.parse(gautasBebras); // iš json vėl gauname objektą

console.log(bebroObjektas.name); // naudojam


const nr1 = document.querySelector('#nr1');

nr1.addEventListener('click', _ => {
    localStorage.setItem('skaicius', manoSkaicius);
});


// "mano_skaiciai"



