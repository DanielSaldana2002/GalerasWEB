import { Console } from 'console';
import sql from 'mssql'
var val;

setInterval(() => {
    metodoAPIGet();
    consultaMostrarTodosLosEmpleados(val);
    metodoAPIDelete2();
}, 1000);

const dbSettings = {
    user: 'daniel2002',
    password: '12345678',
    server: 'DESKTOP-DANIEL',
    database: 'Northwind',
    options: {
        encrypt: true,
        trustServerCertificate: true,
    },
};

function metodoAPIGet(){
    var empleado;
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
      };
      
      fetch("http://localhost:3000/metodo/GET", requestOptions,)
        .then(response => response.text())
        .then(result => mostrarDatos(result))
        .catch(error => console.log('error', error));
    const mostrarDatos = (data) => {
        empleado = JSON.parse(data);
        val = empleado.activador;
    }
}

function metodoAPIDelete2(){
    var requestOptions = {
        method: 'DELETE',
        redirect: 'follow'
      };
      
      fetch("http://localhost:3000/empleados/2", requestOptions)
        .then(response => response.text())
        .then(result => result)
        .catch(error => console.log('error', error));
}

function metodoAPIDelete1(validador){
    if(validador==true){
        var requestOptions = {
            method: 'DELETE',
            redirect: 'follow'
          };
          
          fetch("http://localhost:3000/empleados/1", requestOptions)
            .then(response => response.text())
            .then(result => result)
            .catch(error => console.log('error', error));
    }
}

async function consultaMostrarTodosLosEmpleados(validador){
    metodoAPIDelete1(val);
    if(validador == true){
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            "activador": false
        });

        var requestOptions = {
            method: 'PATCH',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch("http://localhost:3000/metodo/GET", requestOptions,)
        .then(response => response.text())
        .then(result => console.log())
        .catch(error => console.log('error', error));
        const pool = await sql.connect(dbSettings);
        const result = await pool
        .request()
        .query("SELECT Employees.EmployeeID, Employees.FirstName, Employees.LastName FROM dbo.Employees;");
        console.log(result.recordsets[0]);
        var listaEmpleados = result.recordsets[0];
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
        var raw = JSON.stringify({
            listaEmpleados
        });

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch("http://localhost:3000/empleados", requestOptions)
        .then(response => response.text())
        .then(result => console.log())
        .catch(error => console.log('error', error));
    }
}