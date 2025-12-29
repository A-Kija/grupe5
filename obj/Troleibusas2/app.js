console.log('Troleibusas 2');

class Troleibusas {

    static #visiKeleiviai = 0;
    
    #keleiviuSkaicius = 0;
    

    ilipa(keleiviuSkaicius) {
        this.#keleiviuSkaicius += keleiviuSkaicius;
        Troleibusas.#visiKeleiviai += keleiviuSkaicius;
    }

    islipa(keleiviuSkaicius) {
        const liko = Math.max(0, this.#keleiviuSkaicius - keleiviuSkaicius);
        this.#keleiviuSkaicius = liko;

        const islipo = this.#keleiviuSkaicius < keleiviuSkaicius ? this.#keleiviuSkaicius : keleiviuSkaicius;
        Troleibusas.#visiKeleiviai -= islipo;

    }

    vaziuoja() {
        console.log('Važiuoja: ' + this.#keleiviuSkaicius);
    }

    keleiviuSkaiciusVisuoseTroleibusuose() {
        console.log('\x1b[36m%s\x1b[0m', 'Visų keleivių skaičius: ' + Troleibusas.#visiKeleiviai);
        // Naudojame \x1b[36m ir \x1b[0m, kad pakeistume teksto spalvą į cyan
        // more info apie ANSI spalvas: https://en.wikipedia.org/wiki/ANSI_escape_code#8-bit
    }

}

const troleibusasNr1 = new Troleibusas();
troleibusasNr1.ilipa(10);
troleibusasNr1.vaziuoja();
troleibusasNr1.ilipa(5);
troleibusasNr1.vaziuoja();
troleibusasNr1.islipa(3);
troleibusasNr1.vaziuoja();
troleibusasNr1.islipa(20);
troleibusasNr1.vaziuoja();

const troleibusasNr7 = new Troleibusas();
troleibusasNr7.ilipa(20);
troleibusasNr7.vaziuoja();
troleibusasNr7.islipa(5);
troleibusasNr7.vaziuoja();
troleibusasNr7.ilipa(1);
troleibusasNr7.vaziuoja();

troleibusasNr1.keleiviuSkaiciusVisuoseTroleibusuose();
troleibusasNr7.keleiviuSkaiciusVisuoseTroleibusuose();

