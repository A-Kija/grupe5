console.log('Troleibusas');

class Troleibusas {

    constructor() {
        this.keleiviuSkaicius = 0;
    }

    ilipa(keleiviuSkaicius) {
        this.keleiviuSkaicius += keleiviuSkaicius;
    }

    islipa(keleiviuSkaicius) {
        const liko = Math.max(0, this.keleiviuSkaicius - keleiviuSkaicius);
        this.keleiviuSkaicius = liko;
    }

    vaziuoja() {
        console.log('Važiuoja: ' + this.keleiviuSkaicius);
    }

}