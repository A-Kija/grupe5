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


    res.cookie('manoSaldainis', 'CukrinisBebras', { maxAge: 1000 * 60 * 60 * 24 , httpOnly: true}); // cookie gyvavimo laikas 1 diena
    res.send('Cookie nustatytas sėkmingai!');
});

// triname cookie naršyklėje
app.get('/delete-cookie', (req, res) => {
    // funkcija res.clearCookie('cookieName') - ištrina cookie naršyklėje
    // cookieName - cookie pavadinimas
    res.clearCookie('manoSaldainis');
    res.send('Cookie ištrintas sėkmingai!');
});



// profilio puslapis
app.get('/profile', (req, res) => {
    // Tikriname ar vartotojas yra prisijungęs
    if (req.cookies.loginStatus !== 'loggedIn') {
        return res.status(401).send('Prieiga uždrausta. Prašome prisijungti.');
    }

    // Tikrinam žinutę iš cookie
    const message = req.cookies.message;
    let msgHtml = '';
    if (message) {
        // Išvalome žinutę cookie po to, kai ją perskaitėme
        res.clearCookie('message');
        msgHtml = `<p style="color:green;">${message}</p>`;
    }

    res.send(
        `<h1>Profilio puslapis</h1>
        ${msgHtml}
        <p>Sveiki atvykę į savo profilį!</p>
        <a href="/logout">Atsijungti</a>
        `
    );
});

// Atsijungimo puslapis
app.get('/logout', (req, res) => {
    // Ištriname prisijungimo statuso cookie
    res.clearCookie('loginStatus');
    // Nukreipiame vartotoją į prisijungimo puslapį su žinute
    res.cookie('message', 'Sėkmingai atsijungta!', { maxAge: 1000 * 10 , httpOnly: true}); // cookie gyvavimo laikas 10 sekundžių
    res.redirect('/login');
});


// Prisijungimo puslapis
app.get('/login', (req, res) => {
    // Paprastas prisijungimo forma

    // Tikriname ar yra žinutė cookie
    const message = req.cookies.message;
    let msgHtml = '';
    if (message) {
        // Išvalome žinutę cookie po to, kai ją perskaitėme
        res.clearCookie('message');
        msgHtml = `<p style="color:red;">${message}</p>`;
    }

    res.send(`
        <h1>Prisijungimo puslapis</h1>
        ${msgHtml}
        <form method="POST" action="/login">
            <input type="text" name="username" placeholder="Vartotojo vardas" required />
            <input type="password" name="password" placeholder="Slaptažodis" required />
            <button type="submit">Prisijungti</button>
        </form>
    `);
});

// Prisijungimo apdorojimas
app.post('/login', (req, res) => {
    const { username, password } = req.body;
    const testUsername = 'bebras@gmail.com';
    const testPassword = '123';
    // Paprastas vartotojo tikrinimas
    if (username === testUsername && password === testPassword) {
        // Sėkmingas prisijungimas
    res.cookie('loginStatus', 'loggedIn', { maxAge: 1000 * 60 * 60 , httpOnly: true}); // cookie gyvavimo laikas 1 valanda
    
    // žinutė apie sėkmingą prisijungimą
    res.cookie('message', 'Sėkmingai prisijungta!', { maxAge: 1000 * 10 , httpOnly: true}); // cookie gyvavimo laikas 10 sekundžių
    
    // Nukreipimas į profilį
    res.redirect('/profile');
    } else {
        // Nesėkmingas prisijungimas

        // Rašome žinutę į cookie
        res.cookie('message', 'Neteisingas vartotojo vardas arba slaptažodis', { maxAge: 1000 * 10 , httpOnly: true}); // cookie gyvavimo laikas 10 sekundžių
        
        // Nukreipimas atgal į prisijungimo puslapį
        res.redirect('/login');
    }
});



// Paleidžia serverį ir parašo terminale, kad viskas yra gerai.
app.listen(port, () => {
    console.log(`Viskas gerai. Bebras dirba ant ${port} porto`);
});
