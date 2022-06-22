<?php
  $title = "Objednávka | SVHP";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_objednavky = (int)$_GET["id"];

  $id_objednavky = (int)$_GET["id"];
  $sql = "SELECT * FROM objednavky, kurzy, terminy WHERE objednavky.id_objednavky = $id_objednavky AND kurzy.id_kurzy = objednavky.id_kurzy AND terminy.id_terminy = objednavky.id_terminy";

  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $cena = $row["cena"];
      $nazevKurzy = $row["nazev"];
      $status = $row["status"];
      $jmeno = $row["jmeno"];
      $prijmeni = $row["prijmeni"];
      $email = $row["email"];
      $telefon = $row["telefon"];
      $firmaEmail = $row["firmaEmail"];
      $firmaTelefon = $row["firmaTelefon"];
      $firmaNazev = $row["firmaNazev"];
      $ico = $row["ico"];
      $rodne_cislo = $row["rodne_cislo"];
      $datumOd = date_format(date_create($row["datumOd"]), "j. n. Y");
      $datumDo = date_format(date_create($row["datumDo"]), "j. n. Y");
      $cas = $row["cas"];
      $mesto = $row["mesto"];
      $adresa = $row["adresa"];
      $psc = $row["psc"];
      $firmaMesto = $row["firmaMesto"];
      $firmaOkres = $row["firmaOkres"];
      $firmaAdresa = $row["firmaAdresa"];
      $firmaPSC = $row["firmaPSC"];
      $zprava = $row["zprava"];
      $ubytovani = $row["ubytovani"];
    }
  } else {
    echo mysqli_error($conn);
    die();
  }
?>

<div class="container">
    <div class="pagePadding">
    <h1 class="print ml-5">Objednávka</h1> 
        <div class="row seminaryDetails"> 
            <div class="col-sm-1">
            </div>  
            <div class="col-sm-5 pr-5 pt-5">
                <table class="table bolder">
                    <tr>
                        <td>Jméno a příjmení:</td>
                        <td><?php echo $jmeno." ".$prijmeni; ?></td>
                    </tr>
                    <tr>
                        <td>Telefon:</td>
                        <td><?php echo $telefon; ?></td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td>Datum narození:</td>
                        <td><?php echo $rodne_cislo; ?></td>
                    </tr>
                    <tr>
                        <td>Bydliště ulice:</td>
                        <td><?php echo $adresa; ?></td>
                    </tr>
                    <tr>
                        <td>Město:</td>
                        <td><?php echo $mesto; ?></td>
                    </tr>
                    <tr>
                        <td>PSČ:</td>
                        <td><?php echo $psc; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-5 pt-5">
                <table class="table bolder">    
                    <tr>
                        <td>Firma Název:</td>
                        <td><?php echo $firmaNazev; ?></td>
                    </tr>
                    <tr>
                        <td>IČO:</td>
                        <td><?php echo $ico; ?></td>
                    </tr>
                    <tr>
                        <td>Telefon:</td>
                        <td><?php echo $firmaTelefon; ?></td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td><?php echo $firmaEmail; ?></td>
                    </tr>
                    <tr>
                        <td>Ulice:</td>
                        <td><?php echo $firmaAdresa; ?></td>
                    </tr>
                    <tr>
                        <td>Město:</td>
                        <td><?php echo $firmaMesto; ?></td>
                    </tr>
                    <tr>
                        <td>PSČ:</td>
                        <td><?php echo $firmaPSC; ?></td>
                    </tr>
                </table>    
            </div>    
            <div class="col-sm-1">
            </div>
            <div class="col-sm-1">
            </div>
            <div class="col-sm-5 pt-5">
                <table class="table bolder">
                    <tr>
                        <td>Kurz:</td>
                        <td><?php echo $nazevKurzy; ?></td>
                    </tr>
                    <tr>
                        <td>Cena: </td>
                        <td><?php echo $cena; ?> Kč</td>
                    </tr>
                    <tr>
                        <td>Datum kurzu:</td>
                        <td><?php echo $datumOd.' - '.$datumDo; ?></td>
                    </tr>
                    <tr>
                        <td>Čas:</td>
                        <td><?php echo date("G:i",strtotime($cas)); ?></td>
                    </tr>
                    <tr>
                        <td>Ubytování:</td>
                        <td>
                            <?php
                            if($ubytovani == "1") {
                                echo "Ano";
                            } else if ($ubytovani == "0") {
                                echo "Ne";
                            } 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td>
                            <?php
                            if($status == "new") {
                                echo "nová";
                            } else if ($status == "paid") {
                                echo "archivovaná";
                            } 
                            ?>
                        </td>
                    </tr>
                </table>

                <?php
                    if(!empty($zprava)){
                ?>
                    <div class="alert alert-info" role="alert">
                        <?php echo "<strong>Zpráva: </strong>".$zprava; ?>
                    </div>
                <?php
                    }
                ?>

                <?php
                if($status == "new"){
                ?>
                    <button class="btn btn-info hidden-print mb-4 p-3" onclick="myPrint()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Tisk</button>
                    &emsp;
                    &emsp;

                    <a href="php/potvrdit_platbu.php?id=<?php echo $id_objednavky; ?>" class="btn btn-success mb-4 p-3" alt="Archivovat" onclick="return confirm('Archivovat objednávku?')">Archivovat</a>
                    &emsp;
                    &emsp;

                <?php } else { ?>      
                    <button class="btn btn-info hidden-print mb-4 p-3" onclick="myPrint()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Tisk</button>
                    &emsp;
                    &emsp;
                <?php } ?>     
            </div>
        </div>
    </div>
</div>

<script>
function myPrint() {
    window.print();
}
</script>

<?php
  include_once("footer.php");
?>
