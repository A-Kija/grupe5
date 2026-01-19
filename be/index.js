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
        message: `Item ${newItem.productName} created successfully`,
        messageType: 'success',
        status: 'success',
        item: newItem 
    }); 
});


// Visų prekių gavimas
app.get('/items', (req, res) => {
    // skaitom failą kaip tekstą
    const productsData = fs.readFileSync('products.json', 'utf-8');
    // konvertuojam tekstą į JavaScript masyvą 
    const products = JSON.parse(productsData);
    // siunčiame objektą, kuris yra verčiamas į JSON formato tekstą
    res.send({
        message: 'Items retrieved successfully',
        status: 'success',
        items: products 
    }); 
});

// Prekės trynimas pagal ID
app.delete('/items/:id', (req, res) => { // turim url su parametru id kuris yra produkto id
    // setTimeout(_ => {
        const id = req.params.id; // paimam id iš url Jeigu id būtų skaičius, reikėtų naudoti parseInt(req.params.id)
        const productsData = fs.readFileSync('products.json', 'utf-8');// skaitom failą kaip tekstą
        let products = JSON.parse(productsData); // konvertuojam tekstą į JavaScript masyvą 
        // filtruojam prekes, paliekam tik tas kurios neturi trynimo id
        const deletedProduct = products.find(product => product.id === id);
        products = products.filter(product => product.id !== id);
        // išsaugom atnaujintą prekių masyvą atgal į products.json failą
        fs.writeFileSync('products.json', JSON.stringify(products, null, 2));
        res.send({
            message: `Item ${deletedProduct.productName} deleted successfully`,
            messageType: 'info',
            status: 'success'
        });
    // }, 3000); // dirbtinis vėlinimas 3 sekundėms
});

// Prekės atnaujinimas pagal ID
app.put('/items/:id', (req, res) => {
    const id = req.params.id; // paimam id iš url, kad žinotume kurią prekę atnaujinti
    const updatedItem = req.body; // gaunam atnaujintus duomenis iš užklausos kūno
    const productsData = fs.readFileSync('products.json', 'utf-8');// skaitom failą kaip tekstą
    let products = JSON.parse(productsData); // konvertuojam tekstą į JavaScript masyvą
    // einam per visas prekes ir randam tą kuri reikia atnaujinti
    products = products.map(product => {
        if (product.id === id) {
            // grąžinam atnaujintą prekę
            return {
                ...product, // išskleidžiam esamus prekės duomenis
                ...updatedItem, // išskleidžiam atnaujintus duomenis (jie užrašys esamus)
                id:id // užtikrinam, kad ID nepasikeis dėl saugumo
            };
        }
        return product; // grąžinam nepakeistą prekę
    });
    const updatedProductName = updatedItem.productName;
    // išsaugom atnaujintą prekių masyvą atgal į products.json failą
    fs.writeFileSync('products.json', JSON.stringify(products, null, 2));
    res.send({
        message: `Item ${updatedProductName} updated successfully`,
        messageType: 'success',
        status: 'success'
    });
});


// Serverio paleidimas
app.listen(port, () => {
    console.log(`Viskas gerai. CRUD dirba ant ${port} porto`);
});