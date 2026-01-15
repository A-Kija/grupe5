const express = require('express');
const fs = require('fs'); // failų sistemos modulis-biblioteka
const bodyParser = require('body-parser'); // kūno vidurio analizės tarpinis programinis įrankis (middleware)
const cookieParser = require('cookie-parser'); // cookie analizės tarpinis programinis įrankis (middleware)
const app = express();
const port = 80;

// Kūno vidurio analizės tarpinis programinis įrankis (middleware)
app.use(bodyParser.urlencoded({ extended: true })); // skirta analizuoti application/x-www-form-urlencoded
app.use(bodyParser.json()); // skirta analizuoti application/json

// Cookie analizės tarpinis programinis įrankis (middleware)
app.use(cookieParser());

app.use(express.static('public'));


// Dalis Router
app.get('/', (req, res) => {

    res.send('Labas Meškėnai! Tai versija 047 su automatinio paleidimo funkcija, kai keičiasi kodo failai.');

});

// skaitome cookie iš kliento
app.get('/get-cookie', (req, res) => {

    // req - iš naršyklės atsiųstas užklausos objektas
    // req.cookies - iš naršyklės atsiųsto užklausos objekto, cookies objektas
    // req.cookies.manoSaldainis - iš naršyklės atsiųsto užklausos objekto, cookies objekto, manoSaldainis reikšmė

    const cookie = req.cookies.manoSaldainis || 'Nėra cookie';


    res.send(`Cookie gautas sėkmingai: ${cookie}`);
});

// duodame cookie klientui
app.get('/set-cookie', (req, res) => {

    // res - į naršyklę siunčiamas atsakymo objektas
    // funkcija res.cookie('cookieName', 'cookieValue', { options }) - nustato cookie naršyklėje
    // cookieName - cookie pavadinimas
    // cookieValue - cookie reikšmė
    // options - papildomos nustatymų parinktys, pvz., maxAge (gyvavimo laikas ms)


    res.cookie('manoSaldainis', 'CukrinisBebras', { maxAge: 900000 });
    res.send('Cookie nustatytas sėkmingai!');
});
    



// Paleidžia serverį ir parašo terminale, kad viskas yra gerai.
app.listen(port, () => {
    console.log(`Viskas gerai. Bebras dirba ant ${port} porto`);
});
