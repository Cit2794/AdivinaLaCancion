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

    $query = "SELECT * FROM duelos WHERE id=$duelo;";
    $result = $conn->query($query);
    $res = $result->fetch_assoc(); 

    $pUno = $res["id_pUno"];
    $pDos = $res["id_pDos"]; 

    $query = "SELECT SUM(puntos) as puntos FROM puntajes WHERE id_duelo=$duelo AND id_participante=$pUno;";
    $result = $conn->query($query);
    $res = $result->fetch_assoc(); 

    $puntosUno = $res["puntos"];

    $query = "SELECT SUM(puntos) as puntos FROM puntajes WHERE id_duelo=$duelo AND id_participante=$pDos;";
    $result = $conn->query($query);
    $res = $result->fetch_assoc(); 

    $puntosDos = $res["puntos"];

    if($puntosUno > $puntosDos){
        $status = $pUno;
    }else if($puntosUno < $puntosDos){
        $status = $pDos;
    }else{
        $status = 'empate';
    }

    $query = "UPDATE duelos SET ganador=$status WHERE id=$duelo;";

    if (!mysqli_query($conn, $query)){
        die('Error: ' . mysql_error());
    }

    mysqli_close($conn);

    header('Location: ../finish.php?ganador=' . $status);
    exit();

}else{
    echo 'error';
}

?>