<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeon/registroCuentas.css">
    <title>Registro de cuentas | Galeon</title>
</head>
<body>
    <script src="/Javascript/keyEventCuentas.js"></script>
    <div id="boxRegistro">
        <form action="/php/galeon/controllers/verificacionCuentas.php" method="post" id="formularioRegistro">
            <h1>Registro de cuentas</h1>    
            <input type="text" name="NombreUser" placeholder="Nombre" autocomplete="off" required></br>
            <input type="text" name="apellidoPaternoUser" id="apellidoPaternoUserID" placeholder="Apellido paterno" autocomplete="off" required></br>
            <input type="text" name="apellidoMaternoUser" id="apellidoMaternoUserID" placeholder="Apellido materno" autocomplete="off" required></br>
            <input type="text" onclick="bloquearKeySpace()" name="UsuarioUser" id="UsuarioUserID" placeholder="Usuario" autocomplete="off" required></br>
            <input type="text" onclick="bloquearKeySpace()" name="passwordUser" id="passwordUserID" placeholder="Contraseña" autocomplete="off" required></br>
            <select name="cTipoCuenta" id="cTipoCuentaUser">
                <option value="Administrador">Administrador</option>
                <option value="Estandar">Estandar</option>
            </select>
            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>