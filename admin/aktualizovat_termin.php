<?php
  $title = "Termín | SVHP";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_terminy = (int)$_GET["id"];

  $id_terminy = (int)$_GET["id"];
  $sql = "SELECT * FROM terminy WHERE id_terminy = $id_terminy";

  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $datumOd = $row["datumOd"];
      $datumDo = $row["datumDo"];
      $cas = $row["cas"];
      $id_kurzy = $row["id_kurzy"];
      $id_mista = $row["id_mista"];
    }
  } else {
    echo mysqli_error($conn);
    die();
  }
?>

<div class="container">
    <div class="pagePadding">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 seminaryDetails">
                <h1>Aktualizace termínu</h1>
                <span class="d-flex justify-content-center h2Footer"></span>
                <div class="pageText">    
                    <form enctype="multipart/form-data" action="php/aktualizace_termin.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id_terminy; ?>">
                        <fieldset>
                            <div class="col-md-12">    
                                <label for="KurzName">Kurz:* </label><br>
                                <select class="form-control" name="KurzName" id="KurzName" placeholder="Vybrat kurz" required>
                                    <?php
                                        $sql = "SELECT id_kurzy, nazev FROM kurzy";

                                        if($query = mysqli_query($conn, $sql)){
                                        while($row = mysqli_fetch_array($query)){
                                            if($row["id_kurzy"] == $id_kurzy){
                                            echo "<option value=".$row["id_kurzy"]." selected>".$row["nazev"]."</option>\n";
                                            } else {
                                            echo "<option value=".$row["id_kurzy"].">".$row["nazev"]."</option>\n";
                                            }

                                        }
                                        } else {
                                        echo "ERROR: ".mysqli_error($conn);
                                        }

                                    ?>
                                </select>
                                <br />
                            </div>
                            <div class="col-md-4">
                                <label for="SemDayFrom">Datum od:* </label><br>
                                    <input type="date" class="form-control" name="SemDayFrom" id="SemDayFrom" value="<?php echo $datumOd; ?>" required /> 
                            </div>
                            <div class="col-md-4">        
                                <label for="SemDayTo">Datum do:* </label><br>
                                    <input type="date" class="form-control" name="SemDayTo" id="SemDayTo" value="<?php echo $datumDo; ?>" required />
                            </div>
                            <div class="col-md-4">
                                <label for="SemTime">Zahájení:* </label><br>
                                    <input type="time" class="form-control" name="SemTime" id="SemTime" value="<?php echo $cas; ?>" required />
                                    <br />
                            </div>
                            <div class="col-md-12">    
                                <label for="KurzPlace">Místo:* </label><br>
                                <select class="form-control" name="KurzPlace" id="KurzPlace" placeholder="Vybrat kurz" required>
                                    <?php
                                        $sql = "SELECT id_mista, nazevmista FROM mista";

                                        if($query = mysqli_query($conn, $sql)){
                                        while($row = mysqli_fetch_array($query)){
                                            if($row["id_mista"] == $id_mista){
                                            echo "<option value=".$row["id_mista"]." selected>".$row["nazevmista"]."</option>\n";
                                            } else {
                                            echo "<option value=".$row["id_mista"].">".$row["nazevmista"]."</option>\n";
                                            }

                                        }
                                        } else {
                                        echo "ERROR: ".mysqli_error($conn);
                                        }
                                    ?>
                                </select>
                                <br />
                                <input class="btn btn-primary" type="submit" value="Aktualizovat" /><br />
                            </div>        
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
  include_once("footer.php");
?>
