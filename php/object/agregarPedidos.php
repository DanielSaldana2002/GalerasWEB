<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        function VvalidacionRFC(){
            let rfc = document.getElementById('validacionRFC').value;
            if(rfc.length <= 12){  
                document.getElementById('validacionRFC').disable = false; 
            }else{
                document.getElementById('validacionRFC').disable = true;
            }
        }
    </script>
    <div>
        <h1>AGREGAR TICKET:</h1>
        <form action="/php/object/verificacionTicket.php" method="post">
            <?php
                $stmt = "DESKTOP-DANIEL";
                $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT COUNT(id_tickets) id FROM dbo.tickets;";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    $aux = $row['id']+1;
                    echo <<< TEXTO
                        <input type="number" name="idTicket" value="$aux" readonly>
                    TEXTO;
                }
            ?>
            <select name="cEmpleado">
                <?php
                    $stmt = "DESKTOP-DANIEL";
                    $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
                    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql="SELECT nombre_empleado FROM dbo.empleados;";
                    $res=sqlsrv_query($con,$sql);
                    while($row=sqlsrv_fetch_array($res)){
                        echo <<< TEXTO
                            <option>$row[nombre_empleado]</option>
                        TEXTO;
                    }
                ?>
            </select>
            <select name="cCuenta">
                <?php
                    $stmt = "DESKTOP-DANIEL";
                    $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
                    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql="SELECT usuario_sesion FROM dbo.cuentas;";
                    $res=sqlsrv_query($con,$sql);
                    while($row=sqlsrv_fetch_array($res)){
                        echo <<< TEXTO
                            <option>$row[usuario_sesion]</option>
                        TEXTO;
                    }
                ?>
            </select>
            <select name="idMesas" id="">
            <?php
                $stmt = "DESKTOP-DANIEL";
                $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT id_mesas FROM dbo.mesas;";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    echo "<option>$row[id_mesas]</option>";
                }
            ?>
            </select>
            <input type="number" name="cantidadPagar">
            <button type="submit">Agregar</button>
        </form>
    </div>
    <div>
            </br>
            <h1>AGREGAR TICKET-PEDIDO:</h1>
    <form action="/php/object/verificacionPedidos.php" method="post">
        <select name="fkId" id="">
            <?php
                $stmt = "DESKTOP-DANIEL";
                $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT id_tickets FROM dbo.tickets;";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    echo "<option>$row[id_tickets]</option>";
                }
            ?>
        </select>
        <select name="NombreProductos" id="fk_productos_Name" onclick="mostrarPrecio()">
            <?php
                $stmt = "DESKTOP-DANIEL";
                $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT nombre_producto FROM dbo.productos;";
                $res=sqlsrv_query($con,$sql);
                session_start();
                while($row=sqlsrv_fetch_array($res)){
                    $_SESSION[$row['nombre_producto']] = $row['nombre_producto'];
                    echo <<<TEXTO
                        <option>$row[nombre_producto]</option>
                    TEXTO;
                }
            ?>
        </select>
        <select name="fkMesas" id="">
            <?php
                $stmt = "DESKTOP-DANIEL";
                $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT id_mesas FROM dbo.mesas;";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    echo "<option>$row[id_mesas]</option>";
                }
            ?>
        </select>
        <select name="fkPrecio" id="">
            <?php
                $stmt = "DESKTOP-DANIEL";
                $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT precio FROM dbo.productos;";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    echo "<option>$row[precio]</option>";
                }
            ?>
        </select>
        <input type="number" name="cantidad">
        <button type="submit">Agregar</button>
    </form>
    </div>
    <div>
        </br>
        <h1>AGREGAR FACTURAS:</h1>
        <form action="/php/object/verificacionFactura.php" method="post">
            <select name="idTicketF">
                <?php
                    $stmt = "DESKTOP-DANIEL";
                    $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
                    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                    $sql="SELECT id_tickets FROM dbo.tickets;";
                    $res=sqlsrv_query($con,$sql);
                    while($row=sqlsrv_fetch_array($res)){
                        echo "<option>$row[id_tickets]</option>";
                    }
                ?>
            </select>
            <input type="text" name="nombreF">
            <input type="text" name="apellidoPF">
            <input type="text" name="apellidoMF">
            <input type="text" name="rfc" id="validacionRFC" onkeypress="VvalidacionRFC()">
            <input type="email" name="correo">
            <button type="submit">Agregar</button>
        </form>
    </div>
</body>
</html>