function mostrar(){
  var requestOptions = {
    method: 'GET'
  };
  fetch("http://localhost:3000/BaseDeDatos/1", requestOptions)
    .then(response => response.text())
    .then(result => mostrarDatos(result))
    .catch(error => console.log('error', error));
    const mostrarDatos = (data) =>{
      var person = JSON.parse(data)
      let productos, personas ;
      for(var i = 0; i<person.listaCategorias.length;i++){
        productos += '<p>'+'ID: '+person.listaCategorias[i].CategoryID+'/Nombre: '+person.listaCategorias[i].CategoryName+'/Descripcion: '+person.listaCategorias[i].Description+'</p>';
      }
      for(var i = 0; i<person.listaEmpleados.length;i++){
        personas += '<p>'+'ID: '+person.listaEmpleados[i].EmployeeID+'/Nombre: '+person.listaEmpleados[i].FirstName+'/Apellido: '+person.listaEmpleados[i].LastName+'</p>';
      }
      document.getElementById('api').innerHTML = productos+""+personas;
    }
  }