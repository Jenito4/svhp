<?php
  $title = "Místo | SVHP";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_mista = (int)$_GET["id"];

  $id_mista = (int)$_GET["id"];
  $sql = "SELECT * FROM mista WHERE mista.id_mista = $id_mista";
  $count = "SELECT COUNT(id_kurzy) FROM kurzy WHERE id_mista = $id_mista";

  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $nazevmista = $row["nazevmista"];
      $mesto = $row["mesto"];
      $ulice = $row["ulice"];
      $psc = $row["psc"];
      $popisek = $row["popisek"];


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
            <td>Místo konání:</td>
            <td><?php echo $nazevmista; ?></td>
          </tr>
          <tr class="bolder">
            <td>Ulice:</td>
            <td><?php echo $ulice; ?></td>
          </tr>
          <tr class="bolder">
            <td>Město:</td>
            <td><?php echo $mesto; ?></td>
          </tr>
          <tr class="bolder">
            <td>PSČ</td>
            <td><?php echo $psc; ?></td>
          </tr>
          <tr class="bolder">
            <td>Popisek</td>
            <td><?php echo $popisek; ?></td>
          </tr>
        </table>

        <a href="aktualizovat_misto.php?id=<?php echo $id_mista; ?>" class="btn btn-success mb-4" alt="Aktualizovat místo">Aktualizovat místo</a>
        &emsp;
        &emsp;
        
        <?php
          $sql = "SELECT COUNT(id_terminy) AS pocet FROM terminy WHERE id_mista = $id_mista";
          if($q = mysqli_query($conn, $sql)){
            while($r = mysqli_fetch_array($q)){
              $pocet = $r["pocet"];
            }
            if($pocet == 0) {
              ?>
              <a href="php/smazat_misto.php?id=<?php echo $id_mista; ?>" class="btn btn-danger mb-4" alt="Smazat místo" onclick="return confirm('Smazat toto místo?')">Smazat místo</a>
              <?php
            }
          } else {
            echo mysqli_error($conn);
          }
        ?>
        

      </div>

  </div>
</div>
</div>

<?php
  include_once("footer.php");
?>
