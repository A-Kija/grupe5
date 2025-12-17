console.log('OOP');


class Bebras {
    // instrukcija objekto gamybai

    // metodas (funkcija) kuri AUTOMATIŠKAI pasileidžia objekto kūrimo (gaminimo) metu

    constructor() {
        console.log('KONSTRUOJAM!');

        this.bebroMetai = 12;
    }



}


// Gaminame objektą pagal instrukciją
const b1 = new Bebras();

// b1 yra objektas pagamintas pagas Bebras klasės instrukcijas

console.log(b1);

// galim tokių prisigamint daug

const b2 = new Bebras();
const b3 = new Bebras();

b3.bebroMetai = 14;

console.log(b2, b3);