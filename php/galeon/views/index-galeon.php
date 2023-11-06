<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Galeon</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeon/index-galeon.css">
    <link rel="stylesheet" href="/style/galeon/productosGaleon.css">
</head>
<body>
    <script src="/Javascript/galeon.js"></script>
    <script src="/Javascript/index-galeon.js"></script>
    <div>
        <ul id="menu">
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/index-galeon.php">Inicio</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/html/galeras/index.html" id="title">Galeras</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/eventosGaleon.php">Eventos</a></li> 
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/cuentas.php">Cuentas</a></li>   
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Ventas</a>
                <div class="dropdown-content">
                    <a href="/php/galeon/views/productosGaleon.php">Cortes</a>
                    <a href="/php/galeon/views/almacenGaleon.php">Historial</a>
                    <a href="/php/galeon/views/facturaGaleon.php">Factura</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Productos</a>
                <div class="dropdown-content">
                    <a href="/php/galeon/views/productosGaleon.php">Producto</a>
                    <a href="/php/galeon/views/almacenGaleon.php">Almacen</a>
                </div>
                </li>
            </li>      
        </ul>
        <div id="box-title-galeon"></div>
        <div id="box-transparente-title"><p></p></div> 
        <div id="box-title">
            <h1 id="title-galeon">Bienvenido a Galeon</h1>
            <p id="description-galeon">Gracias por acceder a Galeon, el sistema administrativo mas completo que se ha hecho en la historia de Galeras. Te explico brevemente que puedes realizar:</p>
            <ul id="list-function-galeon">
                <li>Visualice los productos creados en tiempo real.</li>
                <li>Crea eventos de cualquier tipo para que lo pueda visualizar tu publico.</li>
                <li>Comparar los productos consumidos sea en tabla o en una grafica.</li>
                <li>Tenga un mejor control en sus ingredientes con el almacen.</li>
                <li>Genere cuentas para sus empleados sean administrativas o estandar.</li>
                <li>Tome el control de sus movimienos en historial.</li>
                <li>Genera facturas las veces que lo necesites.</li>
            </ul>
        </div> 
        <div id="box-notificacion">
            <h1 id="title-notificacion">Notificaciones</h1>
        </div>
        <?php
        session_start();    
            echo <<<TEXTO
                <h1 id="message-initial-title">Hola, $_SESSION[nombreApellidoUsuario]!</h1>
            TEXTO;
        ?>
    </div>
</body>
</html>