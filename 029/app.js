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


// "mano_skaiciai" dedam 

// informacijos vizualus atvaizdavimas vadinamas renderinimu

const renderList = _ => {
    const ol = document.querySelector('ol');
    ol.innerHTML = ''; // išvalau ol elementą kad būtų tuščias ir galėčiau dėti viską iš naujo.
    daugSkaiciu.forEach(sk => {
        const li = document.createElement('li');
        li.innerText = sk;
        ol.appendChild(li);
    });
}



let daugSkaiciu;

daugSkaiciu = localStorage.getItem('mano_skaiciai'); // bandom paimti skaičius iš local storage

if (null === daugSkaiciu) {
    // jeigu local storage neturi tokio įrašo (pradžia)
    daugSkaiciu = []; // jeigu nėra, tai padarau tuščią masyvą
} else {
    daugSkaiciu = JSON.parse(daugSkaiciu); // tai ką radau, paverčiu į objektą
}

const nr2 = document.querySelector('#nr2');

nr2.addEventListener('click', _ => {
    daugSkaiciu.push(manoSkaicius); // pridedu į sąrašą
    const daugSkaiciuStrigas = JSON.stringify(daugSkaiciu); // paverčiu stringu
    localStorage.setItem('mano_skaiciai', daugSkaiciuStrigas);
    renderList(); // šitas renderina kiekvieną kartą paspaudus mygtuką
});

// console.log(daugSkaiciu);

renderList(); // šitas renderina pradžioje refrešinus puslapį


/*
    
    Yra trys mygtukai: Žalias, mėlynas ir raudonas. Paspaudus vieną iš mygtukų jo spalva įsirašo
    į localStorage. Kiekvienas mygtuko paspaudimas prideda savo spalvą prie sąrašo.
    Sąrašo spalvos atvaizduojamos html spalvotų (atitinkamai išsaugotai spalvai) kvadratukų pavidale.
    Sąrašas atsinaujina dinamiškai 

*/

// CRUD




