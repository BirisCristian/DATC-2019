// PORNIRE APLICATIE:   npm i --save-dev nodemon
//                      npm run dev

const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');
const cors = require ('cors');



// Db Config
require('./config/db');
const app = express();

const poll = require('./routes/poll');


// setez folderul public    
app.use(express.static(path.join(__dirname, 'public')));

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended : false}));


// enable CORS
app.use(cors());

app.use('/poll', poll);

const port = 3000;      
// Pornirea  serverului
app.listen(port, () => console.log('Serverul  http://localhost:3000/ e pornit pe portul ' + port));

