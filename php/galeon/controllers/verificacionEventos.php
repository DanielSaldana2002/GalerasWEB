<?php
    session_start();
    $nombreUser = $_SESSION['usuario'];
    $title = $_POST['titleEvento'];
    $date = $_POST['dateCombo'];
    $descripcion = $_POST['descripcionEvento'];
    $tipoEventos = $_POST['cTipoEvento'];
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT id_cuenta FROM dbo.cuentas WHERE usuario_sesion = '$nombreUser'";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $idUser = $row['id_cuenta'];
    }
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT TOP 1 id_evento FROM dbo.eventos id_evento order by id_evento desc";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $idEvento = $row['id_evento'];
    }
    $idEvento = $idEvento + 1;
    if($tipoEventos == 'Musica'){
        $idTipoEventos = 1;
    }else if($tipoEventos == 'Comedia'){
        $idTipoEventos = 2;
    }
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="INSERT INTO dbo.eventos (id_evento, nombre_evento, descripcion_evento, fecha_evento, fk_id_cuentas_e, fk_id_tipo_evento) VALUES ('$idEvento','$title','$descripcion','$date','$idUser','$idTipoEventos')";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
    }
    header("Location: /php/galeon/views/eventosGaleon.php");
?>