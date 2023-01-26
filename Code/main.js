function animationEnterComparativa(idTitle, idInfo, titles, info){
        document.getElementById(idTitle).innerHTML = titles;
        document.getElementById(idInfo).innerHTML = info;
        var title = document.getElementById(idTitle);
        var info =  document.getElementById(idInfo);
        var informations = document.getElementById('information');
        title.style.transition = '800ms';
        title.style.textAlign = 'center';
        title.style.marginBottom = '30px';
        informations.style.transition = '1000ms';
        informations.style.backgroundColor = 'yellow';
}

function animationOutComparativa(idTitle, idInfo){
    document.getElementById(idTitle).innerHTML = "";
    document.getElementById(idInfo).innerHTML = "";
    var title = document.getElementById(idTitle);
    var info =  document.getElementById(idInfo);
    var informations = document.getElementById('information');
    title.style.textAlign = 'left';
    title.style.marginBottom = '0px';
    info.style.marginTop = '0px';
    informations.style.backgroundColor = 'white';
}

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
