<?php
  $title = "Objedávka dokončena | SVHP";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_objednavky = (int)$_GET["id"];
  $sql = "SELECT * FROM objednavky AS o, kurzy AS k, terminy AS t, mista AS m WHERE o.id_objednavky = $id_objednavky AND k.id_kurzy = o.id_kurzy AND t.id_kurzy = k.id_kurzy AND m.id_mista = t.id_mista";

  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $cena = $row["cena"];
      $nazevKurzy = $row["nazev"];
      $datumOd = $row["datumOd"];
      $datumDo = $row["datumDo"];
      $cas = $row["cas"];
      $jmeno = $row["jmeno"];
      $prijmeni = $row["prijmeni"];
      $email = $row["email"];
      $telefon = $row["telefon"];
      $ico = $row["ico"];
      $ubytovani = $row["ubytovani"];
      $nazevMista = $row["nazevmista"];
      $mesto = $row["mesto"];
      $ulice = $row["ulice"];
      $psc = $row["psc"];
    }
  } else {
    echo mysqli_error($conn);
    die();
  }
?>

<div class="container">
    <div class="pagePaddingAll">
        <h1>Objednávka dokončena</h1>
        <span class="d-flex justify-content-center h2Footer"></span> 
         <p class="text-center text-top-mini bolder">Zálohovou fakturu s údaji pro uhrazení Vám pošleme cca 14 dní před konáním kurzu na uvedený e-mail.<br />Děkujeme za důvěru a těšíme se na Vás na kurzu.</p><br /><br />
         <div class="col-sm-1">
         </div>
         <div class="col-sm-5">
            <table class="table bolder">
                <tr>
                    <td>Jméno: </td>
                    <td><?php echo $jmeno." ".$prijmeni; ?></td>
                </tr>
                <tr>
                    <td>Telefon: </td>
                    <td><?php echo $telefon; ?></td>
                </tr>
                <tr>
                    <td>E-mail: </td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>IČO: </td>
                    <td><?php echo $ico; ?></td>
                </tr>
                <tr>
                    <td>Ubytování: </td>
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
            </table>
        </div>
        <div class="col-sm-5">
            <table class="table bolder">
                <tr>
                    <td>Kurz: </td>
                    <td><?php echo $nazevKurzy; ?></td>
                </tr>
                <tr>
                    <td>Cena: </td>
                    <td><?php echo $cena; ?> Kč</td>
                </tr>
                <tr>
                    <td>Datum: </td>
                    <td><?php echo date_format(date_create($datumOd), "j. n. Y").' - '.date_format(date_create($datumDo), "j. n. Y"); ?></td>
                </tr>
                <tr>
                    <td>Zahájení: </td>
                    <td><?php echo date("G:i",strtotime($cas)); ?></td>
                </tr>
                <tr>
                    <td>Ulice: </td>
                    <td><?php echo $ulice; ?></td>
                </tr>
                <tr>
                    <td>Město: </td>
                    <td><?php echo $mesto; ?></td>
                </tr>
                <tr>
                    <td>PSČ: </td>
                    <td><?php echo $psc; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-1">
        </div>
    </div>
</div>
<?php
  include_once("footer.php");
?>
