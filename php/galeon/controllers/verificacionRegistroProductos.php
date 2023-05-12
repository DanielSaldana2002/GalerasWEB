<?php
    $val = false;
    $nombre = $_POST['NombreP'];
    $precio = $_POST['PrecioP'];
    $categoria = $_POST['cCategoria'];
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT nombre_categoria, nombre_producto FROM dbo.productos inner join dbo.categoria_productos ON id_categoria = fk_id_categoria WHERE nombre_producto = '$nombre' AND nombre_categoria = '$categoria'";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $aux = $row['nombre_producto'];
        $auxNombre = strtolower($nombre);
        $auxA = strtolower($row['nombre_producto']);
        if($auxA == $auxnombre || $aux == $nombre || $auxA == $nombre){
            $val = true;
        }
    }
    if($val == true){
        header("Location: /php/galeon/errors/errorRegistroProductos.php");
    }else{
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="SELECT id_categoria FROM dbo.categoria_productos WHERE nombre_categoria = '$categoria'";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $idP = $row['id_categoria'];
        }
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="SELECT TOP 1 id_productos FROM dbo.productos ORDER BY id_productos DESC";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            $id = $row['id_productos'];
        }
        $nombreU = ucwords($nombre);
        $id = $id+1;
        $stmt = "209.126.107.8";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="INSERT INTO dbo.productos (id_productos, nombre_producto, precio, fk_id_categoria) VALUES ($id,'$nombreU',$precio,$idP)";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
        }
        header("Location: /php/galeon/views/productosGaleon.php");
    }
?>