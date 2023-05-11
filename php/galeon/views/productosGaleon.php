<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Galeon</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeon/productosGaleon.css">
    <link rel="stylesheet" href="/style/galeon/productosGaleonOrigin.css">
    <script src="/Javascript/galeon.js"></script>
    <script src="/Javascript/index-galeon.js"></script>
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
        <li onmouseenter="animationMargin()" onmouseout="animationMarginOff()"><a href="/php/galeon/views/historial.php">Facturas</a></li>       
    </ul>
    <div id="box">
        <div id="boxCategorias">
            <h1>Categorias</h1>
            <form action="" method="post">
                <h3>Nombre de la categoria:<input type="text" name="" id="" ><button>Registrar</button></h3>
            </form>
            <div id="boxTableCategorias">
            <table>
                <tr>
                    <td>Clave</td>
                    <td>Categoria</td>
                </tr>
                <?php
                    $stmt = "209.126.107.8";
                    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
                    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql="SELECT id_categoria, nombre_categoria FROM dbo.categoria_productos";
                    $res=sqlsrv_query($con,$sql);
                    while($row=sqlsrv_fetch_array($res)){
                        $id = $row['id_categoria'];
                        $nombre = $row['nombre_categoria'];
                        echo <<<TEXTO
                            <tr>
                                <td>$id</td>
                                <td>$nombre</td>
                            </tr>
                        TEXTO;
                    }
                ?>
            </table>
        </div>
        
            <form action="" method="post"><br>
            <h1>Productos</h1><h3>Nombre del producto:<input type="text" name="" id="" ><button>Registrar</button></h3>
            </form>
            <div id="boxTableCategorias">
                <table>
                <tr>
                    <td>Clave</td>
                    <td>Categoria</td>
                </tr>
                <?php
                    $stmt = "209.126.107.8";
                    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
                    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql="SELECT nombre_categoria, nombre_producto, precio FROM dbo.categoria_productos INNER JOIN dbo.productos ON id_categoria = fk_id_categoria";
                    $res=sqlsrv_query($con,$sql);
                    while($row=sqlsrv_fetch_array($res)){
                        $nombreCategoria = $row['nombre_categoria'];
                        $nombreP = $row['nombre_producto'];
                        $nombreP = $row['precio'];
                        echo <<<TEXTO
                            <tr>
                                <td>$id</td>
                                <td>$nombre</td>
                                <td>$nombre</td>
                            </tr>
                        TEXTO;
                    }
                ?>
            </table>
        </div>
        </div>
    </div>
</div>
</body>
</html>