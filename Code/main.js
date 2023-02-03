function apiCarta(){
  var requestOptions = {
    method: 'GET'
  };

  fetch("http://localhost:3000/carta/", requestOptions)
    .then(response => response.json())
    .then(result => mostrarDatos(result))
    .catch(error => console.log('error', error));
  const mostrarDatos = (data) => {
      console.log(data);
      let productos = '';
      for(let i = 0; i<data.length; i++){
        productos += '<tr>'+'<td>'+data[i].nombre+'</td>'+'<td>'+data[i].Categoria+'</td></tr>';
      }
      document.getElementById('apiProductos').innerHTML = productos;
  }
}

setInterval(() => {
    apiCarta()
}, 1000);
