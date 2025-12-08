console.log('Laba');

// "Bebras nori banano" kiek yra a raidžių?

const where = 'Bebras nori banano';
let lettersA = 0;

for (let i = 0; i < where.length; i++) {
    if (where[i] == 'a') {
        lettersA++; // pridedam vienetą
    }

    // where[i] == 'a' && lettersA++;
}

console.log(lettersA);


// "Bebras nori banano" sukurti masyvą, kurio elementai sakinio raidės ir tarpai

const lettersArray = [];

for (let i = 0; i < where.length; i++) {
    lettersArray.push(where[i]);
}

console.log(lettersArray);

// "Bebras nori banano" sukurti masyvą, kurio elementai sakinio raidės ir tarpai, a raidžių nedėti

const lettersArrayWOA = [];
for (let i = 0; i < where.length; i++) {

    where[i] == 'a' || lettersArrayWOA.push(where[i]);
    
    // where[i] == 'a' ==> true
    // po || operatoriaus push nedaromas

    // where[i] == 'a' ==> false
    // po || operatoriaus push daromas
    
    
    // if (where[i] == 'a') {
    //     continue
    // }

    // lettersArrayWOA.push(where[i]);
}

console.log(lettersArrayWOA);


/*  

TRUE  ||  nesvarbu kas čia  =====> visada bus TRUE

FALSE  &&  nesvarbu kas čia  =====> visada bus FALSE

*/

console.log(typeof lettersA == 'number');

const masyvas = [
    45,
    87,
    'a', 
    32,
    74,
    53
];

// suskaičiuoti skaičių sumą


let sumOfNumbers = 0;

for (let i = 0; i < masyvas.length; i++) {
    if (typeof masyvas[i] == 'number') {
        sumOfNumbers += masyvas[i];
    }
}

console.log(sumOfNumbers);


const masyvas2 = [
    '45',
    87,
    32,
    '74',
    '53'
];
// suskaičiuoti skaičių sumą (visų)

// parseFloat()
// parseInt()

sumOfNumbers = 0;

for (let i = 0; i < masyvas2.length; i++) {
    if (typeof masyvas2[i] == 'number') {
        sumOfNumbers += masyvas2[i]; // jeigu skaičius tai paprastai sumuojam
    } else {
        const asNumber = parseInt(masyvas2[i]); // jeigu ne, padarom skaičių
        sumOfNumbers += asNumber; // ir tada sumuojam

        // sumOfNumbers += parseInt(masyvas2[i]);
    }
}
console.log(sumOfNumbers);

const allH2 = document.querySelectorAll('h2'); // 3 H2 TAGAI, sudėti masyve* (node liste)

const h2FirstNumber = parseInt(allH2[0].innerText); 

// allH2[0] ===> visas elementas (tagas) pirmasis
// allH2[0].innerText ===> elemento vidinis tekstas
// parseInt(allH2[0].innerText) ===> elemento vidinis tekstas verčiamas į skaičių

const h2SecondNumber = parseInt(allH2[1].innerText); 

allH2[2].innerText = h2FirstNumber + h2SecondNumber;

// allH2[2].innerText ===> trečio h2 vidinis tekstas
// = h2FirstNumber + h2SecondNumber ===> yra suma skaičių 
// prieš atsitinkant priskyrimui suma verčiama į tekstą AUTOMATIŠKAI

const allH3 = document.querySelectorAll('h3');

const h3FirstNumber = parseInt(allH3[0].innerText); 
const h3LastNumber = parseInt(allH3[2].innerText); 

allH3[1].innerText = h3LastNumber - h3FirstNumber;


const nr1 = document.querySelector('#nr1');

nr1.addEventListener('click', eventas => {
    // eventas ===> event objektas (ataskaita apie įvykį)
    console.log(eventas.target, 'Elementas kuriame įvyko eventas');
    console.log(eventas.target.innerText);
});