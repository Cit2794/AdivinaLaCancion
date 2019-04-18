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

    $query = "SELECT * FROM canciones";
    $result = $conn->query($query);
?>

<div class="cont align-items-center justify-content-center">
    <div class="col-md-10 mx-auto text-center">
        <!-- == == == || APLICACIÓN || == == == -->

        <h1 class="text">CANCIONES <span><button type="button" class="btn btn-dark">+</button></span></h1><br><br>

        <div class="card text-center">
            <div class="card-body">
                
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Canción</th>
                    <th scope="col">Autore/es</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($result as $row){ ?>
                    <tr>
                        <th scope="row"><?php echo $id = $row["id"]; ?></th>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["artist"]; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

            </div>
        </div>
        
        <!-- == == == || END || == == == -->
    </div>
                        </div>

<?php include 'includes/scripts.html'; ?>

</body>
</html>