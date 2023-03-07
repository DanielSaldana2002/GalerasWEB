var request = require('request');
var options = {
  'method': 'GET',
  'url': 'https://danielsaldana2002.github.io/APIs.json',
  'headers': {
    'Content-Type': 'application/json'
  },
};
request(options, function (error, response) {
  if (error) throw new Error(error);
  let APIs = JSON.parse(response.body);
  console.log(APIs.BaseDeDatos[0].listaCategorias[2]);
});

let example = 'Hola mundo tierra';
let palabras = example.split(" ");
for (let index = 0; index < palabras.length; index++) {
    console.log(palabras[index]);    
}