<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen | Galeon</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeon/index-galeon.css">
    <link rel="stylesheet" href="/style/galeon/almacenGaleon.css">
    <link rel="stylesheet" href="/style/galeon/productosGaleon.css">
</head>
<body>
    <script src="/Javascript/galeon.js"></script>
    <script src="/Javascript/index-galeon.js"></script>
    <div id="boxAlmacen" style="">
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
        <br>
        <h1>Almacen <button><a href="/php/galeon/views/registroAlmacen.php">Agregar</a></h1>
        <form action="" method="post" id="busquedaI">
            <input type="text" placeholder="Buscar ingrediente..." autocomplete="off" name="buscarIngre" id="">
            <button type="submit" name="enviar">Buscar</button>
        </form>
        <table>
            <tr id="titleTable">
                <td>ID Almacen</td>
                <td>Cantidad de piezas</td>
                <td>Contenido de piezas</td>
                <td>Usuario</td>
                <td>Nombre</td>
                <td>Acciones</td>
            </tr>
            <?php
                if(isset($_POST['enviar'])){
                    $ingredientes = $_POST['buscarIngre'];
                    $stmt = "localhost";
                    $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
                    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql="SELECT id_almacen, cantidad_piezas_almacen, contenido_piezas_total_almacen, nombre_tipo_pieza, usuario_sesion, nombre_almacen FROM dbo.almacen INNER JOIN dbo.almacen_tipo ON fk_id_tipo_piezas_almacen = id_tipo_piezas INNER JOIN dbo.cuentas ON id_cuenta = fk_id_cuentas_e_almacen WHERE nombre_almacen LIKE '%$ingredientes%'";
                    $res=sqlsrv_query($con,$sql);
                    while($row=sqlsrv_fetch_array($res)){
                        $id = $row['id_almacen'];
                        $cantidad = $row['cantidad_piezas_almacen'];
                        $contenido = $row['contenido_piezas_total_almacen'];
                        $tipo = $row['nombre_tipo_pieza'];
                        $usuario = $row['usuario_sesion'];
                        $nombre = $row['nombre_almacen'];
                        echo <<<TEXTO
                            <tr>
                            <td>$id</td>
                            <td>$cantidad</td>
                            <td>$contenido&nbsp;$tipo</td>
                            <td>$usuario</td>
                            <td>$nombre</td>
                            <td>
                            <form action="/php/galeon/controllers/agarrarAlmacen.php" method="post">
                                <input type="text" value="$id" name="idA" style="display: none;">
                                <button type="submit" name="">Agarrar</button>
                            </form>
                            <form action="/php/galeon/views/modificarAlmacen.php" method="post">
                                <input type="text" value="$id" name="idA" style="display: none;">
                                <button type="submit">Modificar</button>
                            </form>
                            <form action="/php/galeon/views/cantidadAlmacen.php" method="post">
                                <input type="text" value="$id" name="idA" style="display: none;">
                                <button type="submit" name="">Cantidad</button>
                            </form>
                            </td>
                            </tr>
                        TEXTO;
                    }
                }else{
                    $stmt = "localhost";
                    $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
                    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql="SELECT id_almacen, cantidad_piezas_almacen, contenido_piezas_total_almacen, nombre_tipo_pieza, usuario_sesion, nombre_almacen FROM dbo.almacen INNER JOIN dbo.almacen_tipo ON fk_id_tipo_piezas_almacen = id_tipo_piezas INNER JOIN dbo.cuentas ON id_cuenta = fk_id_cuentas_e_almacen";
                    $res=sqlsrv_query($con,$sql);
                    while($row=sqlsrv_fetch_array($res)){
                        $id = $row['id_almacen'];
                        $cantidad = $row['cantidad_piezas_almacen'];
                        $contenido = $row['contenido_piezas_total_almacen'];
                        $tipo = $row['nombre_tipo_pieza'];
                        $usuario = $row['usuario_sesion'];
                        $nombre = $row['nombre_almacen'];
                        echo <<<TEXTO
                            <tr>
                            <td>$id</td>
                            <td>$cantidad</td>
                            <td>$contenido&nbsp;$tipo</td>
                            <td>$usuario</td>
                            <td>$nombre</td>
                            <td>
                            <form action="/php/galeon/controllers/agarrarAlmacen.php" method="post">
                                <input type="text" value="$id" name="idA" style="display: none;">
                                <button type="submit" name="">Agarrar</button>
                            </form>
                            <form action="/php/galeon/views/modificarAlmacen.php" method="post">
                                <input type="text" value="$id" name="idA" style="display: none;">
                                <button type="submit">Modificar</button>
                            </form>
                            <form action="/php/galeon/views/cantidadAlmacen.php" method="post">
                                <input type="text" value="$id" name="idA" style="display: none;">
                                <button type="submit" name="">Cantidad</button>
                            </form>
                            </td>
                            </tr>
                        TEXTO;
                        }
                    }
                ?>
        </table>
        <br>
        <h1>Ingredientes con mayor cantidad</h1>
        <table>
            <tr id="titleTable">
                <td>Nombre</td>
                <td>Cantidad de piezas</td>
                <td>Contenido de piezas</td>
            </tr>
            <?php
                $stmt = "localhost";
                $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT nombre_almacen, cantidad_piezas_almacen, contenido_piezas_total_almacen, nombre_tipo_pieza FROM dbo.almacen INNER JOIN dbo.almacen_tipo ON fk_id_tipo_piezas_almacen = id_tipo_piezas ORDER BY cantidad_piezas_almacen DESC";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    $nombre = $row['nombre_almacen'];
                    $cantidad = $row['cantidad_piezas_almacen'];
                    $contenido = $row['contenido_piezas_total_almacen'];
                    $tipo = $row['nombre_tipo_pieza'];
                    echo <<<TEXTO
                        <tr>
                            <td>$nombre</td>
                            <td>$cantidad</td>
                            <td>$contenido&nbsp;$tipo</td>
                        </tr>
                    TEXTO;
                }
            ?>
        </table><br>
        <h1>Ingredientes con menor cantidad</h1>
        <table>
            <tr id="titleTable">
                <td>Nombre</td>
                <td>Cantidad de piezas</td>
                <td>Contenido de piezas</td>
            </tr>
            <?php
                $stmt = "localhost";
                $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT nombre_almacen, cantidad_piezas_almacen, contenido_piezas_total_almacen, nombre_tipo_pieza FROM dbo.almacen INNER JOIN dbo.almacen_tipo ON fk_id_tipo_piezas_almacen = id_tipo_piezas ORDER BY cantidad_piezas_almacen ASC";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    $nombre = $row['nombre_almacen'];
                    $cantidad = $row['cantidad_piezas_almacen'];
                    $contenido = $row['contenido_piezas_total_almacen'];
                    $tipo = $row['nombre_tipo_pieza'];
                    echo <<<TEXTO
                        <tr>
                            <td>$nombre</td>
                            <td>$cantidad</td>
                            <td>$contenido&nbsp;$tipo</td>
                        </tr>
                    TEXTO;
                }
            ?>
        </table><br>
    </div>

</body>
</html>