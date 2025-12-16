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

        //****DELETE */
        
        const deleteButton = rowHtml.querySelector('[data-delete-sq]');

        // colorItem.id sugeneruotas Store metode id
        // dataset.id // į elementa prideda atributą "data-id"
        // dataset.id = colorItem.id // atributui priskiria reikšmę data-id="213246848"
        deleteButton.dataset.id = colorItem.id;

        deleteButton.addEventListener('click', e => {

            // e eventas
            // e.target iš evento gautas paspaustas mygtuko elementas
            // e.target.dataset kreipimasis į elemento "data-" atributus
            // e.target.dataset.id kreipomasis į atributą "data-id"

            const id = parseInt(e.target.dataset.id);
            Destroy(id);
        });


        //*** EDIT */

        const editInput = rowHtml.querySelector('[data-edit-color-input]');
        const editButton = rowHtml.querySelector('[data-edit-color-button]');

        editInput.value = colorItem.color; // senų duomenų perrašymas į edit formą
        editButton.dataset.id = colorItem.id;

        editButton.addEventListener('click', e => {

            const id = parseInt(e.target.dataset.id);
            const color = editInput.value;

            Update(id, color);

        });


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
    LIST.unshift(dataToStore);
    writeLocalStorage();
    render();
}

/*
Destroy vykdo "daikto" pašalinimą iš saugyklos
Turi gauti "daikto" identifikatorių
Turi pašalinti daiktą su nurodytu identifikatorium
*/
const Destroy = id => {
    LIST = LIST.filter(color => color.id != id); // išmetam iš sąrašo kvadratuką su norodytu id
    writeLocalStorage();
    render();
}

/*
Update vykdo redaguoto "daikto" saugojimą saugykloje
Turi gauti "daikto" identifikatorių ir daikto naujas savybes
Turi persaugoti daiktą su nurodytu identifikatorium ir naujom savybėm
*/

const Update = (id, data) => {
    LIST = LIST.map(item => item.id == id ? {...item, color: data} : item);
    writeLocalStorage();
    render();
};



init();