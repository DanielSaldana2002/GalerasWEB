<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/modificarCuentas.css">
    <title>Modificador de cuentas | Galeon</title>
</head>
<body>
    <div id="boxRegistro"> 
    <?php
        session_start();
        $id = $_POST['id'];
        $_SESSION['idSesion'] = $id;
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="SELECT id_cuenta, nombre_sesion, apellido_p_sesion, apellido_m_sesion, usuario_sesion, contrasena_sesion, nombre_tipo_cuentas FROM dbo.cuentas INNER JOIN dbo.tipo_cuentas ON id_tipo_cuentas = fk_id_tipo_cuentas WHERE id_cuenta = '$id'";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $id = $row['id_cuenta'];
            $nombre = $row['nombre_sesion'];
            $apellidoP = $row['apellido_p_sesion'];
            $apellidoM = $row['apellido_m_sesion'];
            $usuario = $row['usuario_sesion'];
            $password = $row['contrasena_sesion'];
            $tipoUsuario = $row['nombre_tipo_cuentas'];
        }
        echo <<<TEXTO
        <form action="/php/verificacionModificacionCuentas.php" method="post" id="formularioRegistro">
            <h1>Modificar cuenta</h1>    
            <input type="text" value="$nombre" name="NombreUser" placeholder="Nombre" autocomplete="off" required></br>
            <input type="text" value="$apellidoP" name="apellidoPaternoUser" id="apellidoPaternoUserID" placeholder="Apellido paterno" autocomplete="off" required></br>
            <input type="text" value="$apellidoM" name="apellidoMaternoUser" id="apellidoMaternoUserID" placeholder="Apellido materno" autocomplete="off" required></br>
            <input type="text" value="$usuario" name="UsuarioUser" id="UsuarioUserID" placeholder="Usuario" autocomplete="off" required disabled></br>
            <input type="text" value="$password " name="passwordUser" id="passwordUserID" placeholder="Contraseña" autocomplete="off" required></br>
            <select name="cTipoCuenta" id="cTipoCuentaUser">
        TEXTO;
            if($tipoUsuario == 'Administrador'){
                echo <<<TEXTO
                    <option value="Administrador">Administrador</option>
                    <option value="Estandar">Estandar</option>
                TEXTO;
            }else if($tipoUsuario == 'Estandar'){
                echo <<<TEXTO
                    <option value="Estandar">Estandar</option>
                    <option value="Administrador">Administrador</option>
                TEXTO;
            }
            echo <<<TEXTO
            </select>
            <button type="submit">Actualizar</button>
        </form>
    TEXTO;
    ?>
    </div>
</body>
</html>