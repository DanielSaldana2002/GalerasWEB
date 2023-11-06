<?php
    session_start();
    $_SESSION['usuario'] = $_POST['user'];
    $usuario = $_POST['user'];
    $password = $_POST['password'];
    $stmt = "localhost";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole");
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT usuario_sesion, contrasena_sesion, nombre_tipo_cuentas, nombre_sesion, apellido_p_sesion, activo_sesion FROM dbo.cuentas INNER JOIN dbo.tipo_cuentas ON fk_id_tipo_cuentas = id_tipo_cuentas WHERE usuario_sesion = '$usuario' and contrasena_sesion = '$password';";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $userBD = $row['usuario_sesion'];
        $passwordBD = $row['contrasena_sesion'];
        $tipoCuentaBD = $row['nombre_tipo_cuentas'];
        $nombre = $row['nombre_sesion'];
        $apellidoP = $row['apellido_p_sesion'];
        $status = $row['activo_sesion'];
    }
    $nombre = strtr($nombre,"ñ", "n");
    $apellidoP = strtr($apellidoP, "ñ", "n");
    if($usuario == $userBD && $password == $passwordBD){    
        if($tipoCuentaBD == 'Administrador' && $status == 1){
            $_SESSION['usuario'] = $userBD;
            $_SESSION['nombreApellidoUsuario'] = "$nombre $apellidoP";
            header("Location: /php/galeon/views/index-galeon.php");   
        }else if($status == 0){
            header("Location: /php/galeon/errors/errorSesionDesactiva.php");
        }else if($tipoCuentaBD == "Estandar"){
            $_SESSION['tipoCuenta'] = $tipoCuentaBD;
            header("Location: /php/galeon/errors/errorSesionEstandar.php");
        }
    }else{
        header("Location: /php/galeon/errors/errorSesion.php");
    }
?>