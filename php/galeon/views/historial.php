<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas | Galeon</title>
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
            session_start();
            $id = $_POST['idT'];
            $_SESSION['idTickets'] = $id;
            echo <<<TEXTO
            <form action="" method="post">
            <h3>Seleccione el ticket:<select name="idT" id="comboTickets" disabled>    
            TEXTO;           
                $stmt = "localhost";
                $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT id_tickets FROM dbo.tickets WHERE facturado <> 1";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    if($id == $idTicket){
                        echo <<<TEXTO
                            <option value="$id" selected>$$id</option>
                        TEXTO;
                    }else{
                        echo <<<TEXTO
                            <option value="$id">$id</option>
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
            $stmt = "localhost";
            $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
            $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
            $sql="SELECT total, CONVERT(Date, fecha_pago_final) fecha, nombre_empleado, usuario_sesion, apellido_paterno, apellido_materno, fk_id_mesas FROM dbo.tickets INNER JOIN dbo.cuentas ON id_cuenta = fk_id_cuentas_t INNER JOIN dbo.empleados ON id_empleado = fk_id_empleados WHERE id_tickets = '$id'";
            $res=sqlsrv_query($con,$sql);
            while($row=sqlsrv_fetch_array($res)){
                $total = $row['total'];
                $fecha = $row['fecha'];
                $fecha = $fecha->format('Y-m-d  ');
                $nEmpleado = $row['nombre_empleado'];
                $APEmpleado = utf8_encode($row['apellido_paterno']);
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
                </br>
                <tr id="titleTable">
                    <td>Categoria</td>
                    <td>Productos pedidos</td>
                    <td>Cantidad comprada</td>
                    <td>Total</td>
                </tr>
            TEXTO;         
            $stmt = "localhost";
            $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
            $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
            $sql="SELECT nombre_categoria, nombre_producto, cantidad, total_pedido FROM dbo.tickets_pedidos INNER JOIN dbo.productos ON id_productos = fk_id_producto_p INNER JOIN dbo.categoria_productos On id_categoria = fk_id_categoria WHERE fk_id_tickets_p = $id";
            $res=sqlsrv_query($con,$sql);
            while($row=sqlsrv_fetch_array($res)){

                $categoriaProd = $row['nombre_categoria'];
                $nProducto = $row['nombre_producto'];
                $cantidad = $row['cantidad'];
                $total = $row['total_pedido'];
                echo <<<TEXTO
                    <tr>
                        <td>$categoriaProd</td> 
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
            <form action="/php/galeon/controllers/verificacionFacturas.php" method="post">
                <input type="text" placeholder="Nombre" value="" autocomplete="off" name="nombre" required><input type="text" placeholder="Apellido paterno" value="" autocomplete="off" name="apellidoP" required><input type="text" placeholder="Apellido materno" value="" autocomplete="off" name="apellidoM" required>
                <input type="text" placeholder="RFC" id="infoFactura" value="" autocomplete="off" maxlength="11" name="rfc" required><input id="infoFactura" type="email" placeholder="Correo electronico" value="" autocomplete="off" name="correoE" required><button>Enviar</button>
            </form>
            </div><br><br>
            TEXTO;
        }
        if (isset($_POST['filtros'])) {
            echo <<<TEXTO
            <form action="" method="post">
            <h3>Seleccione el ticket:<select name="idT" id="comboTickets">      
            TEXTO;         
            $stmt = "localhost";
            $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
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
            </select><button type="submit" name="mostrar">Mostrar</button>  </h3>
            </form>
            TEXTO;
        ?>
            <br>
            <form action="" method="post">
                <h3>Facturados
                    <label for="fecha">Fecha inicial:</label><input type="date" name="fechainicial" value="<?php echo $_POST['fechainicial'];?>" max="<?php echo date('Y-m-d');?>"><label for="fecha"> Fecha final:</label><input type="date" name="fechafinal" value="<?php echo $_POST['fechafinal'];?>" max="<?php echo date('Y-m-d');?>">
                    <button type="submit" name="filtros">Filtrar</button>
                </h3>
            </form>
            <table>
                <tr id="titleTable">
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>RFC</td>
                    <td>Correos</td>
                    <td>Fecha expedicion</td>
                </tr>
                <?php
                    $stmt = "localhost";
                    $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
                    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql="Exec dbo.Pr_Facturas '".$_POST['fechainicial']."', '".$_POST['fechafinal']."'";
                    $res=sqlsrv_query($con,$sql);
                    while($row=sqlsrv_fetch_array($res)){
                        $nombre    = $row['nombre_factura'];
                        $apellidoP = $row['apellido_p_factura'];
                        $apellidoN = $row['apellido_m_factura'];
                        $rfc       = $row['rfc'];
                        $correo    = $row['correo_electronico'];
                        $fecha     = $row['fecha_expedicion'];
                        $fecha     = $fecha->format('Y-m-d  ');
                        echo <<<TEXTO
                        <tr>
                            <td>$nombre</td>
                            <td>$apellidoP $apellidoN</td>
                            <td>$rfc</td>
                            <td>$correo</td>
                            <td>$fecha</td>
                        </tr>
                        
                        TEXTO;

                    }
            ?>
            </table> 
            <br>
            <br>
            <?php
        }
        if (empty(isset($_POST['filtros']) And empty(isset($_POST['mostrar'])))){   
            if(empty(isset($_POST['mostrar']))){
                echo <<<TEXTO
                <form action="" method="post">
                <h3>Seleccione el ticket:<select name="idT" id="comboTickets">      
                TEXTO;         
                $stmt = "localhost";
                $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
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
                </select><button type="submit" name="mostrar">Mostrar</button>  </h3>
                </form>
            TEXTO;
            ?>
                <br>
                <form action="" method="post">
                    <h3>Facturados
                        <label for="fecha">Fecha inicial:</label><input type="date" name="fechainicial" value="<?php echo date('Y-01-01') ?>" max="<?php echo date('Y-m-d');?>"><label for="fecha"> Fecha final:</label><input type="date" name="fechafinal" value="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>">
                        <button type="submit" name="filtros">Filtrar</button>
                    </h3>
                </form>
                <table>
                    <tr id="titleTable">
                        <td>Nombres</td>
                        <td>Apellidos</td>
                        <td>RFC</td>
                        <td>Correos</td>
                        <td>Fecha expedicion</td>
                    </tr>
                    <?php
                        $fechahoy = date('Y-m-d');
                        $stmt = "localhost";
                        $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
                        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                        $sql="Exec dbo.Pr_Facturas '".date('Y-01-01')."', '".$fechahoy."'";
                        $res=sqlsrv_query($con,$sql);
                        while($row=sqlsrv_fetch_array($res)){
                            $nombre    = $row['nombre_factura'];
                            $apellidoP = $row['apellido_p_factura'];
                            $apellidoN = $row['apellido_m_factura'];
                            $rfc       = $row['rfc'];
                            $correo    = $row['correo_electronico'];
                            $fecha     = $row['fecha_expedicion'];
                            $fecha     = $fecha->format('Y-m-d  ');
                            echo <<<TEXTO
                            <tr>
                                <td>$nombre</td>
                                <td>$apellidoP $apellidoN</td>
                                <td>$rfc</td>
                                <td>$correo</td>
                                <td>$fecha</td>
                            </tr>
                            TEXTO;
                        }
            }
         ?>
            </table> 
            <br>
            <br>
         <?php               
        }?>
                       
    </div>
</body>
</html>