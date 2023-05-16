<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeon/registroAlmacen.css">
    <title>Cantidad almacen | Galeon</title>
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
        <h1>Cantidad de almacen</h1>
        <form action="/php/galeon/controllers/verificacionCantidadAlmacen.php" method="post" id="formularioRegistro">
            <?php
            session_start();
            $id = $_POST['idA'];
            $stmt = "209.126.107.8";
            $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
            $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
            $sql="SELECT nombre_almacen, cantidad_piezas_almacen, contenido_piezas_total_almacen, fk_id_tipo_piezas_almacen FROM dbo.almacen WHERE id_almacen = '$id'";
            $res=sqlsrv_query($con,$sql);
            while($row=sqlsrv_fetch_array($res)){
                $nombreA = $row['nombre_almacen'];
                $cantidadA = $row['cantidad_piezas_almacen'];
                $contenidoA = $row['contenido_piezas_total_almacen'];
                $tipoA = $row['fk_id_tipo_piezas_almacen'];
                echo <<<TEXTO
                    <input type="text" name="" id="" placeholder="Nombre" autocomplete="off" value="$nombreA" disabled>
                    <input type="text" name="nombreAlmacen" id="" placeholder="Nombre" autocomplete="off" value="$nombreA" style="display: none;">
                    <input onkeydown="bloquearBotones()" type="number" name="cantidadAlmacen" id="" placeholder="Cantidad" value="$cantidadA">
                TEXTO;
            }
            ?>   
            <button type="submit">Modificar</button>
        </form>
    </div>
</body>
</html>