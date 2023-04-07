<?php
    session_start();
    $idTicket = $_POST['fkId'];
    $nombreProducto = $_POST['NombreProductos'];
    $idMesa = $_POST['fkMesas'];
    $precio = $_POST['fkPrecio'];
    $cantidad = $_POST['cantidad'];
    $totalPedido = $precio*$cantidad;
    $stmt = "DESKTOP-DANIEL";
    $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="SELECT id_productos FROM dbo.productos where nombre_producto = '$nombreProducto';";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
        $id_producto = $row['id_productos'];
    }
    $stmt = "DESKTOP-DANIEL";
    $opc=array("Database"=>"galeras", "UID"=>"daniel2002","PWD"=>"12345678");  
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="INSERT INTO dbo.tickets_pedidos(fk_id_tickets_p, fk_id_producto_p, fk_id_mesas_p, fk_precio, cantidad, total_pedido) VALUES ($idTicket,$id_producto,$idMesa,$precio,$cantidad,$totalPedido);";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){

    }
    header("Location: agregarPedidos.php");
?>