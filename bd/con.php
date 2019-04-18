<?php //Conexión a BD - AdivinaCancion
    $_user = "citom";
    $_pass = "pass123";
    $_server = "localhost";
    $_database = "adivinaCancion";

    $conn = mysqli_connect( $_server, $_user, $_pass, $_database ) or die ("No se ha podido conectar al servidor de Base de datos");
    if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
    
    //mysqli_close($conn);
?>