console.log('Grybas');



class Grybas {

    constructor() {
        this.valgomas = !this.rand(0, 1);
        this.sukirmijes = !this.rand(0, 1); 
        // rand(0, 1) ===> 0 arba 1 ===> !0 -> true arba !1 -> false
        this.svoris = this.rand(5, 45);
    }

    rand(min, max) {
        const minCeiled = Math.ceil(min);
        const maxFloored = Math.floor(max);
        return Math.floor(Math.random() * (maxFloored - minCeiled + 1) + minCeiled);
    }
}

class Krepsys {

    constructor() {
        this.dydis = 500;
        this.prikrauta = 0;
    }

    deti(grybas) {
        if (grybas.valgomas && !grybas.sukirmijes) {
            this.prikrauta += grybas.svoris;
        }
        return this.dydis > this.prikrauta; // true ===> dar yra vietos
    }
}

const krepsys = new Krepsys();

while(krepsys.deti(new Grybas())){}


console.log(krepsys);