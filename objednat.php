<?php
  $title = "Objednání | SVHP";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }
  //$id = mysqli_real_escape_string($conn, $_POST["id"]);
  $id = (int)$_GET["id"];
  $sql = "SELECT nazev, cena FROM kurzy WHERE id_kurzy = $id";

  $nazev="";
  $cena=0;
  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
        $nazev = $row["nazev"];
        $cena = $row["cena"];
    }
  }
  else {
    echo mysqli_error($conn);
  }

?>
<div class="container">
    <div class="pagePadding">
        <div class="col-lg-8 col-lg-offset-2 seminaryDetails">
        <h1>Objednat kurz</h1>
        <span class="d-flex justify-content-center h2Footer"></span> 
            <div class="pageText">
                <?php
                if(isset($_GET["err"])){
                ?>
                    <div class="alert alert-danger text-center" role="alert">
                        Objednávka se nezdařila. Zkuste to prosím znovu.
                    </div>
                <?php
                }
                ?>
                <form action="php/vytvorit_objednavku.php" method="post">
                <input type="hidden" name="id_kurzy" value="<?php echo $id; ?>">
                <input type="hidden" name="priceOne" value="<?php echo $cena; ?>">
                    <fieldset>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="billingFirsSeminary">Kurz: </label><br>
                                <input type="text" class="form-control" name="billingFirsSeminary" value="<?php echo $nazev; ?>" disabled>
                                <!-- <label for="billingCompNane">Název společnosti: </label><br>
                                <input type="text" class="form-control" name="billingCompName" required /><br /> -->
                            </div>
                            <div class="form-group">
                                <label for="KurzDate">Termín:* </label><br>
                                <select class="form-control" name="KurzDate" id="KurzDate" placeholder="Vybrat termín" required>
                                    <?php
                                    $sql = "SELECT id_terminy, datumOd, datumDo FROM terminy WHERE terminy.id_kurzy = $id AND datumOd >= CURDATE() ORDER BY datumOd";

                                    if($query = mysqli_query($conn, $sql)){
                                        while($row = mysqli_fetch_array($query)){
                                        echo "<option value=".$row["id_terminy"].">". date_format(date_create($row["datumOd"]), "j. n. Y").' - '.date_format(date_create($row["datumDo"]), "j. n. Y")."</option>\n";
                                        }
                                    } else {
                                        echo "ERROR: ".mysqli_error($conn);
                                    }

                                    ?>
                                </select>
                            </div>
                    </fieldset>
                    <fieldset>
                        <div class="col-md-6">
                            <label for="billingFirstName">Jméno:* </label><br>
                            <input type="text" class="form-control" name="billingFirstName" required/><br />
                        </div>
                        <div class="col-md-6">
                            <label for="billingSurname">Příjmení (titul):* </label><br>
                            <input type="text" class="form-control" name="billingSurname" required /><br />
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="col-md-4">
                            <label for="billingPhone">Telefon:* </label><br>
                            <input type="tel" class="form-control" name="billingPhone" maxlength="13" required/><br />
                        </div>
                        <div class="col-md-5">
                            <label for="billingEmail">E-mail:* </label><br>
                            <input type="email" class="form-control" name="billingEmail" required /><br />
                        </div>
                        <div class="col-md-3">
                            <label for="billingBirth">Datum narození: </label><br>
                            <input type="date" data-date-inline-picker="true" class="form-control" name="billingBirth" max="2999-12-31"/><br />
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="col-md-5">
                            <label for="billingCompStreet">Adresa bydliště:* </label><br>
                            <input type="text" class="form-control" name="billingCompStreet" placeholder="Adresa a číslo popisné..." required/><br />
                        </div>
                        <div class="col-md-5">
                            <label for="billingCompCity">Město:* </label><br>
                            <input type="text" class="form-control" name="billingCompCity" required/><br />
                        </div>
                        <div class="col-md-2">
                            <label for="billingCompPSC">PSČ:* </label><br>
                            <input type="text" class="form-control" name="billingCompPSC" maxlength="6" required/><br />
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <div class="col-md-6">
                            <label for="CompName">Zaměstnavatel/OSVČ: </label><br>
                            <input type="text" class="form-control" name="CompName"/><br />
                        </div>
                        <div class="col-md-6">
                            <label for="billingICO">IČO (i OSVČ):* </label><br>
                            <input type="text" class="form-control" name="billingICO" maxlength="9" required/><br />
                        </div>
                        <div class="col-md-6">
                            <label for="CompPhone">Telefon: </label><br>
                            <input type="tel" class="form-control" name="CompPhone"/><br />
                        </div>
                        <div class="col-md-6">
                            <label for="CompEmail">E-mail: </label><br>
                            <input type="email" class="form-control" name="CompEmail"/><br />
                        </div>
                        </fieldset>
                        <fieldset>
                        <div class="col-md-5">
                            <label for="CompStreet">Adresa společnosti: </label><br>
                            <input type="text" class="form-control" name="CompStreet" placeholder="Adresa a číslo popisné..."/><br />
                        </div>
                        <div class="col-md-5">
                            <label for="CompCity">Město: </label><br>
                            <input type="text" class="form-control" name="CompCity" /><br />
                        </div>
                        <div class="col-md-2">
                            <label for="CompPSC">PSČ: </label><br>
                            <input type="text" class="form-control" name="CompPSC" /><br />
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="billingRoom">Požaduji zarezervovat ubytování:* </label><br>
                                <div class="col-md-6">
                                    <label class="radio-inline"><input type="radio" name="room" id="ne" value="ne" checked>Ne</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="radio-inline"><input type="radio" name="room" id="ano" value="ano">Ano</label> <br /><br />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  for="text">Zpráva k objednávce: </label><br>
                                <textarea class="form-control" name="text" placeholder="Máte nějaké přání?" maxlength="200" style="height:8em;"></textarea><br />

                                <div class="col-sm-12 cenaKurzy">
                                <label for="priceFull"> </label>Cena celkem:
                                <strong class="cenaKurzy" id="priceFull">
                                    <?php echo $cena; ?> Kč
                                </strong>
                                </div>
                            </div>
                            <div>
                                <p>Odesláním souhlasíte s obchodními podmínkami</p>
                            </div>
                            <br>
                            <input class="button" type="submit" value="Objednat" /><br /><br />
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
  include_once("footer.php");
?>
