<?php

require_once 'con.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $pUno = $_POST["pUno"];
    $pDos = $_POST["pDos"];
    $query = "INSERT INTO duelos(id_pUno, id_pDos) VALUES($pUno, $pDos);";

    if (!mysqli_query($conn, $query)){
        die('Error: ' . mysql_error());
    }

    $query = "SELECT * FROM duelos ORDER BY id desc LIMIT 1;";
    $result = $conn->query($query);

    $res = $result->fetch_assoc(); 
    $id = $res["id"]; 

    mysqli_close($conn);

    header('Location: ../primero.php?id=' . $id);
    exit();

}else{
    echo 'error';
}

?>