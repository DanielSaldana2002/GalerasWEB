<?php
    $idDesactivar = $_POST['id'];
    $stmt = "209.126.107.8";
    $opc=array("Database"=>"galerasw_galeras", "UID"=>"galerasw_galeras2023","PWD"=>"20021120"); 
    $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
    $sql="UPDATE dbo.cuentas SET activo_sesion = 1 WHERE id_cuenta = '$idDesactivar'";
    $res=sqlsrv_query($con,$sql);
    while($row=sqlsrv_fetch_array($res)){
    }
    header('Location: /php/galeon/views/cuentas.php');
?>