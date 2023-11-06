<?php
    session_start();
    $idTicket = $_POST['idTicket'];
    $cEmpleado = $_POST['cEmpleado'];
    $cCuenta = $_POST['cCuenta'];
    $idMesas = $_POST['idMesas'];
    $cantidadPagar = $_POST['cantidadPagar'];

    $stmt = "localhost";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole");
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT id_empleado FROM dbo.empleados where nombre_empleado = '$cEmpleado';";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $id_empleados = $row['id_empleado'];
    }
    $stmt = "localhost";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole");
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT id_cuenta FROM dbo.cuentas where usuario_sesion = '$cCuenta';";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $id_cuentas = $row['id_cuenta'];
    }
    $stmt = "localhost";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="INSERT INTO dbo.tickets(id_tickets, fk_id_empleados, fk_id_mesas, total, fecha_pago_final, pagado, fk_id_cuentas_t) VALUES ($idTicket, $id_empleados, $idMesas, $cantidadPagar, GETDATE(), 0, $id_cuentas);";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
    }
    header("Location: agregarPedidos.php");
?>