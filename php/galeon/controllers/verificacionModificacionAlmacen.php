<?php
    session_start();
    $nombre = $_POST['nombreAlmacen'];
    $contenido = $_POST['contenidoAlmacen'];
    $tipo = $_POST['tipoPiezas'];
    if($tipo = 'Kilogramos'){
        $auxTipo = 1;
    }else{
        $auxTipo = 2;
    }
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="UPDATE dbo.almacen SET contenido_piezas_total_almacen = $contenido, fk_id_tipo_piezas_almacen = $auxTipo WHERE nombre_almacen = '$nombre'";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
    }
    header('Location: /php/galeon/views/almacenGaleon.php');
?>