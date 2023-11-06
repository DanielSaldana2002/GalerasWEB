<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuentas | Galeon</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeon/productosGaleon.css">
    <link rel="stylesheet" href="/style/galeon/cuentas.css">
    <script src="/Javascript/keyEventCuentas.js"></script>
</head>
<body>
    <div>
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
    </div>
    <?php
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="SELECT COUNT(id_cuenta )id_cuenta FROM dbo.cuentas";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $idCuentaInicial = $row['id_cuenta'];
        }
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql=" SELECT COUNT(id_cuenta) id_cuenta FROM dbo.cuentas WHERE fk_id_tipo_cuentas = 1";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $idCuentaAdministrador = $row['id_cuenta'];
        }
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql=" SELECT COUNT(id_cuenta) id_cuentas FROM dbo.cuentas WHERE fk_id_tipo_cuentas = 2";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $idCuentaEstandar = $row['id_cuentas'];
        }
        echo <<<TEXTO
            <h1></h1>
            <form action="registroCuentas.php" method="post">
                <button type="submit" id="createAccount">Crear</button>
            </form>
            <div id="buttom-cuenta">
                <h2>Crear una cuenta</h2>
                <h2>Activos:</h2>
                <form action="" method="post">
                    <input type="text" placeholder="Buscar usuario..." autocomplete="off" name="userCuentas" id="">
                    <button type="submit" name="enviar">Buscar</button>
                </form>
                <h3 id="cuentaEst">No. Cuentas estandar: $idCuentaEstandar</h3>
                <h3 id="cuentaAdmi">No. Cuentas administrador: $idCuentaAdministrador</h3>
                <h3 id="cuentaTotal">No. Cuentas: $idCuentaInicial</h3>
            </div>
        TEXTO;
    ?>
    <table>
        <tr id="title-table">
            <td>Nombre</td>
            <td>Apellido paterno</td>
            <td>Apellido materno</td>
            <td>Usuario</td>
            <td>Contraseña</td>
            <td>Tipo usuario</td>
            <td>Acciones</td>
        </tr>
        
    <?php
        if(isset($_POST['enviar'])){
            $user = $_POST['userCuentas'];
                $stmt = "209.126.107.8";
                $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT id_cuenta, nombre_sesion, apellido_p_sesion, apellido_m_sesion, usuario_sesion, contrasena_sesion, nombre_tipo_cuentas FROM dbo.cuentas INNER JOIN dbo.tipo_cuentas ON id_tipo_cuentas = fk_id_tipo_cuentas WHERE usuario_sesion LIKE '$user%' and activo_sesion = 1";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    $id = $row['id_cuenta'];
                    $nombre = $row['nombre_sesion'];
                    $apellidoP = $row['apellido_p_sesion'];
                    $apellidoM = $row['apellido_m_sesion'];
                    $usuario = $row['usuario_sesion'];
                    $password = $row['contrasena_sesion'];
                    $tipoUsuario = $row['nombre_tipo_cuentas'];
                    echo <<<TEXTO
                        <tr>
                            <td>$nombre</td>
                            <td>$apellidoP</td>
                            <td>$apellidoM</td>
                            <td>$usuario</td>
                            <td>$password</td>
                            <td>$tipoUsuario</td>
                            <td>
                            <form action="modificarCuentas.php" method="post">
                                <input type="text" value="$id" name="id" style="display: none;">
                                <button type="submit">Actualizar</button>
                            </form>
                            <form action="/php/galeon/controllers/activacionCuentaDesactivar.php" method="post">
                                <input type="text" value="$id" name="id" style="display: none;">
                                <button type="submit" name="desactivar">Desactivar</button>
                            </form>
                            </td>
                        </tr>
                    TEXTO;
            }
        }else{
            $stmt = "209.126.107.8";
            $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
            $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
            $sql="SELECT id_cuenta, nombre_sesion, apellido_p_sesion, apellido_m_sesion, usuario_sesion, contrasena_sesion, nombre_tipo_cuentas FROM dbo.cuentas INNER JOIN dbo.tipo_cuentas ON id_tipo_cuentas = fk_id_tipo_cuentas WHERE activo_sesion = 1";
            $res=sqlsrv_query($con,$sql);
            while($row=sqlsrv_fetch_array($res)){
                $id = $row['id_cuenta'];
                $nombre = $row['nombre_sesion'];
                $apellidoP = $row['apellido_p_sesion'];
                $apellidoM = $row['apellido_m_sesion'];
                $usuario = $row['usuario_sesion'];
                $password = $row['contrasena_sesion'];
                $tipoUsuario = $row['nombre_tipo_cuentas'];
                echo <<<TEXTO
                    <tr>
                    <td>$nombre</td>
                    <td>$apellidoP</td>
                    <td>$apellidoM</td>
                    <td>$usuario</td>
                    <td>$password</td>
                    <td>$tipoUsuario</td>
                    <td>
                    <form action="modificarCuentas.php" method="post">
                        <input type="text" value="$id" name="id" style="display: none;">
                        <button type="submit">Actualizar</button>
                        </form>
                    <form action="/php/galeon/controllers/activacionCuentaDesactivar.php" method="post">
                        <input type="text" value="$id" name="id" style="display: none;">
                        <button type="submit" name="desactivar">Desactivar</button>
                    </form>
                    </td>
                    </tr>
                TEXTO;
            }
        }
    ?>
    </table>
    </br>
    <div id="buttom-cuenta">
        <h2>Desactivos:</h2>
    </div>
    <table>
        <tr id="title-table">
            <td>Nombre</td>
            <td>Apellido paterno</td>
            <td>Apellido materno</td>
            <td>Usuario</td>
            <td>Contraseña</td>
            <td>Tipo usuario</td>
            <td>Acciones</td>
        </tr>
        <?php
            $stmt = "209.126.107.8";
            $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
            $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
            $sql="SELECT id_cuenta, nombre_sesion, apellido_p_sesion, apellido_m_sesion, usuario_sesion, contrasena_sesion, nombre_tipo_cuentas FROM dbo.cuentas INNER JOIN dbo.tipo_cuentas ON id_tipo_cuentas = fk_id_tipo_cuentas WHERE activo_sesion = 0";
            $res=sqlsrv_query($con,$sql);
            while($row=sqlsrv_fetch_array($res)){
                $id = $row['id_cuenta'];
                $nombre = $row['nombre_sesion'];
                $apellidoP = $row['apellido_p_sesion'];
                $apellidoM = $row['apellido_m_sesion'];
                $usuario = $row['usuario_sesion'];
                $password = $row['contrasena_sesion'];
                $tipoUsuario = $row['nombre_tipo_cuentas'];
                echo <<<TEXTO
                    <tr>
                        <td>$nombre</td>
                        <td>$apellidoP</td>
                        <td>$apellidoM</td>
                        <td>$usuario</td>
                        <td>$password</td>
                        <td>$tipoUsuario</td>
                        <td>
                        <form action="modificarCuentas.php" method="post">
                        <input type="text" value="$id" name="id" style="display: none;">
                        <button type="submit">Actualizar</button>
                        </form>
                        <form action="/php/galeon/controllers/activacionCuentaActivar.php" method="post">
                            <input type="text" value="$id" name="id" style="display: none;">
                            <button type="submit">Activar</button>
                        </form>
                        </td>
                    </tr>
                TEXTO;
            }
        ?>
    </table>
    </br></br></br>
</body>
</html>