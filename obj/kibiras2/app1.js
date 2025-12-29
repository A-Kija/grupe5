console.log('Kibiras 3');

class Kibiras2 {

    static #visiAkmenys = 0;

    static kiekPririnktaAkmenuVisuoseKibiruose() {
        console.log('Visuose kibiruose pririnkta: ' + this.#visiAkmenys + ' akmenys');
    }

    static pridetiBendraiAkmenu(kiekis) {
        this.#visiAkmenys += kiekis;
    }
    
    constructor() {
        this.akmenuKiekis = 0; // objekto savybės prasideda this.
    }

    prideti1Akmeni() {
        this.akmenuKiekis++; // kiekis padidinamas vienetu
        // this.akmenuKiekis = this.akmenuKiekis + 1;
        this.constructor.pridetiBendraiAkmenu(1);
    }

    pridetiDaugAkmenu(kiekis) {
        this.akmenuKiekis += kiekis; // kiekis padidinamas "kiekiu"
        this.constructor.pridetiBendraiAkmenu(kiekis);
    }

    kiekPririnktaAkmenu() {
        console.log('Pririnkta: ' + this.akmenuKiekis + ' akmenai');
    }

    kiekisAkmenuVisuoseKibiruose() {
        console.log('Visuose kibiruose pririnkta: ' + this.constructor.#visiAkmenys + ' akmenys');
    }

}

const K1 = new Kibiras2();
const K2 = new Kibiras2();

K1.prideti1Akmeni();
K1.prideti1Akmeni();

K2.prideti1Akmeni();
K2.pridetiDaugAkmenu(8);
K2.prideti1Akmeni();

K1.kiekPririnktaAkmenu();
K2.kiekPririnktaAkmenu();

K1.kiekisAkmenuVisuoseKibiruose();
K2.kiekisAkmenuVisuoseKibiruose();



Kibiras2.kiekPririnktaAkmenuVisuoseKibiruose();
