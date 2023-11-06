<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos | Galeras</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeras/style.css">
    <link rel="stylesheet" href="/style/galeras/eventos.css">
</head>
<body>
    <div id="body-desktop">
        <ul id="menu">
            <li><a href="/html/galeras/index.html" id="size-desktop">Inicio</a></li>
            <li><a href="/php/galeras/views/sucursal.php" id="size-desktop">Sucursal</a></li>
            <li><a href="/php/galeras/views/productos.php" id="size-desktop">Productos</a></li>
            <li><a href="/php/galeras/views/eventos.php" id="size-desktop">Eventos</a></li>
            <li><a href="/php/galeras/views/comentarios.php" id="size-desktop">Comentarios</a></li>
            <li><a href="/php/galeon/views/galeon.php" id="size-desktop">Galeon</a></li>
        </ul>
        <img src="/img/1663952285593 (3).png">
    </div>
    <br>
    <h1 id="title-evento">Eventos de comedia:</h1>
    <?php
            $stmt = "localhost";
            $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole");   
            $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
            $sql="SELECT nombre_evento, descripcion_evento, fecha_evento, fk_id_tipo_evento FROM dbo.eventos WHERE fk_id_tipo_evento = 2 ORDER BY fecha_evento ASC";
            $res=sqlsrv_query($con,$sql);
            while($row=sqlsrv_fetch_array($res)){
                $nombreC = $row['nombre_evento'];
                $descripcionC = $row['descripcion_evento'];
                $fechaC = $row['fecha_evento'];
                $auxDateC = date_format($fechaC, 'Y-m-d');
                echo <<<TEXTO
                <div id="boxEvento">
                    <h2>$nombreC</h2>
                    <p>$descripcionC</p>
                    <p>Dia del evento: $auxDateC</p>
                </div>
                TEXTO;
            }
    ?>
    <h1 id="title-evento1">Eventos de musica:</h1>
    <?php
            $stmt = "localhost";
            $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole");   
            $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
            $sql="SELECT nombre_evento, descripcion_evento, fecha_evento, fk_id_tipo_evento FROM dbo.eventos WHERE fk_id_tipo_evento = 1 ORDER BY fecha_evento ASC";
            $res=sqlsrv_query($con,$sql);
            while($row=sqlsrv_fetch_array($res)){
                $nombre = $row['nombre_evento'];
                $descripcion = $row['descripcion_evento'];
                $fecha = $row['fecha_evento'];
                $auxDate = date_format($fecha, 'Y-m-d');
                echo <<<TEXTO
                <div id="boxEvento">
                    <h2>$nombre</h2>
                    <p>$descripcion</p>
                    <p>Dia del evento: $auxDate</p>
                </div>
                TEXTO;
            }
    ?>
</body>
</html>