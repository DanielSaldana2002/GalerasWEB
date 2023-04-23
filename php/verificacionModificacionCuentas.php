<?php
    session_start();
    $id = $_SESSION['idSesion'];
    $nombre = $_POST['NombreUser'];
    $apellidoP = $_POST['apellidoPaternoUser'];
    $apellidoM = $_POST['apellidoMaternoUser'];
    $password = $_POST['passwordUser'];
    $tipoNombre = $_POST['cTipoCuenta'];
    if($tipoNombre == 'Administrador'){
        $tipo = 1;
    }else if($tipoNombre == 'Estandar'){
        $tipo = 2;
    }
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="UPDATE dbo.cuentas SET nombre_sesion = '$nombre',apellido_p_sesion = '$apellidoP',apellido_m_sesion = '$apellidoM',contrasena_sesion = '$password',fk_id_tipo_cuentas = '$tipo' WHERE id_cuenta = '$id'";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
    }
    header('Location: cuentas.php');
?>
