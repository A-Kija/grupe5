const express = require('express');
const { v4: uuidv4 } = require('uuid');
const fs = require('fs'); // failų sistemos modulis-biblioteka
const app = express();
const cors = require('cors');
const bodyParser = require('body-parser');

const port = 80;



 // Formuoja atsakymą su CORS antraštėmis
app.use(cors());

// Gaunam visus prekių duomenis
app.use(bodyParser.json());


// Naujos prekės kūrimas
app.post('/items', (req, res) => {
    // Gaunam naujos prekės duomenis iš užklausos kūno
    const newItem = req.body;
    // const id = uuidv4(); // sugeneruojam unikalų ID

    newItem.id = id;

    console.log('Gauti naujos prekės duomenys:', newItem);

    // Perskaitom esamus duomenis iš failo (sinchroniškai iš products.json)
    // const productsData = fs.readFileSync('products.json', 'utf-8');
    // const products = JSON.parse(productsData);

    res.send({ message: 'Nauja prekė sukurta sėkmingai', item: newItem });

});

app.listen(port, () => {
    console.log(`Viskas gerai. CRUD dirba ant ${port} porto`);
});