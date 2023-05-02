<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos | Galeon</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeon/productosGaleon.css">
    <link rel="stylesheet" href="/style/galeon/eventosGaleon.css">
</head>
<body>
    <div>
        <ul id="menu">
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/index-galeon.php">Inicio</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/html/galeras/index.html" id="title">Galeras</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/productosGaleon.php">Productos</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/eventosGaleon.php">Eventos</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/comparativaGaleon.php">Comparativa</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/almacenGaleon.php">Almacen</a></li>    
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/cuentas.php">Cuentas</a></li>   
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/historial.php">Historial</a></li>      
        </ul>
    </div>
    <div id="shadowForm">
        <h1></h1>
    </div>
    <div id="boxForm">
        <br>
        <h1>Agregar eventos</h1>
        <form action="/php/galeon/controllers/verificacionEventos.php" method="post">
            <input type="text" name="titleEvento" id="" placeholder="Titulo">
            <textarea name="descripcionEvento" id="" cols="23" rows="6" placeholder="Descripcion"></textarea>
            <br>
            <input id="dateBox" type="date" name="dateCombo" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
            <select name="cTipoEvento">
                <?php
                    $stmt = "209.126.107.8";
                    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
                    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql="SELECT nombre_tipo_evento FROM dbo.tipo_evento";
                    $res=sqlsrv_query($con,$sql);
                    while($row=sqlsrv_fetch_array($res)){
                        $categoria = $row['nombre_tipo_evento'];
                        echo <<<TEXTO
                            <option>$categoria</option>
                        TEXTO;
                    }
                ?>
            </select>
            <br><button>Enviar</button>
        </form>
    </div>
</body>
</html>