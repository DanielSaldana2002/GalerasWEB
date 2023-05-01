<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios | Galeras</title>
    <link rel="icon" href="/img/1663952285593 (3).png" type="image/png" sizes="24x24">
    <link rel="stylesheet" href="/style/galeras/style.css">
    <link rel="stylesheet" href="/style/galeras/comentario.css">
</head>
<body>
    <div id="body-desktop">
        <ul id="menu">
            <li><a href="/html/galeras/index.html" id="size-desktop">Inicio</a></li>
            <li><a href="/php/galeras/views/sucursal.php" id="size-desktop">Sucursal</a></li>
            <li><a href="/php/galeras/views/productos.php" id="size-desktop">Productos</a></li>
            <li><a href="/php/galeras/views/eventos.php" id="size-desktop">Eventos</a></li>
            <li><a href="/php/galeras/views/comentarios.php" id="size-desktop">Comentarios</a></li>
            <li><a href="/php/galeon/views/galeon.php" id="size-desktop">Galeon</a></li>
        </ul>
        <img src="/img/1663952285593 (3).png">
        <div id="formComentarios">
            <form action="/php/comentarioVerificacion.php" method="post">
                <p>Escribe tu comentario:</p>
                <textarea name="comentarioGaleras" id="comentarioInput" cols="80" rows="10"></textarea>
                <p>Puntuacion: <select name="cPuntacion" id="puntacion">
                    <option>1⭐</option>
                    <option>2⭐</option>
                    <option>3⭐</option>
                    <option>4⭐</option>
                    <option>5⭐</option>
                </select></p>
                <button type="submit" id="sendComentario">Enviar</button>
            </form>
            <?php
                $stmt = "209.126.107.8";
                $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120");   
                $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
                $sql="SELECT * FROM dbo.comentario";
                $res=sqlsrv_query($con,$sql);
                while($row=sqlsrv_fetch_array($res)){
                    $id = $row['id_comentario'];  
                    $descripcion = $row['descripcion_comentario'];
                    $puntuacion = $row['puntuacion_comentario'];
                    echo <<<Texto
                        <div id="boxComentarios">
                            <h3>Numero de comentario: $id</h3>
                            <p>$descripcion.</p>
                            <p>Calificacion: $puntuacion</p>
                        </div>
                    Texto;
                }
            ?>
        </div>
    </div>
</body>
</html>