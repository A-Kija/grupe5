const express = require('express');
const fs = require('fs'); // failų sistemos modulis-biblioteka
const bodyParser = require('body-parser');
const app = express();
const port = 80;

// Body parser middleware
app.use(bodyParser.urlencoded({ extended: true })); // for parsing application/x-www-form-urlencoded
app.use(bodyParser.json()); // for parsing application/json

app.use(express.static('public'));




// Dalis Router
app.get('/', (req, res) => {

    res.send('Hello Racoon! This is version 041 with auto-restart on code changes.');

});

app.get('/about', (req, res) => {

    res.send('About page');

});

app.get('/about/racoon/green', (req, res) => {

    res.send('Green racoon about page');

});

app.get('/url-symbols', (req, res) => {

    const symbols = '.--@--#--$--%--^--&--?--=-- ';

    const encodedSymbols = encodeURIComponent(symbols);

    res.send('Original symbols: ' + symbols + '<br>' +
             'Encoded symbols: ' + encodedSymbols + '<br>' +
             'Decoded symbols: ' + decodeURIComponent(encodedSymbols)
    );

});


// duomenų perdavimas su parametrais
// parametrai yra URL dalis
// :color yra kintamasis įdėtas į URL vietą
app.get('/racoon/:color', (req, res) => {
    // iš URL paimame spalvos parametrą
    const racoonColor = req.params.color; // koloras yra automatiškai url dekoduojamas
    res.send('<h1 style="color:' + racoonColor + '" ' +'>This racoon is ' + racoonColor + '</h1>');
});


app.get('/kas/:vardas/kiek/:amzius', (req, res) => { // nustatome url struktūrą su dviem parametrais
    // dvitaškis : reiškia, kad tai yra kintamasis
    
    const vardas = req.params.vardas;
    // req - tai objektas, kuriame yra visa info apie užklausą
    // req.params - tai objektas, kuriame yra visi parametrai iš URL
    // req.params.vardas - paimame vardas parametrą iš URL. Parametrai visada yra tekstinio tipo (string)
    const amzius = req.params.amzius;
    // pradedame klijuoti atsakymą:
    res.send('Sveikas ' + vardas + '. Tavo amžius yra ' + amzius);
    // res - tai objektas, kuriame yra visa info apie atsakymą
    // res.send() - metodas, kuris siunčia atsakymą į naršyklę
    // res.send('tekstas') - siunčia tekstą į naršyklę
});


// Padaryti kalkuliatorių skaičiuotuvą sumai per URL skaičiuoti
// url pvz: /suma/5/10  => turi parašyti "5 + 10 = 15"

app.get('/suma/:skaicius1/:skaicius2', (req, res) => {
    const skaicius1 = parseFloat(req.params.skaicius1); // paverčiame tekstą į skaičių
    const skaicius2 = +req.params.skaicius2; // kitas būdas paversti tekstą į skaičių
    // dar vienas būdas: const skaicius2 = Number(req.params.skaicius2);
    const suma = skaicius1 + skaicius2;
    // res.send(skaicius1 + ' + ' + skaicius2 + ' = ' + suma);
    // with backticks `
    res.send(`${skaicius1} + ${skaicius2} = ${suma}`);
});

// --------------------
// Padaryti didesnio skaičiaus radimą per URL
// pvz: /didesnis/5/10  => turi parašyti "Didesnis skaičius yra 10"

app.get('/didesnis/:skaicius1/:skaicius2', (req, res) => {
    const skaicius1 =  parseFloat(req.params.skaicius1); // paverčiame tekstą į skaičių
    const skaicius2 = parseFloat(req.params.skaicius2); // paverčiame tekstą į skaičių

    // Vartotojo įvestos informacijos validacija (tikrinimas)

    if (isNaN(skaicius1) || isNaN(skaicius2)) { // tikriname ar abu parametrai yra skaičiai
        res.send('Klaida: abu parametrai turi būti skaičiai.');
        return; // baigiame funkcijos vykdymą
    }

    if (skaicius1 == skaicius2) {
        res.send('Klaida: skaičiai yra lygūs.');
        return; // baigiame funkcijos vykdymą
    }

    let didesnis; // kintamasis didesniam skaičiui saugoti
    if (skaicius1 > skaicius2) { // tikriname kuris skaičius didesnis
        didesnis = skaicius1; // priskiriame didesnį skaičių kintamajam
    } else {
        didesnis = skaicius2; // priskiriame didesnį skaičių kintamajam
    }

    res.send(`Didesnis skaičius yra ${didesnis}`); // siunčiame atsakymą su didesniu skaičiumi
});

// --------------------

/*
// fikcinis URL su parametrais
https://duckduckgo.com/karv%C4%97/chromentp/web

Query (užklausos) parametrai URL'e
pvz:
https://duckduckgo.com/?q=karv%C4%97&t=chromentp&ia=web

parametrai yra URL dalis po klaustuko ?
parametras susideda iš kintamojo vardo ir reikšmės
vardas rašomas prieš lygybės ženklą =
reikšmė rašoma po lygybės ženklo =
jei yra keli parametrai, jie atskiriami & ženklu

*/



// duomenų perdavimas su query (užklausos) parametrais
// 
app.get('/spalvotas-dydis', (req, res) => {
    // paimame query kintamuosius iš req objekto

    // req.query - objektas, kuriame yra visi query kintamieji
    // req.query.color - paimame color kintamojo reikšmę
    const spalva = req.query.color; 
    const dydis = req.query.size;
    const mazis = req.query.small;
    res.send(`Spalva yra ${spalva}, dydis yra ${dydis}, mažis yra ${mazis}`);
});




// Padaryti kalkuliatorių skaičiuotuvą sumai per URL skaičiuoti
// url su query  => turi parašyti "5 + 10 = 15"

app.get('/query-suma', (req, res) => {
    const skaicius1 = parseFloat(req.query.skaicius1);
    const skaicius2 = parseFloat(req.query.skaicius2);
    const suma = skaicius1 + skaicius2;
    res.send(`${skaicius1} + ${skaicius2} = ${suma}`);
});

// http://localhost/query-suma?skaicius1=5&skaicius2=10


// Padaryti kalkuliatorių skaičiuotuvą sumai per URL skaičiuoti
// url pirmas skaičius kaip parametras antras kaip query kintamasis  => turi parašyti "5 + 10 = 15"

app.get('/mix-suma/:skaicius1', (req, res) => {
    const skaicius1 = parseFloat(req.params.skaicius1);
    const skaicius2 = parseFloat(req.query.skaicius2);
    const suma = skaicius1 + skaicius2;
    res.send(`${skaicius1} + ${skaicius2} = ${suma}`);
});

// http://localhost/mix-suma/5?skaicius2=10


app.get('/search', (req, res) => {
    const query = req.query.q;
    const another = req.query.another;
    res.send(`You searched for: ${query}. Another input: ${another}`);
});

// Padaryti kalkuliatorių skaičiuotuvą sumai su forma GET metodu skaičiuoti
// Formoje suvedame du skaičius
// atsidaro langas kuriame turi parašyti "5 + 10 = 15"

app.post('/login', (req, res) => {
    const username = req.body.username;
    const password = req.body.password;
    res.send(`Username: ${username}, Password: ${password}`);
});





// Paleidžia serverį ir parašo terminale, kad viskas yra gerai.
app.listen(port, () => {
    console.log(`Viskas gerai. Bebras dirba ant ${port} porto`);
});
