<?php
    session_start();
    $_SESSION['usuario'] = $_POST['user'];
    $usuario = $_POST['user'];
    $password = $_POST['password'];
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT usuario_sesion, contrasena_sesion, nombre_tipo_cuentas, nombre_sesion, apellido_p_sesion FROM dbo.cuentas INNER JOIN dbo.tipo_cuentas ON fk_id_tipo_cuentas = id_tipo_cuentas WHERE usuario_sesion = '$usuario' and contrasena_sesion = '$password';";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $userBD = $row['usuario_sesion'];
        $passwordBD = $row['contrasena_sesion'];
        $tipoCuentaBD = $row['nombre_tipo_cuentas'];
        $nombre = $row['nombre_sesion'];
        $apellidoP = $row['apellido_p_sesion'];
    }
    $nombre = strtr($nombre,"ñ", "n");
    $apellidoP = strtr($apellidoP, "ñ", "n");
    if($usuario == $userBD && $password == $passwordBD){    
        if($tipoCuentaBD == 'Administrador'){
            $_SESSION['usuario'] = $userBD;
            $_SESSION['nombreApellidoUsuario'] = "$nombre $apellidoP";
            header("Location: index-galeon.php");   
        }else{
            $_SESSION['tipoCuenta'] = $tipoCuentaBD;
            header("Location: errorSesionEstandar.php");
        }
    }else{
        header("Location: errorSesion.php");
    }
?>