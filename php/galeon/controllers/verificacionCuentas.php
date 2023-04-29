<?php
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT TOP 1 id_cuenta FROM dbo.cuentas ORDER BY id_cuenta DESC";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $id = $row['id_cuenta'];
    }
    $id = $id+1;
    session_start();
    $nombreUser = $_POST['NombreUser'];
    $apellidoPUser = $_POST['apellidoPaternoUser'];
    $apellidoMUser = $_POST['apellidoMaternoUser'];
    $usuarioUser = $_POST['UsuarioUser'];
    $passwordUser = $_POST['passwordUser'];
    $tipoUser = $_POST['cTipoCuenta'];
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT usuario_sesion FROM dbo.cuentas";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $auxUser = $row['usuario_sesion'];
        if($auxUser == $usuarioUser){
            header('Location: errorCreacionCuenta.php');
        }
    }
    if($tipoUser == 'Administrador'){
        $idTipoUser = 1;
    }else if($tipoUser == 'Estandar'){
        $idTipoUser = 2;
    }
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="INSERT INTO dbo.cuentas(id_cuenta, nombre_sesion, apellido_p_sesion, apellido_m_sesion, usuario_sesion, contrasena_sesion, fk_id_tipo_cuentas, activo_sesion) VALUES ($id,'$nombreUser','$apellidoPUser','$apellidoMUser','$usuarioUser','$passwordUser',$idTipoUser, '1')";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
    }
    header('Location: cuentas.php');
?>