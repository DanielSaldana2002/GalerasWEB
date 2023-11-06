<?php
    session_start();    
    $idTicket  = $_SESSION['idTickets'];
    $nombre    = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $rfc       = $_POST['rfc'];
    $correoE   = $_POST['correoE'];

    if (strlen($_POST['rfc']) < 11) {
        header('Location: /php/galeon/errors/errorRegistroFactura.php');
    }else{
        $stmt = "localhost";
        $opc=array("Database"=>"galerasw_galeras", "UID"=>"sole","PWD"=>"sole"); 
        $con=sqlsrv_connect($stmt,$opc) or die(print_r(sqlsrv_errors(), true));
        $sql="Insert Into dbo.factura Values($idTicket,GetDate(),'$nombre','$apellidoP','$apellidoM','$rfc','$correoE')";
        $res=sqlsrv_query($con,$sql);
        while($row=sqlsrv_fetch_array($res)){
            echo <<<TEXTO
            TEXTO;
        }
        header('Location: /php/galeon/views/historial.php');
    }
?>