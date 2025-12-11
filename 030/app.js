console.log('CRUD');

/*
Naujo pridėjimas

Create - vaizdas
Store - veiksmas


*/


let LIST;
const KEY = 'myFancyColorsList';

const init = _ => {
    readLocalStorage();
    render();
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

const rand = (min, max) => {
    const minCeiled = Math.ceil(min);
    const maxFloored = Math.floor(max);
    return Math.floor(Math.random() * (maxFloored - minCeiled + 1) + minCeiled)
}

const render = _ => {
    const listBin = document.querySelector('[data-colors-list]');
    const listRowTemplate = document.querySelector('[data-list-template]');
    listBin.innerHTML = '';
    LIST.forEach(colorItem => {
        const rowHtml = listRowTemplate.content.cloneNode(true);
        const colorSq = rowHtml.querySelector('[data-color-sq]');

        colorSq.style.backgroundColor = colorItem.color + '70'; // + permatomumas
        colorSq.style.borderColor = colorItem.color;

        listBin.appendChild(rowHtml);

    });
}


/*
Store vykdo naujo "daikto" įrašymą į saugyklą
Turi gauti "daiktą"
Turi "daiktui" priskirt ID ir įrašyti į saugyklą
*/
const Store = data => {
    const id = rand(10000000, 99999999); // netikras unikalus id
    dataToStore = {
        id, // ====> supaprastintintas id: id
        color: data
    }
    LIST.push(dataToStore);
    writeLocalStorage();
    render();
}



init();