<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeon/registroAlmacen.css">
    <title>Registro almacen | Galeon</title>
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
        <h1>Registro de almacen</h1>
        <form action="/php/galeon/controllers/verificacionRegistroAlmacen.php" method="post" id="formularioRegistro">   
            <input type="text" name="nombreAlmacen" id="" placeholder="Nombre" autocomplete="off" required>
            <input onkeydown="bloquearBotones()" type="number" name="cantidadAlmacen" id="" placeholder="Cantidad" required>
            <input onkeydown="bloquearBotones()" type="number" name="contenidoAlmacen" id="" placeholder="Contenido" required>
            <select name="tipoPiezas" id="">
                <?php
                    $stmt = "209.126.107.8";
                    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
                    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql="SELECT nombre_tipo_pieza FROM dbo.almacen_tipo";
                    $res=sqlsrv_query($con,$sql);
                    while($row=sqlsrv_fetch_array($res)){
                        $tipoPieza = $row['nombre_tipo_pieza'];
                        echo <<<TEXTO
                        <option>$tipoPieza</option>
                        TEXTO;
                    }
                ?>
            </select>
            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>