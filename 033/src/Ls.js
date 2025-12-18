import { v4 as uuidv4 } from 'uuid';

class Ls {


    readLocalStorage = _ => {
        let data = localStorage.getItem(KEY);
        if (null === data) {
            LIST = [];
        } else {
            LIST = JSON.parse(data);
        }
    }

    writeLocalStorage = _ => {
        let data = JSON.stringify(LIST);
        localStorage.setItem(KEY, data);
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
        LIST.unshift(dataToStore);
        writeLocalStorage();
        render();
    }

    /*
    Destroy vykdo "daikto" pašalinimą iš saugyklos
    Turi gauti "daikto" identifikatorių
    Turi pašalinti daiktą su nurodytu identifikatorium
    */
    Destroy = id => {
        LIST = LIST.filter(item => item.id != id);
        writeLocalStorage();
        render();
    }

    /*
    Update vykdo redaguoto "daikto" saugojimą saugykloje
    Turi gauti "daikto" identifikatorių ir daikto naujas savybes
    Turi persaugoti daiktą su nurodytu identifikatorium ir naujom savybėm
    */

    Update = (id, data) => {
        LIST = LIST.map(item => item.id == id ? { ...item, ...data, id } : item);
        writeLocalStorage();
        render();
    };
}