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
    <script src="/Javascript/keyEventCuentas.js"></script>
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
    </div>
    <?php
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="SELECT count(id_productos) totalP FROM dbo.productos";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $idCuentaInicial = $row['totalP'];
        }
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="SELECT count(id_categoria) totalC FROM dbo.categoria_productos";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $idCuentaAdministrador = $row['totalC'];
        }
        echo <<<TEXTO
            <h1></h1>
            <form action="/php/galeon/views/registroCategorias.php" method="post">
                <button type="submit" id="createC">Registrar</button>
            </form>
            <div id="buttom-cuenta">
                <h2>Registrar categorias | productos</h2>
                <h3 id="cuentaAdmi">No. Categorias: $idCuentaAdministrador</h3>
                <h3 id="cuentaTotal">No. Productos: $idCuentaInicial</h3>
            </div>
        TEXTO;
    ?>
        <div id="tableProducto" style="height: 230px; overflow-y: scroll;">
        <table>
            <tr id="titleTableC">
                <td>Productos</td>
            </tr>
            <?php
                $stmt = "209.126.107.8";
                $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT nombre_producto FROM dbo.productos";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    $nCategoria = $row['nombre_producto'];
                    echo <<<TEXTO
                        <tr>
                            <td>$nCategoria</td>
                        </tr>
                    TEXTO;
                }
            ?>
        </table>
    </div>
    <div id="tableCategoria" style="height: 230px; overflow-y: scroll;">
        <table>
            <tr id="titleTableC">
                <td>Categoria</td>
            </tr>
            <?php
                $stmt = "209.126.107.8";
                $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT nombre_categoria FROM dbo.categoria_productos";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    $nCategoria = $row['nombre_categoria'];
                    echo <<<TEXTO
                        <tr>
                            <td>$nCategoria</td>
                        </tr>
                    TEXTO;
                }
            ?>
        </table>
    </div>
    <div id="tableContadorP" style="height: 260px; overflow-y: scroll;">
        <table>
            <tr id="titleTable">
                <td>Nombre de la categoria</td>
                <td>Total de productos</td>
            </tr>
            <?php
                $stmt = "209.126.107.8";
                $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT nombre_categoria, count(*) total FROM dbo.categoria_productos INNER JOIN dbo.productos ON id_categoria = fk_id_categoria GROUP BY nombre_categoria";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    $nCategoria = $row['nombre_categoria'];
                    $totalP = $row['total'];
                    echo <<<TEXTO
                        <tr>
                            <td>$nCategoria</td>
                            <td>$totalP</td>
                        </tr>
                    TEXTO;
                }
            ?>
        </table>
    </div>
    <table>
        <tr id="title-table">
            <td>Nombre categoria</td>
            <td>Nombre producto</td>
            <td>Precio</td>
        </tr>
        
    <?php
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="SELECT nombre_categoria, nombre_producto, precio FROM dbo.categoria_productos INNER JOIN dbo.productos ON id_categoria = fk_id_categoria";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $id = $row['nombre_categoria'];
            $nombre = $row['nombre_producto'];
            $apellidoP = $row['precio'];
            echo <<<TEXTO
                <tr>
                    <td>$id</td>
                    <td>$nombre</td>
                    <td>$apellidoP</td>
                </tr>
            TEXTO;
        }
    ?>
    </table>
    </br><br><br>
</body>
</html>