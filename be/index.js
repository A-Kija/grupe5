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

    // setTimeout(_ => {

    // Gaunam naujos prekės duomenis iš užklausos kūno
    const newItem = req.body;

    // Validacija (pavyzdys, galima išplėsti)
    if (!newItem.productName || !newItem.productPrice) {
        
        const errorFields = [];
        if (!newItem.productName) errorFields.push('productName');
        if (!newItem.productPrice) errorFields.push('productPrice');
                
        res.status(400).send({
            message: 'Product name and price are required',
            messageType: 'danger', // bootstrap alert klasėms: success, info, warning, danger
            status: 'error',
            errorFields: errorFields
        });
        return;
    }
    
    
    
    
    
    
    
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

    // }, 2000); // dirbtinis vėlinimas 2 sekundėms
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
        
        // Validacija.
        // Tikrinam ar egzistuoja resursas su tokiu ID
        const deletedProduct = products.find(product => product.id === id);
        if (!deletedProduct) {
            res.status(404).send({
                message: `Item with ID ${id} not found`,
                messageType: 'danger', // bootstrap alert klasėms: success, info, warning, danger
                status: 'error'
            });
            return;
        }

        // filtruojam prekes, paliekam tik tas kurios neturi trynimo id
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
    
    // Validacija.
    // Tikrinam ar egzistuoja resursas su tokiu ID
    const existingProduct = products.find(product => product.id === id);
    if (!existingProduct) {
        res.status(404).send({
            message: `Item with ID ${id} not found`,
            messageType: 'danger', // bootstrap alert klasėms: success, info, warning, danger
            status: 'error'
        });
        return;
    }
    
    
    
    
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


/*
Validacijos teorija
1. Kliento pusės validacija (front-end)
    - Atliekama naršyklėje prieš išsiunčiant duomenis į serverį.
    - Naudojamos HTML5 formos atributai (pvz., required, pattern) arba JavaScript.
    - Pavyzdys: Patikrinti, ar el. pašto laukas nėra tuščias ir atitinka el. pašto formatą.
    - Privalumai: Greita reakcija vartotojui, sumažina nereikalingas užklausas į serverį.
    - Trūkumai: Nesaugumas, nes vartotojas gali apeiti validaciją.

2. Serverio pusės validacija (back-end)
    - Atliekama serveryje po to, kai duomenys yra gauti iš kliento.
    - Naudojamos serverio pusės programavimo kalbos ir bibliotekos.
    - Pavyzdys: Patikrinti, ar el. pašto laukas nėra tuščias, atitinka el. pašto formatą ir ar toks el. paštas jau neegzistuoja duomenų bazėje.
    - Privalumai: Saugumas, nes serveris kontroliuoja duomenis prieš juos apdorodamas ar saugodamas.
    - Trūkumai: Lėtesnė reakcija vartotojui, nes reikia siųsti užklausą į serverį ir laukti atsakymo.

3. Abipusė validacija
    - Naudojama tiek kliento, tiek serverio pusėje.
    - Pavyzdys: Pirmiausia atliekama kliento pusės validacija, o po to serverio pusės validacija.
    - Privalumai: Geriausias saugumo ir vartotojo patirties derinys.
    - Trūkumai: Sudėtingesnė įgyvendinimo logika.

    Validacijos svarba:
    1. Saugumas.
    2. Vartotojo patirtis.

    Front-end validacija neužtikrina saugumo ir yra lengvai apeinama.
    Yra dalykų, kurių negalima patikrinti front-end'e (pvz., unikalumas duomenų bazėje).

*/