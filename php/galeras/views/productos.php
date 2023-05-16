<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Galeras</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeras/style.css">
    <link rel="stylesheet" href="/style/galeras/productos.css">
    <script src="/Javascript/main.js"></script>
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
    <div id='box-producto-mas-vendidos'>
        <img src="https://cdn-icons-png.flaticon.com/512/76/76263.png">
        <h1>Platillo mas vendido</h1>
        <?php
            $stmt = "209.126.107.8";
            $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120");  
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
            $stmt = "209.126.107.8";
            $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120");   
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
        <div id='box-Pescados-Zarandeados'>
            <div id="contentProducto">
            <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MENU</h1>
            <?php
                $stmt = "209.126.107.8";
                $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120");   
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT count(*) total FROM dbo.categoria_productos";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    $total = $row['total'];
                }
                $i=1;
                $stmt = "209.126.107.8";
                $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120");   
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT nombre_categoria FROM dbo.categoria_productos";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    $auxNombre = $row['nombre_categoria'];
                    echo <<<TEXTO
                        <h3>$auxNombre</h3>
                        <ul>
                    TEXTO; 
                    $stmt2 = "209.126.107.8";
                    $opc2=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120");   
                    $con2=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql2="SELECT nombre_producto,precio FROM dbo.categoria_productos INNER JOIN dbo.productos ON id_categoria = fk_id_categoria WHERE id_categoria = $i";
                    $res2=sqlsrv_query($con,$sql2);
                    while($row2=sqlsrv_fetch_array($res2)){
                        $auxProductos = $row2['nombre_producto'];
                        $auxPrecio = $row2['precio'];
                        echo <<<TEXTO
                            <li>$auxProductos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$$auxPrecio</li>
                        TEXTO;
                    }
                    echo "</ul>";
                    if($total > $i){
                        $i++;
                    }
                }
            ?>
                <img src="https://tipsparatuviaje.com/wp-content/uploads/2020/02/pescado-zarandeado.jpg"width="390" height="340"/>  
            </div>
        </div>
        </div>
</body>
</html>