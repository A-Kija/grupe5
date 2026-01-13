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
    const id = uuidv4(); // sugeneruojam unikalų ID

    newItem.id = id;


    // Perskaitom esamus duomenis iš failo (sinchroniškai iš products.json)
    
    // skaitom failą kaip tekstą
    const productsData = fs.readFileSync('products.json', 'utf-8');
    // konvertuojam tekstą į JavaScript masyvą 
    const products = JSON.parse(productsData);
    // Pridedam naują prekę į esamų prekių masyvą
    products.push(newItem);
    // Išsaugom atnaujintą prekių masyvą atgal į products.json failą
    fs.writeFileSync('products.json', JSON.stringify(products, null, 2));

    // siunčiame objektą, kuris yra verčiamas į JSON formato tekstą
    res.send({
        message: 'New item created successfully',
        status: 'success',
        item: newItem 
    }); 

    

});

app.listen(port, () => {
    console.log(`Viskas gerai. CRUD dirba ant ${port} porto`);
});