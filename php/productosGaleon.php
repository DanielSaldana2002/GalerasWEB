<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Galeon</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/productosGaleon.css">
    <script src="/Javascript/galeon.js"></script>
    <script src="/Javascript/index-galeon.js"></script>
</head>
<body>
<div>
    <ul id="menu">
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/html/index.html" id="title">Galeras</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="">Productos</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/html/Productos.html">Eventos</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="">Comparativa</a></li>
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="">Almacen</a></li>    
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="">Cuentas</a></li>   
            <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="">Historial</a></li>   
    </ul>
    </div>
    <?php
        $stmt = "DESKTOP-DANIEL";
        $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="SELECT nombre_categoria, nombre_producto, precio FROM dbo.productos INNER JOIN dbo.categoria_productos on id_categoria = fk_id_categoria;";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $infoBD = <<<TEXTO
            <div id='box-categorias-productos'>
                <h3 id='title-categorias'>$row[nombre_categoria]</h3>
                <ul id='lista-productos-categorias'>
                    <li>Nombre del producto: $row[nombre_producto]</li>
                    <li>Precio del producto: $row[precio]</li>
                </ul>
            </div>
            TEXTO;
            echo $infoBD;
        }
    ?>
</body>
</html>