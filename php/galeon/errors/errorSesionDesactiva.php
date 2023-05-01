<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error | Inicio de sesion</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeon/errorSesion.css">
</head>
<body>
    <script src="/Javascript/galeon.js"></script>
    <script src="/Javascript/galeon-animation.js"></script>
    <div id="fondo"><p></p></div>
    <div id="box-relleno"><p></p></div>
    <div>
        <div id="box-login"></div>
        <div id="box-galeon"></div>
    </div>
    <div id='size-imagen'>
        <div id='title-message-box'>
            <h1>ERROR INICIO DE SESION</h1>
            <?php
                session_start();
                echo <<<TEXTO
                    <p>
                        El usuario iniciado esta desactivado,
                        favor de contactarse con su administrador para cambiar
                        el estatus de la cuenta.
                    </p>
                TEXTO;
            ?>
            <button><a href="/php/galeon/views/galeon.php">Regresar a Galeon</a></button>
        </div>
        <img src="/img/1663952285593 (3).png" alt="Logo galeras" id="logo-galeras">
    </div>
</body>
</html>