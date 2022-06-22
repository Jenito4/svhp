<?php
  $title = "Přidat termín | SVHP";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_kurzy = (int)$_GET["id"];

  $id_kurzy = (int)$_GET["id"];
  $sql = "SELECT * FROM kurzy WHERE kurzy.id_kurzy = $id_kurzy";

  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $nazevKurzy = $row["nazev"];;
      $cena = $row["cena"];

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
                <h1>Přidat termín</h1>
                <span class="d-flex justify-content-center h2Footer"></span>
                <div class="pageText">
                    <form enctype="multipart/form-data" action="php/vloz_pridat_termin_skript.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id_kurzy; ?>">
                        <fieldset>
                            <div class="col-sm-12">
                                <table class="table">
                                    <tr>
                                        <td>Kurz:</td>
                                        <td><?php echo $nazevKurzy; ?></td>
                                    </tr>
                                    <tr class="bolder">
                                        <td>Cena: </td>
                                        <td><?php echo $cena; ?> Kč</td>
                                    </tr>
                                </table> 
                            </div>         
                            <div class="col-md-4">
                                <label for="KurzDateFrom">Datum od:* </label><br>
                                    <input type="date" class="form-control" name="KurzDateFrom" id="KurzDateFrom" required /><br />
                            </div>
                            <div class="col-md-4">          
                                <label for="KurzDateTo">Datum do:* </label><br>
                                    <input type="date" class="form-control" name="KurzDateTo" id="KurzDateTo" required /><br />     
                            </div>
                            <div class="col-md-4">             
                                <label for="KurzTime">Zahájení kurzu:* </label><br>
                                    <input type="time" class="form-control" name="KurzTime" id="KurzTime" required /><br />
                            </div>
                            <div class="col-md-12">    
                                    <label for="SemLector">Místo kurzu:* </label><br>
                                            <select class="form-control" name="KurzPlace" id="KurzPlace" placeholder="Vybrat místo" required>
                                                <?php
                                                $sql = "SELECT id_mista, nazevmista FROM mista";

                                                if($query = mysqli_query($conn, $sql)){
                                                    while($row = mysqli_fetch_array($query)){
                                                    echo "<option value=".$row["id_mista"].">".$row["nazevmista"]."</option>\n";
                                                    }
                                                } else {
                                                    echo "ERROR: ".mysqli_error($conn);
                                                }

                                                ?>
                                            </select>  
                                            <br />              
                                <input class="btn btn-primary" type="submit" value="Přidat termín" /><br /><br />
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
