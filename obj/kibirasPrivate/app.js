console.log('Kibiras 1');

// Saulėgraža
class Kibiras1 {

    #akmenuKiekis; // privatus

    constructor() {
        this.#akmenuKiekis = 0; // objekto savybės prasideda this.
    }

    prideti1Akmeni() {
        this.#akmenuKiekis++; // kiekis padidinamas vienetu
        // this.akmenuKiekis = this.akmenuKiekis + 1;
    }

    pridetiDaugAkmenu(kiekis) {
        this.#akmenuKiekis += kiekis; // kiekis padidinamas "kiekiu"
    }

    kiekPririnktaAkmenu() {
        console.log('Pririnkta: ' + this.#akmenuKiekis + ' akmenai');
    }

    // irgi geteris tik neoficialus
    kiekPririnktaAkmenuSkaicius() {
        return this.#akmenuKiekis;
    }

    // geteris su get
    get akmenuSkaicius() {
        return this.#akmenuKiekis;
    }

}


// Pranas
const K1 = new Kibiras1();


K1.prideti1Akmeni();
K1.prideti1Akmeni();

// privačių negalima modifikuoti ar nuskaityti už klasės ribų
// K1.#akmenuKiekis = 5;

// console.log(K1.#akmenuKiekis);



K1.kiekPririnktaAkmenu();

// const akmenysKibire = K1.kiekPririnktaAkmenuSkaicius();

const akmenysKibire = K1.akmenuSkaicius; // savybė kurios nėra, bet kurios reikšmę paskaičiuoja getteris


console.log(akmenysKibire);



// Sukurti klasę PiestukuDezute. Padaryti taip, kad į pieštukų dėžutę būtų galima pridėti pieštukų
// pvz ('red', 'blue', 'yellow' etc). Parašyti metodą, kuris atspausdina visus pieštukus

class PiestukuDezute {

    // pradinė reikšmė
    #pazymetiPiestukai = []; // masyvas į kurį dėsime pieštukus

    pridetiPiestuka(spalva) {
        this.#pazymetiPiestukai.push(spalva); // pridedam spalvą 
    }

    spausdintiPiestukus() {
        // padaro stringą, sujungdamas visus masyvo elementus per ', '
        console.log('Pieštukai dėžutėje: ' + this.#pazymetiPiestukai.join(', '));
    }
}

const P = new PiestukuDezute();

P.pridetiPiestuka('red');
P.pridetiPiestuka('blue');
P.pridetiPiestuka('yellow');

P.spausdintiPiestukus();

