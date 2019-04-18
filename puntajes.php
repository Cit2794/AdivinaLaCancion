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

        <h1 class="text">PUNTAJES</h1><br><br>

        <div class="card text-center text-dark">
            <div class="card-body">
                
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Puntos</th>
                    <th scope="col">Duelos Ganados</th>
                    <th scope="col">Duelos Perdidos</th>
                    <th scope="col">Duelos Empatados</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($result as $row){ ?>
                    <tr>
                        <th scope="row"><?php echo $id = $row["id"]; ?></th>
                        <td><?php echo $row["name"]; ?></td>
                        <td>
                        <?php 
                            $res = $conn->query("SELECT SUM(puntos) as puntos FROM puntajes WHERE id_participante=$id;");
                            $puntos = $res->fetch_assoc();
                            if( $puntos["puntos"] == null){
                                echo '0';
                            }else{
                                echo $puntos["puntos"];
                            }
                        ?>
                        </td>
                        <td>
                        <?php 
                            $res = $conn->query("SELECT COUNT(*) as total FROM duelos WHERE id_pUno=$id or id_pDos=$id;");
                            $duelos = $res->fetch_assoc();
                            $dtotales = $duelos["total"];

                            $res = $conn->query("SELECT COUNT(*) as ganados FROM duelos WHERE ganador='$id';");
                            $ganados = $res->fetch_assoc();
                            echo $dganados = $ganados["ganados"];
                        ?>
                        </td>
                        <td>
                        <?php 
                            $res = $conn->query("SELECT COUNT(*) as empate FROM duelos WHERE (id_pUno=$id or id_pDos=$id) and ganador='empate';");
                            $duelos = $res->fetch_assoc();
                            $dempatados = $duelos["empate"];
                            $dperdidos = $dtotales - ($dganados + $dempatados);
                            echo $dperdidos;
                        ?>
                        </td>
                        <td><?php echo $dempatados; ?></td>
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