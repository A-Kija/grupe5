console.log('Veikia');

// fetch('https://in3.dev/inv/') // siunčia užklausa
//     .then(res => res.json()) // laukiam tada JSON gautą rezultatą
//     .then(inv => console.log(inv)); // kai yra JSON tada loginam

const invJson = `{
    "number": "AB-93872788",
    "date": "2025-11-27",
    "due_date": "2025-12-11",
    "company": {
        "buyer": {
            "name": "AB Paulauskas",
            "address": "Kauno g. 64, Alytus LT-57388",
            "code": "61876927",
            "vat": "LT864788443",
            "phone": "+37063213147",
            "email": "skaiste75@gmail.com"
        },
        "seller": {
            "name": "UAB Kazlauskas ir Petrauskas",
            "address": "Klaipėdos g. 68, Telšiai",
            "code": "62492982",
            "vat": "LT279940309",
            "phone": "+37068570723",
            "email": "petrauskaite.kamila@yahoo.com"
        }
    },
    "items": [
        {
            "description": "Stalas Violeta su stiklo plokšte",
            "quantity": 9,
            "price": 180,
            "discount": []
        },
        {
            "description": "Spinta Arabika su stiklo durimis",
            "quantity": 1,
            "price": 330.97,
            "discount": []
        },
        {
            "description": "Pufas Kengūra",
            "quantity": 2,
            "price": 90.5,
            "discount": {
                "type": "percentage",
                "value": 45
            }
        },
        {
            "description": "Bebro iškamša 100cm",
            "quantity": 6,
            "price": 450.99,
            "discount": {
                "type": "fixed",
                "value": 108
            }
        },
        {
            "description": "Spinta su stumdomomis durimis Afrikos drambliai žalia",
            "quantity": 9,
            "price": 720.95,
            "discount": []
        }
    ],
    "shippingPrice": 34.95
}`;

const inv = JSON.parse(invJson);

console.log(inv);

console.clear();

const animals = [
    {
        name: 'Briedis',
        age: 54
    },
    {
        name: 'Lapė',
        age: 12
    },
    {
        name: 'Vilkas',
        age: 8
    },
    {
        name: 'Kiškis',
        age: 4
    },
    {
        name: 'Erelis',
        age: 16
    },
    {
        name: 'Voverė',
        age: 3
    }
];


// 1. Pačiupinėjam visus elementus iš eilės ===> forEach

animals.forEach(animal => {
    console.log(animal.name);
});


// 2. Sukuriam patobulintą masyvą iš seno masyvo ===> map

const animalsPlus1Age = animals.map(animal => {
    return {...animal, age: animal.age + 1} //...animal kopija seno objekto, age: užrašom ant viršaus naują age
});

console.log(animalsPlus1Age);


// 3. Surandame masyve tai kas bus domina ===> find

const wolf = animals.find(animal => {
    if (animal.name == 'Vilkas') {
        return true; // paieška nutraukta, objektas su vilku rastas
    }
    return false; // paieška eina prie sekančio objekto
});

console.log(wolf);


// 4. Suskaičiuojame kažką masyve ===> reduce

const allAges = animals.reduce((sum, animal) => {
    return sum + animal.age; // įrašo naują sum reikšmę
}, 0); // 0 - pradinė sum reikšmė

console.log(allAges);







