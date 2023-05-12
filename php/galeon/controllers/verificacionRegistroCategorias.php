<?php
    session_start();
    $val = false;
    $nombre = $_POST['NombreC'];
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT nombre_categoria from dbo.categoria_productos";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $aux = $row['nombre_categoria'];
        $auxA = strtolower($row['nombre_categoria']);
        $auxNombre = strtolower($nombre);
        if($auxA == $auxnombre || $aux == $nombre || $auxA == $nombre){
            $val = true;
        }
    }
    if($val == true){
        header("Location: /php/galeon/errors/errorRegistroCategorias.php");
    }else{
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="SELECT TOP 1 id_categoria FROM dbo.categoria_productos ORDER BY id_categoria DESC";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $id = $row['id_categoria'];
        }
        $id = $id+1;
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="INSERT INTO dbo.categoria_productos (id_categoria, nombre_categoria) VALUES ($id,'$nombre')";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
        }
        header("Location: /php/galeon/views/productosGaleon.php");
    }

?>