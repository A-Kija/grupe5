console.log('Labas Apiau!');

fetch('https://jsonplaceholder.typicode.com/todos/1') // siunčia užklausa
    .then(response => response.json()) // laukiam tada JSON gautą rezultatą
    .then(json => console.log(json)); // kai yra JSON tada loginam


// Turiu objektą

const namas = {
    kaminas: true,
    kambariai: 5,
    adresas: 'Pievos g. 15'
};

console.log(namas);

// Reikia perduoti per internetą, todėl reikia versti į stringą (tekstą)

const objektasKaipStringas = JSON.stringify(namas);

console.log(objektasKaipStringas);

// Perduodam

// Reikia vėl atversti į objektą

const velNamas = JSON.parse(objektasKaipStringas);

console.log(velNamas);





const usersUl = document.querySelector('#users-container');

const printUserList = users => {

    users.forEach(user => {
        const li = document.createElement('li') // tuščias li elementas
        const userName = user.name; // paimu iš struktūros name
        const phrase = user.company.catchPhrase // paimu frazę
        const id = user.id;
        const idVat = id * 21 / 100; // čia matematika
        li.innerText = userName + ': ' + phrase // į li dedu paimtą name ir frazę
        li.classList.add('user');
        usersUl.appendChild(li);
        const liVat = document.createElement('li') // tuščias li elementas
        liVat.innerText = idVat;
        liVat.classList.add('vated');
        usersUl.appendChild(liVat);
    });
}



fetch('https://jsonplaceholder.typicode.com/users') // siunčia užklausa
    .then(res => res.json()) // laukiam tada JSON gautą rezultatą
    .then(users => {
        console.log(users);
        printUserList(users);
    
    }); // kai yra JSON tada loginam


