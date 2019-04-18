<?php

require_once 'con.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST["name"];
    $query = "INSERT INTO participantes(name) VALUES('$name');";

    if (!mysqli_query($conn, $query)){
        die('Error: ' . mysql_error());
    }

    mysqli_close($conn);

    header('Location: ../puntajes.php');
    exit();

}else{
    echo 'error';
}

?>