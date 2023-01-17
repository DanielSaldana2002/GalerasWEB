var carta;
var request = require('request');
var options = {
  'method': 'GET',
  'url': 'http://localhost:3000/carta/',
  'headers': {
  }
};

function apiCarta(){
  request(options, function (error, response) {
    if (error) throw new Error(error);
    carta = JSON.parse(response.body);
    console.log(carta)
  });
}

apiCarta();