import { v4 as uuidv4 } from 'uuid';

class Ls {

    constructor(key) {
        this.key = key; // prisimenam key
        this.readLocalStorage(); // paleidžiam metodą readLocalStorage
    }


    readLocalStorage = _ => {
        let data = localStorage.getItem(this.key);
        if (null === data) {
            this.list = [];
        } else {
            this.list = JSON.parse(data);
        }
    }

    writeLocalStorage = _ => {
        let data = JSON.stringify(this.list);
        localStorage.setItem(this.key, data);
    }


    /*
    Store vykdo naujo "daikto" įrašymą į saugyklą
    Turi gauti "daiktą"
    Turi "daiktui" priskirt ID ir įrašyti į saugyklą
    */
    Store = data => {
        const id = uuidv4();
        const dataToStore = {
            ...data,
            id
        }
        this.list.unshift(dataToStore); // pakeičia listą
        this.writeLocalStorage();
    }

    /*
    Destroy vykdo "daikto" pašalinimą iš saugyklos
    Turi gauti "daikto" identifikatorių
    Turi pašalinti daiktą su nurodytu identifikatorium
    */
    Destroy = id => {
        this.list = this.list.filter(item => item.id != id);
        this.writeLocalStorage();
    }

    /*
    Update vykdo redaguoto "daikto" saugojimą saugykloje
    Turi gauti "daikto" identifikatorių ir daikto naujas savybes
    Turi persaugoti daiktą su nurodytu identifikatorium ir naujom savybėm
    */

    Update = (id, data) => {
        this.list = this.list.map(item => item.id == id ? { ...item, ...data, id } : item);
        this.writeLocalStorage();
    };
}

export default Ls; // išeksportuojam