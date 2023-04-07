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
            <li><a href="/php/galeon.php" id="size-desktop">Galeon</a></li>
        </ul>
        <img src="/img/1663952285593 (3).png">
    </div>
    <div id='box-producto-mas-vendidos'>
        <img src="https://cdn-icons-png.flaticon.com/512/76/76263.png">
        <h1>Platillo mas vendido</h1>
        <?php
            $stmt = "DESKTOP-DANIEL";
            $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
            $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
            $sql="Select TOP 1 nombre_producto, nombre_categoria, SUM(cantidad) total from tickets_pedidos INNER JOIN dbo.productos ON id_productos = fk_id_producto_p INNER JOIN dbo.categoria_productos ON id_categoria = fk_id_categoria  WHERE nombre_categoria != 'Cervezas' group by nombre_producto, nombre_categoria order by total desc";
            $res=sqlsrv_query($con,$sql);
            while($row=sqlsrv_fetch_array($res)){
                $producto = $row['nombre_producto'];  
                $categoria = $row['nombre_categoria'];  
            }
            echo "<h3>$categoria de $producto</h3>";
        ?>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe ducimus deserunt ab qui dolores quae laborum voluptate veritatis voluptatum? Fuga, corporis iusto hic atque aut obcaecati consequatur suscipit veniam neque.</p>

    </div>
    <div id='box-image-left'>
            <img src="https://cdn-icons-png.flaticon.com/512/31/31930.png">
    </div>
    <div id='box-bebidas-mas-vendidos'>
        <h1>Bebida mas vendida</h1>
        <?php
            $stmt = "DESKTOP-DANIEL";
            $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
            $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
            $sql="Select TOP 1 nombre_producto, nombre_categoria, SUM(cantidad) total from tickets_pedidos INNER JOIN dbo.productos ON id_productos = fk_id_producto_p INNER JOIN dbo.categoria_productos ON id_categoria = fk_id_categoria WHERE nombre_categoria = 'Cervezas' group by nombre_producto, nombre_categoria order by total desc ";
            $res=sqlsrv_query($con,$sql);
            while($row=sqlsrv_fetch_array($res)){
                $producto = $row['nombre_producto'];  
                $categoria = $row['nombre_categoria'];  
            }
            echo "<h3>$categoria $producto</h3>";
        ?>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe ducimus deserunt ab qui dolores quae laborum voluptate veritatis voluptatum? Fuga, corporis iusto hic atque aut obcaecati consequatur suscipit veniam neque.</p>
    </div>
</body>
</html>