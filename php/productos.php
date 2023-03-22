<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Galeras</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="/style/productos.css">
    <script src="/Javascript/main.js"></script>
</head>
<body>
<div id="body-desktop">
        <ul id="menu">
            <li><a href="/html/index.html" id="size-desktop">Inicio</a></li>
            <li><a href="" id="size-desktop">Sucursal</a></li>
            <li><a href="" id="size-desktop">Productos</a></li>
            <li><a href="" id="size-desktop">Eventos</a></li>
            <li><a href="" id="size-desktop">Comentarios</a></li>
            <li><a href="/html/Galeon.html" id="size-desktop">Galeon</a></li>
        </ul>
        <img src="/img/1663952285593 (3).png">
    </div>
    <?php
        $aux = 0;
        $serverName = "DESKTOP-DANIEL"; //serverName\instanceName
        $connectionInfo = array( "Database"=>"galeras", "UID"=>"daniel2002", "PWD"=>"12345678");
        $conn = sqlsrv_connect( $serverName, $connectionInfo);
        if($conn){
            echo "<p id='message-connection'>Conexión establecida.</p>";
        }else{
            echo "<p id='message-connection'>Conexión no se pudo establecer.</p>";
            die(print_r( sqlsrv_errors(), true));
        }
        $stmt = "DESKTOP-DANIEL";
        $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="SELECT nombre_categoria, nombre_producto, precio FROM dbo.productos INNER JOIN dbo.categoria_productos on id_categoria = fk_id_categoria;";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            echo "<div id='box-categorias-productos'><h3 id='title-categorias'>",$row['nombre_categoria'],"</h3><ul id='lista-productos-categorias'><li>Nombre del producto: ",$row['nombre_producto'],"</li><li>Precio del producto: ",$row['precio'],"</li></ul></div>";
        }
    ?>
</body>
</html>