const express = require('express');
const router = express.Router();

const mongoose = require('mongoose');

const Vote = require('../models/Vote');

const Pusher = require('pusher');

var pusher = new Pusher({
    appId: '919397',
    key: '2e34c6b8d558345d4823',
    secret: 'b74d6bd7c0072543f0c9',
    cluster: 'eu',
    encrypted: true
  });  


router.get('/', (req, res) => {

    res.send('hello voter');

    //Vote.find().then(votes => res.json({success: true,votes: votes}));

});

router.post('/', (req,res) => {
  

  // const newVote = {
  //   candidat: req.body.candidat,
  //   points: 1
  // }

  // new Vote(newVote).save().then(vote => {
  //   pusher.trigger('votare-online', 'votare-presedinte', {
  //     points: parseInt(vote.points),
  //     candidat: vote.candidat
 
    // });

//     return res.json({success: true, message: 'Votul dumneavoastă a fost înregistrat'});

//   });
// });


/////////////////////
pusher.trigger('votare-online', 'votare-presedinte', {
  points: 1,
  candidat: req.body.candidat
});
return res.json({success: true, message: 'Votul dumneavoastă a fost înregistrat'});

   });

//////////////////////

module.exports = router;