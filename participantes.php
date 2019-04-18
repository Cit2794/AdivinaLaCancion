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
<main role="main" class="inner cover align-items-center justify-content-center">
    <div class="col-md-6 mx-auto text-center">
        <!-- == == == || APLICACIÓN || == == == -->

        <div class="card text-center">
            <div class="card-body">
                <form method="post" action="bd/nuevoParticipante.php">
                    <div class="form-group">
                        <label for="name" style="color:black;">Nombre del Nuevo Participante</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Ingresa nombre...">
                    </div>
                    <button type="submit" class="btn btn-primary">Cargar</button>
                </form>
            </div>
        </div>
        
        <!-- == == == || END || == == == -->
    </div>
</main>

<?php include 'includes/scripts.html'; ?>

</body>
</html>