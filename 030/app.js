console.log('CRUD');


let LIST;
const KEY = 'myFancyColorsList';

const init = _ => {
    readLocalStorage();
    const createInput = document.querySelector('[data-create-color-input]');
    const createButton = document.querySelector('[data-create-color-button]');

    createButton.addEventListener('click', _ => {
        const color = createInput.value;
        Store(color);
    });
}

const readLocalStorage = _ => {
    let data = localStorage.getItem(KEY);
    if (null === data) {
        LIST = [];
    } else {
        LIST = JSON.parse(data);
    }
}

const writeLocalStorage = _ => {
    let data = JSON.stringify(LIST);
    localStorage.setItem(KEY, data);
}


/*
Store vykdo naujo "daikto" įrašymą į saugyklą
Turi gauti "daiktą"
Turi "daiktui" priskirt ID ir įrašyti į saugyklą
*/
const Store = data => {

}



init();