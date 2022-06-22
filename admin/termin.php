<?php
  $title = "Termín | SVHP";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_terminy = (int)$_GET["id"];

  $id_terminy = (int)$_GET["id"];
  $sql = "SELECT * FROM terminy, kurzy, mista WHERE terminy.id_terminy = $id_terminy AND kurzy.id_kurzy = terminy.id_kurzy AND mista.id_mista = terminy.id_mista";

  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $nazevKurzy = $row["nazev"];
      $nazevMista = $row["nazevmista"];
      $datumOd = date_format(date_create($row["datumOd"]), "j. n. Y");
      $datumDo = date_format(date_create($row["datumDo"]), "j. n. Y");
      $cas = date_format(date_create($row["cas"]), "H:i");
    }
  } else {
    echo mysqli_error($conn);
    die();
  }
?>

<div class="container">
  <div class="pagePadding">
    <div class="row">
      <div class="col-sm-1">
      </div>
      <div class="col-sm-5 seminaryDetails pt-5">
        <table class="table">
          <tr class="bolder">
            <td>Název kurzu:</td>
            <td><?php echo $nazevKurzy; ?></td>
          </tr>
          <tr class="bolder">
            <td>Datum:</td>
            <td><?php echo $datumOd.' - '.$datumDo; ?></td>
          </tr>
          <tr class="bolder">
            <td>Čas:</td>
            <td><?php echo $cas; ?></td>
          </tr>
          <tr class="bolder">
            <td>Místo:</td>
            <td><?php echo $nazevMista; ?></td>
          </tr>
        </table>

        <a href="aktualizovat_termin.php?id=<?php echo $id_terminy; ?>" class="btn btn-success mb-4" alt="Aktualizovat termín">Aktualizovat termín</a>
        &emsp;
        &emsp;

        <!-- <?php
          $sql = "SELECT COUNT(id_objednavky) AS pocet FROM objednavky WHERE id_terminy = $id_terminy";
          if($q = mysqli_query($conn, $sql)){
            while($r = mysqli_fetch_array($q)){
              $pocet = $r["pocet"];
            }
            if($pocet == 0) {
              ?>
              <a href="php/smazat_termin.php?id=<?php echo $id_terminy; ?>" class="btn btn-danger mb-4" alt="Smazat termín" onclick="return confirm('Smazat tento termín?')">Smazat termín</a>
              <?php
            }
          } else {
            echo mysqli_error($conn);
          }
        ?> -->

        <br />
        <br />
      </div>
    </div>
  </div>
</div>

<?php
  include_once("footer.php");
?>
