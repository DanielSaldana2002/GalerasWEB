<?php
    session_start();
    $comentario = $_POST['comentarioGaleras'];
    $puntuacion = $_POST['cPuntacion'];
    $stmt = "localhost";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole");
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT COUNT(id_comentario) total FROM dbo.comentario";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $id = $row['total'];
    }
    $id = $id+1;
    $stmt = "localhost";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole");
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="INSERT INTO dbo.comentario(id_comentario, descripcion_comentario,puntuacion_comentario) VALUES($id,'$comentario','$puntuacion[0]')";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        
    }
    header("Location: /php/galeras/views/comentarios.php");
?>