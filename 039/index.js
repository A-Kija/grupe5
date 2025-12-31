const express = require('express');
const fs = require('fs'); // failų sistemos modulis
const app = express();

const port = 80;



// Dalis Router

app.get('/', (req, res) => {
    // req jau yra kaip objektas, paverstas iš stringo
    // res yra objektas, vėlaiau automatiškai verčiamas į stringą

res.status(200).send('<h1>Labas, Bebrai! Ką tu?</h1>');
// res.status(418).send('Kavos nebus');
});


app.get('/bebras', (req, res) => {
    res.send('Bebro puslapis');
});

app.get('/barsukas', (req, res) => {
    res.send('Barsuko puslapis');
});


// URL su perduodamu parametru
app.get('/barsukas/:id', (req, res) => {

    const id = req.params.id; // params raktinis žodis gauti parametrui

    res.send('Barsuko puslapis ' + id);
});

// app.get('/barsukas/2', (req, res) => {
//     res.send('Barsuko puslapis 2');
// });


app.get('/briedis', (req, res) => {
    // read file synchronously
    const data = fs.readFileSync('./html/briedis.html', 'utf8');
    res.send(data);
});



// Paleidžia serverį ir parašo terminale, kad viskas yra gerai.
app.listen(port, () => {
  console.log(`Viskas gerai. Bebras dirba ant ${port} porto`);
});
