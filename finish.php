<?php
    $winner = $_GET["ganador"];

    include 'bd/con.php';

    $query = "SELECT * FROM participantes WHERE id=$winner;";
    $result = $conn->query($query);
    $res = $result->fetch_assoc(); 

    $wins = $res["name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adivina La canción</title>

    <?php include 'includes/links.html'; ?>
</head>
<body>

<?php include 'includes/menu.html'; ?>
<div class="cont align-items-center justify-content-center">
    <div class="col-md-10 mx-auto text-center">
        <!-- == == == || APLICACIÓN || == == == -->

        <h5 class="text" style="background-color: orange;">¡GANADOR!</h5>
        <br>
        <h1 class="text" style="background-color: black;"><?php echo $wins; ?></h1>
        <br><br>
        <a href="duelo.php" class="btn btn-lg btn-secondary">Nuevo Duelo</a>
        
        <!-- == == == || END || == == == -->
    </div>
</div>

<?php include 'includes/scripts.html'; ?>

</body>
</html>