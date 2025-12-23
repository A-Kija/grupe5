console.log('Stiklinė');

class Stikline {

    constructor(turis) {
        this.turis = turis;
        this.kiekis = 0;
    }

    ipilti(kiekis) {
        this.kiekis = Math.min(this.turis, this.kiekis + kiekis);
        return this; // grąžina stiklinę
    }

    ispilti() {
        const kiekis = this.kiekis; // priskyrima pagal VALUE
        this.kiekis = 0; // stiklinėje lieka 0
        return kiekis; // grąžinam tokį kiekį koks buvo pripiltas kažkada (iš 16 eilutės)
    }

    stiklinejeYra() {
        console.log(`${this.turis} tūrio stiklinėje yra ${this.kiekis}`);
    }

}

const s200 = new Stikline(200);
const s150 = new Stikline(150);
const s100 = new Stikline(100);

// s200.ipilti(500) <---- grąžinamas this===s200
// vadinasi mes galime:
// s200.ispilti() ===> s200.ipilti(500).ispilti()


s100.ipilti(s150.ipilti(s200.ipilti(500).ispilti()).ispilti());


s200.stiklinejeYra();
s150.stiklinejeYra();
s100.stiklinejeYra();