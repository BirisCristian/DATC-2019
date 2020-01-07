const mongoose = require('mongoose');



// MAp global Promises
mongoose.Promise = global.Promise;

mongoose.connect('mongodb+srv://manevra:1234@votingappcluster0-i3vh5.mongodb.net/test?retryWrites=true&w=majority').then(() => console.log('MongoDB Connected')).catch(err => console.log(err));