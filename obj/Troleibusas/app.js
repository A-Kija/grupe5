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
        // 10 ---> 20 max(0, -10) ---> 0
        // 10 ---> 4 max(0, 6) ---> 6
        this.keleiviuSkaicius = liko;
    }

    vaziuoja() {
        console.log('Važiuoja: ' + this.keleiviuSkaicius);
    }

}