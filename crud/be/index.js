const express = require('express');
const fs = require('fs'); // failų sistemos modulis-biblioteka
const app = express();
const bodyParser = require('body-parser');
const port = 80;


app.listen(port, () => {
    console.log(`Viskas gerai. CRUD dirba ant ${port} porto`);
});