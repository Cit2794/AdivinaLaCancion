<?php
        $duelo = $_GET["id"];

        include 'bd/con.php';

        $query = "SELECT * FROM duelos WHERE id=$duelo;";
        $result = $conn->query($query);

        $query = "SELECT * FROM canciones ORDER BY RAND() LIMIT 1;";
        $song = $conn->query($query);

        $song = $song->fetch_assoc(); 
        $id_song = $song["id"]; 
        $name_song = $song["name"];
        $artist_song = $song["artist"];  
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

<?php  include 'includes/menu.html'; ?>

<div class="cont align-items-center justify-content-center">
    <div class="col-md-11 mx-auto text-center">
        <!-- == == == || APLICACIÓN || == == == -->

        <h1 class="text" style="background-color: orange;">CANCIÓN 1</h1>
        
        <br><br><br>
            <h4 class="text-white" style="background-color: black;"><?php echo $name_song ?> - <?php echo $artist_song ?></h4>
        <br><br><br><br>

        <audio id="test" src="music/5/<?php echo $id_song ?>.mp3" preload="metadata" controls></audio>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <audio id="test" src="music/10/<?php echo $id_song ?>.mp3" preload="metadata" controls></audio>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <audio id="test" src="music/15/<?php echo $id_song ?>.mp3" preload="metadata" controls></audio>

        <br><br><br><br><br>
        <button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#seleccion">Seleccionar Ganador</button>
        
        <!-- == == == || END || == == == -->
    </div>
    
</div>

<!-- Modal -->
<div class="modal fade" id="seleccion" tabindex="-1" role="dialog" aria-labelledby="seleccion" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de Ronda <?php echo $duelo; ?> - Canción 1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="post" action="bd/rondaUno.php">
                <input type="text" value="<?php echo $duelo; ?>" name="duelo" hidden>
                <input type="text" value="<?php echo $id_song ?>" name="cancion" hidden>
                <select class="form-control form-control-lg" name="ganador">
                    <option value="0">Selecciona al ganador</option>
                    <?php foreach($result as $row){ ?>
                        <option value="<?php echo $idp = $row["id_pUno"]; ?>"><?php 
                            $res = $conn->query("SELECT * FROM participantes WHERE id=$idp;");
                            $part = $res->fetch_assoc();
                            echo $part["name"];
                        ?></option>
                        <option value="<?php echo $idp = $row["id_pDos"]; ?>"><?php 
                            $res = $conn->query("SELECT * FROM participantes WHERE id=$idp;");
                            $part = $res->fetch_assoc();
                            echo $part["name"];
                        ?></option>
                    <?php } ?>
                </select>
                <br>
                <select class="form-control form-control-lg" name="puntos">
                    <option value="0">Selecciona el puntaje</option>
                    <option value="1">1 Puntos</option>
                    <option value="2">2 Puntos</option>
                </select>

                <br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Siguiente Ronda</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/scripts.html'; ?>

</body>
</html>