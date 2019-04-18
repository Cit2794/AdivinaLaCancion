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

<?php include 'bd/con.php'; ?>

<?php include 'includes/menu.html'; ?>
<main role="main" class="inner cover align-items-center justify-content-center">
    <div class="col-md-10 mx-auto text-center">
        <h1 class="cover-heading text" style="background-color: orange;">¡INICIO!</h1>
        <br>
        <p class="lead" style="background-color: black;">Comienza añadiendo participantes al juego.</p>
        <p class="lead">
            <a href="participantes.php" class="btn btn-lg btn-secondary">Comenzar</a>
        </p>
    </div>
</main>

<?php include 'includes/scripts.html'; ?>

</body>
</html>