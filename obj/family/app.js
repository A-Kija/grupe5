console.log('This is the family.');

// Klasę rašo programuotoja Giedrė.

class Miskas1 {
    constructor(pavadinimas, plotas) {
        this.pavadinimas = pavadinimas;
        this.plotas = plotas; // plotas hektarais
    }

    bebras(vardas) {
        console.log(`${vardas} gyvena ${this.pavadinimas} miške, kurio plotas yra ${this.plotas} ha.`);
    }
}


// Klasę rašo programuotojas Tomas.

class Miskas2 {
    constructor(pavadinimas, plotas) {
        this.pavadinimas = pavadinimas;
        this.plotas = plotas; // plotas hektarais
    }

    briedis(vardas) {
        console.log(`${vardas} gyvena ${this.pavadinimas} miške, kurio plotas yra ${this.plotas} ha.`);
    }
}


const miskas1 = new Miskas1('Giraitė', 150);
miskas1.bebras('Bebras Petras');

const miskas2 = new Miskas2('Ąžuolynas', 200);
miskas2.briedis('Briedis Jonas');