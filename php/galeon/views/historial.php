<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen | Galeon</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeon/index-galeon.css">
    <link rel="stylesheet" href="/style/galeon/facturas.css">
    <link rel="stylesheet" href="/style/galeon/productosGaleon.css">
</head>
<body>
    <script src="/Javascript/galeon.js"></script>
    <script src="/Javascript/index-galeon.js"></script>
    <div id="boxAlmacen">
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
    <div id="comboTickets">
        <h1>Facturas</h1>
    <?php
        if(isset($_POST['mostrar'])){
            $id = $_POST['idT'];
            echo <<<TEXTO
            <form action="" method="post">
            <h3>Seleccione el ticket:<select name="idT" id="comboTickets" disabled>    
            TEXTO;           
                $stmt = "209.126.107.8";
                $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT id_tickets FROM dbo.tickets WHERE facturado <> 1";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    $idTicket = $row['id_tickets'];
                    if($id == $idTicket){
                        echo <<<TEXTO
                            <option value="$idTicket" selected>$idTicket</option>
                        TEXTO;
                    }else{
                        echo <<<TEXTO
                            <option value="$idTicket">$idTicket</option>
                        TEXTO;
                    }
                }
            echo <<<TEXTO
                </select></form><button><a href=""></a>Remover</button></h3>
                <div>
                <table>
                    <tr id="titleTable">
                        <td>Total de pedido</td>
                        <td>Fecha del ticket</td>
                        <td>Nombre del mesero</td>
                        <td>Registrado</td>
                        <td>Mesa</td>
                    </tr>
            TEXTO;
            $stmt = "209.126.107.8";
            $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
            $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
            $sql="SELECT total, CONVERT(Date, fecha_pago_final) fecha, nombre_empleado, usuario_sesion, apellido_paterno, apellido_materno, fk_id_mesas FROM dbo.tickets INNER JOIN dbo.cuentas ON id_cuenta = fk_id_cuentas_t INNER JOIN dbo.empleados ON id_empleado = fk_id_empleados WHERE id_tickets = '$id'";
            $res=sqlsrv_query($con,$sql);
            while($row=sqlsrv_fetch_array($res)){
                $total = $row['total'];
                $fecha = $row['fecha'];
                $fecha = $fecha->format('Y-m-d  ');
                $nEmpleado = $row['nombre_empleado'];
                $APEmpleado = $row['apellido_paterno'];
                $AMEmpleado = $row['apellido_materno'];
                $nUsuario = $row['usuario_sesion'];
                $mesas = $row['fk_id_mesas'];
                echo <<<TEXTO
                <tr>
                    <td>$total</td>
                    <td>$fecha</td>
                    <td>$nEmpleado $APEmpleado $AMEmpleado</td>
                    <td>$nUsuario</td>
                    <td>$mesas</td>
                </tr>
                TEXTO;
            }
            echo <<<TEXTO
                <table>
                <tr id="titleTable">
                    <td>Productos pedidos</td>
                    <td>Cantidad comprada</td>
                    <td>Total</td>
                </tr>
            TEXTO;         
            $stmt = "209.126.107.8";
            $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
            $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
            $sql="SELECT nombre_producto, cantidad, total_pedido FROM dbo.tickets_pedidos INNER JOIN dbo.productos ON id_productos = fk_id_producto_p WHERE fk_id_tickets_p = $id";
            $res=sqlsrv_query($con,$sql);
            while($row=sqlsrv_fetch_array($res)){
                $nProducto = $row['nombre_producto'];
                $cantidad = $row['cantidad'];
                $total = $row['total_pedido'];
                echo <<<TEXTO
                    <tr>
                        <td>$nProducto</td>
                        <td>$cantidad</td>
                        <td>$total</td>
                    </tr>
                TEXTO;
            }
            echo <<<TEXTO
                    </table>
                </table>
            </div><br>
            <div id="">
            <br>
            <h3>Informacion de la factura:</h3>    
            <form action="" method="">
                <input type="text" placeholder="Nombre" value="" autocomplete="off" required><input type="text" placeholder="Apellido paterno" value="" autocomplete="off" required><input type="text" placeholder="Apellido materno" value="" autocomplete="off" required>
                <input type="text" placeholder="RFC" id="infoFactura" value="" autocomplete="off" required><input id="infoFactura" type="email" placeholder="Correo electronico" value="" autocomplete="off" required><button>Enviar</button>
            </form>
            </div><br><br>
            TEXTO;
        }else{
            echo <<<TEXTO
                <form action="" method="post">
                <h3>Seleccione el ticket:<select name="idT" id="comboTickets">      
                TEXTO;         
                $stmt = "209.126.107.8";
                $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT id_tickets FROM dbo.tickets WHERE facturado <> 1";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    $idTicket = $row['id_tickets'];
                    echo <<<TEXTO
                    <option>$idTicket</option>
                    TEXTO;
                }
                echo <<<TEXTO
                </select><button type="submit" name="mostrar">Mostrar</button></h3>
                </form>
            TEXTO;
        }
    ?>
    </div>
</body>
</html>