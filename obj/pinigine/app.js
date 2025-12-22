console.log('Pinigine');

class Pinigine {


    // constructor(popKiekis = 0, metKiekis = 0) { // default nustatymai bus 0
    //     this.popieriniaiPinigai = popKiekis;
    //     this.metaliniaiPinigai = metKiekis;
    // }

    constructor(kiekis = 0) {
        this.popieriniaiPinigai = 0;
        this.metaliniaiPinigai = 0;
        this.ideti(kiekis);
    }

    ideti(kiekis) {
        if (kiekis <= 2) {
            this.metaliniaiPinigai += kiekis;
        } else {
            this.popieriniaiPinigai += kiekis;
        }
    }

    skaiciuoti() {
        const kiek = this.metaliniaiPinigai + this.popieriniaiPinigai;
        console.log('Piniginėje yra ' + kiek + ' pinigų');
    }
    
}

const P1 = new Pinigine(1);
const P2 = new Pinigine();


P1.ideti(0.8);
P1.ideti(58);
P1.ideti(1);


P2.ideti(1.8);
P2.ideti(300);
P2.ideti(0.02);

P1.skaiciuoti();
P2.skaiciuoti();

console.log(P1, P2);