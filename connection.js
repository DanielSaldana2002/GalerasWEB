require('dotenv').config();
var sql = require('mssql');
var request = require('request');
var val;
const dbSettings = {
    user: process.env.user,
    password: process.env.password,
    server: process.env.server,
    database: process.env.database,
    options: {
        encrypt: true,
        trustServerCertificate: true,
    },
};

borrarDatosDeLaAPI();
consultaMostrarTodo(true);
setInterval(() => {
    var e;
}, 3000);

function borrarDatosDeLaAPI(){
    request = require('request');
    var options = {
        'method': 'DELETE',
        'url': 'http://localhost:3000/BaseDeDatos/1',
        'headers': {
        }
    };
    request(options, function (error, response) {
    if (error) throw new Error(error);
    });

    request = require('request');
    var options = {
        'method': 'DELETE',
        'url': 'http://localhost:3000/BaseDeDatos/1',
        'headers': {
        }
    };
    request(options, function (error, response) {
    if (error) throw new Error(error);
    });

    request = require('request');
    var options = {
        'method': 'DELETE',
        'url': 'http://localhost:3000/BaseDeDatos/1',
        'headers': {
        }
    };
    request(options, function (error, response) {
    if (error) throw new Error(error);
    });
}

async function consultaMostrarTodo(validador){
   if(validador == true){
        const pool = await sql.connect(dbSettings);
        const result = await pool.request().query("SELECT Products.ProductID, Products.ProductName, Categories.CategoryName FROM dbo.Products, dbo.Categories where Products.CategoryID = Categories.CategoryID;");
        console.log(result.recordsets[0]);
        var listaProductos = result.recordsets[0];
        const pool2 = await sql.connect(dbSettings);
        const result2 = await pool2.request().query("SELECT Categories.CategoryID, Categories.CategoryName, Categories.Description FROM dbo.Categories;");
        console.log(result2.recordsets[0]);
        var listaCategorias = result2.recordsets[0];
        const pool3 = await sql.connect(dbSettings);
        const result3 = await pool3.request().query("SELECT Employees.EmployeeID, Employees.FirstName, Employees.LastName FROM dbo.Employees;");
        console.log(result3.recordsets[0]);
        var listaEmpleados = result3.recordsets[0];

        request = require('request');
        var options = {
            'method': 'POST',
            'url': 'http://localhost:3000/BaseDeDatos',
            'headers': {
            'Content-Type': 'application/json'
            },
            body: JSON.stringify({listaEmpleados,listaCategorias,listaProductos})
        };
        request(options, function (error, response) {
        if (error) throw new Error(error);
        });
   }
}