console.log('OOP');

// Rašo Marytė

class Bebras {
    // instrukcija objekto gamybai

    // metodas (funkcija) kuri AUTOMATIŠKAI pasileidžia objekto kūrimo (gaminimo) metu

    constructor(metai) {
        console.log('KONSTRUOJAM!');

        this.bebroMetai = metai;  // this === b1, kitą kartą this === b2, , dar kitą kartą this === b3

        // this nuoroda į dar neegzistuojantį objektą "tas"
    }


    kiekMetu() {
        console.log('Bebrui yra: ' + this.bebroMetai + ' metų');
    }



}

//Rašo Petriukas

// Gaminame objektą pagal instrukciją
const b1 = new Bebras(10);

// b1 yra objektas pagamintas pagas Bebras klasės instrukcijas

console.log(b1);

// galim tokių prisigamint daug

const b2 = new Bebras(12);
const b3 = new Bebras(16);

b3.bebroMetai = 14;

console.log(b2, b3);

b2.kiekMetu();



// Sukurti 3 namų objektus iš klasės Namas. Kiekvienas namas turi turėti
// skirtingą kambarių ir kaminų kiekį

class Namas {

    constructor(kambariai, kaminai) {
        this.kambariai = kambariai; // kambariai kintamasis; this.kambariai objekto savybė
        this.kaminai = kaminai;
    }

    kamIrKam() {
        const sandauga = this.kambariai * this.kaminai;
        console.log('Sandauga: ' + sandauga);
    }
}

const n1 = new Namas(4, 5);
const n2 = new Namas(7, 1);
const n3 = new Namas(2, 0);

console.log(n1, n2, n3);

n2.kamIrKam();


// Parašyti metodą kuris atspausdina kaminų ir kambarių sandaugą