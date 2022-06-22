<?php
  $title = "Vložit nový termín | SVHP";
  include_once("header.php");
?>

<div class="container">
    <div class="pagePadding">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 seminaryDetails">
                <h1>Vložení termínu</h1>
                <span class="d-flex justify-content-center h2Footer"></span>
                <div class="pageText">
                    <form action="php/vloz_termin_skript.php" method="post">  
                        <fieldset>
                            <div class="col-md-12">
                            <label for="SemName">Název kurzu:* </label><br>
                                <select class="form-control" name="SemName" id="SemName" required>
                                    <?php
                                    $sql = "SELECT id_kurzy, nazev FROM kurzy";
                                    if($query = mysqli_query($conn, $sql)){
                                        while($row = mysqli_fetch_array($query)){
                                        echo "<option value=".$row["id_kurzy"].">".$row["nazev"]."</option>\n";
                                        }
                                    } else {
                                        echo mysqli_error($conn);
                                    }
                                    ?>
                                </select>
                                <br />
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
                                <label for="KurzTime">Zahájení:* </label><br>
                                    <input type="time" class="form-control" name="KurzTime" id="KurzTime" required /><br />
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
                            </div>  
                        </fieldset>
                        
                        <div class="col-md-12">
                        <input class="btn btn-primary" type="submit" value="Vložit" /><br /><br />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  
<?php
    include_once("footer.php");
?>
