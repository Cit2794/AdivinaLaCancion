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

<?php 
    include 'bd/con.php';
    include 'includes/menu.html'; 

    $query = "SELECT * FROM participantes";
    $result = $conn->query($query);
?>

<div class="cont align-items-center justify-content-center">
    <div class="col-md-10 mx-auto text-center">
        <!-- == == == || APLICACIÓN || == == == -->

        <h1 class="text">NUEVO DUELO</h1><br><br>

        <div class="card text-center">
            <div class="card-body">
                <br>
            <form method="post" action="bd/nuevoDuelo.php" class="col-md-8 mx-auto text-center">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Participante:</label>
                    <div class="col-sm-10">
                        <select class="form-control form-control-lg" name="pUno">
                            <option value="0">Selecciona un participante</option>
                        <?php foreach($result as $row){ ?>
                            <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Participante:</label>
                    <div class="col-sm-10">
                        <select class="form-control form-control-lg" name="pDos">
                            <option value="0">Selecciona un participante</option>
                        <?php foreach($result as $row){ ?>
                            <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">A Jugar</button>
            </form>
                
            </div>
        </div>
        
        <!-- == == == || END || == == == -->
    </div>
                        </div>

<?php include 'includes/scripts.html'; ?>

</body>
</html>