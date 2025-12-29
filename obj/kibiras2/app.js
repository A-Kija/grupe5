console.log('Kibiras 2');

class Kibiras2 {

    static visiAkmenys = 0;

    static kiekPririnktaAkmenuVisuoseKibiruose() {
        console.log('Visuose kibiruose pririnkta: ' + this.visiAkmenys + ' akmenys');
    }
    
    constructor() {
        this.akmenuKiekis = 0; // objekto savybės prasideda this.
    }

    prideti1Akmeni() {
        this.akmenuKiekis++; // kiekis padidinamas vienetu
        // this.akmenuKiekis = this.akmenuKiekis + 1;
        this.constructor.visiAkmenys++;
    }

    pridetiDaugAkmenu(kiekis) {
        this.akmenuKiekis += kiekis; // kiekis padidinamas "kiekiu"
        this.constructor.visiAkmenys += kiekis;
    }

    kiekPririnktaAkmenu() {
        console.log('Pririnkta: ' + this.akmenuKiekis + ' akmenai');
    }

    akmenuSkaiciusVisuoseKibiruose() {
        console.log('Visuose kibiruose pririnkta: ' + this.constructor.visiAkmenys + ' akmenys');
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

K1.akmenuSkaiciusVisuoseKibiruose();
K2.akmenuSkaiciusVisuoseKibiruose();

Kibiras2.kiekPririnktaAkmenuVisuoseKibiruose();
