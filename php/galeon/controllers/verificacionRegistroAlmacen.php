<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    $val = false;
    $nombre = $_POST['nombreAlmacen'];
    $cantidadA = $_POST['cantidadAlmacen'];
    $contenidoA = $_POST['contenidoAlmacen'];
    $tipoA = $_POST['tipoPiezas'];
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT nombre_almacen from dbo.almacen";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $aux = $row['nombre_almacen'];
        $auxA = strtolower($row['nombre_almacen']);
        $auxnombre = strtolower($nombre);
        if($auxA == $auxnombre || $aux == $nombre || $auxA == $nombre){
            $val = true;
        }
    }
    if($val == true){
        header("Location: /php/galeon/errors/errorRegistroAlmacen.php");
    }else{
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="SELECT TOP 1 id_almacen FROM dbo.almacen ORDER BY id_almacen DESC";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $id = $row['id_almacen'];
        }        
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="SELECT id_cuenta FROM dbo.cuentas WHERE usuario_sesion = '$usuario'";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $idUser = $row['id_cuenta'];
        }        
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="SELECT id_tipo_piezas FROM dbo.almacen_tipo WHERE nombre_tipo_pieza = '$tipoA'";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $idTipo = $row['id_tipo_piezas'];
        }
        $id = $id+1;
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="INSERT INTO dbo.almacen (id_almacen, cantidad_piezas_almacen, contenido_piezas_total_almacen, fk_id_tipo_piezas_almacen, fk_id_cuentas_e_almacen, nombre_almacen) VALUES ($id, $cantidadA, $contenidoA, $idTipo, $idUser, '$nombre')";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
        }
        header("Location: /php/galeon/views/almacenGaleon.php");
    }

?>