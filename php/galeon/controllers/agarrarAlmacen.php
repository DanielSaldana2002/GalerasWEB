<?php
    session_start();
    $id = $_POST['idA'];
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT cantidad_piezas_almacen FROM dbo.almacen WHERE id_almacen = $id";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $cantidad = $row['cantidad_piezas_almacen'];
    }
    $cantidad = $cantidad-1;
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="UPDATE dbo.almacen SET cantidad_piezas_almacen = $cantidad WHERE id_almacen = $id ";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
    }
    header('Location: /php/galeon/views/almacenGaleon.php');
?>