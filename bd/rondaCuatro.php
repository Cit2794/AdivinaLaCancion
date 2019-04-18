<?php

require_once 'con.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $duelo = $_POST["duelo"];
    $cancion = $_POST["cancion"];
    $participante = $_POST["ganador"];
    $puntos = $_POST["puntos"];

    $query = "INSERT INTO puntajes(id_duelo, id_cancion, id_participante, puntos) VALUES($duelo, $cancion, $participante, $puntos);";

    if (!mysqli_query($conn, $query)){
        die('Error: ' . mysql_error());
    }

    mysqli_close($conn);

    header('Location: ../quinto.php?id=' . $duelo);
    exit();

}else{
    echo 'error';
}

?>