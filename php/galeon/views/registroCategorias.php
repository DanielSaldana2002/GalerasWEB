<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeon/registroCategorias.css">
    <title>Registro | Galeon</title>
</head>
<body>
    <script>
        function bloquearBotones(){
            if (event.key === "-" || event.key === "Minus") {
                event.preventDefault();
            }
            if(event.key === "." || event.key === "decimal"){
                event.preventDefault(); 
            }
        }
    </script>
    <script src="/Javascript/keyEventCuentas.js"></script>
    <div id="boxRegistro">
        <form action="/php/galeon/controllers/verificacionRegistroCategorias.php" method="post" id="formularioRegistro">
            <h1>Registro de categorias</h1>    
            <input type="text" name="NombreC" placeholder="Nombre de la categoria" autocomplete="off" required></br>
            <button type="submit">Registrar</button>
        </form>
        <h1>Registro de productos</h1>
        <form action="/php/galeon/controllers/verificacionRegistroProductos.php" method="post" id="formularioRegistro">   
            <input type="text" name="NombreP" placeholder="Nombre del producto" autocomplete="off" required>
            </br><input type="number" name="PrecioP" placeholder="Precio del producto" autocomplete="off" id="precioP" min="0" onkeydown="bloquearBotones()" required>
            </br><select name="cCategoria" id="">
                <?php
                    $stmt = "localhost";
                    $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
                    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql="SELECT nombre_categoria from dbo.categoria_productos";
                    $res=sqlsrv_query($con,$sql);
                    while($row=sqlsrv_fetch_array($res)){
                        $nombreC = $row['nombre_categoria'];
                        echo <<<TEXTO
                            <option>$nombreC</option>
                        TEXTO;
                    }
                ?>
            </select>
            </br><button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>