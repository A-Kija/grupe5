const express = require('express');
const fs = require('fs'); // failų sistemos modulis-biblioteka
const app = express();
const port = 80;


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

    const symbols = '!--@--#--$--%--^--&--?--=-- ';

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







// Paleidžia serverį ir parašo terminale, kad viskas yra gerai.
app.listen(port, () => {
    console.log(`Viskas gerai. Bebras dirba ant ${port} porto`);
});
