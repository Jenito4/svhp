<?php
    $title = "Admin | SVHP";
    include_once("header.php");
?>

<div class="container">
<div class="pagePadding">
  <div class="row">

    <div class="col-sm-12 seminaryDetails">

        <h1>Nové objednávky</h1>
        <span class="d-flex justify-content-center h2Footer"></span>
        <br /><br />

        <?php
        $sql = "SELECT id_objednavky, jmeno, prijmeni, nazev, datum_objednani, status, datumOd, datumDo, ico FROM kurzy, terminy, objednavky
          WHERE status <> 'paid' AND kurzy.id_kurzy = objednavky.id_kurzy AND terminy.id_terminy = objednavky.id_terminy
          ORDER BY id_objednavky DESC";
        if($query = mysqli_query($conn, $sql)){
          if(mysqli_num_rows($query) > 0){
            echo "<div class='table-responsive'>\n
            <table class='table'>\n
              <tr>
                <th>Stav</th>
                <th>Kurz</th>
                <th>Datum kurzu</th>
                <th>Objednání</th>
                <th>Jméno</th>
                <th>IČO</th>
              </tr>\n";

              while($row = mysqli_fetch_array($query)){
                if($row["status"] == "new"){
                  ?>
                  <tr class='clickable-row alert alert-success' data-href='objednavka.php?id=<?php echo $row["id_objednavky"] ?>' style="cursor: pointer;">
                <?php
                  } else {
                ?>
                  <tr class='clickable-row alert alert-warning' data-href='objednavka.php?id=<?php echo $row["id_objednavky"] ?>' style="cursor: pointer;">
                <?php
                  }
                ?>

                  <td>
                    <?php
                      if($row["status"] == "new") {
                        echo "nová";
                      } else {
                        if ($row["status"] == "paid") {
                        echo "zaplacená";
                        } 
                      }

                    ?>
                  </td>
                  <td><?php echo $row["nazev"]; ?></td>
                  <td><?php echo date_format(date_create($row["datumOd"]), "j. n. Y").' - '.date_format(date_create($row["datumDo"]), "j. n. Y"); ?></td>
                  <td><?php echo date_format(date_create($row["datum_objednani"]), "j. n. Y"); ?></td>
                  <td><?php echo $row["jmeno"].' '.$row["prijmeni"]; ?></td>
                  <td><?php echo $row["ico"]; ?></td>
                </tr>
                <?php
              }

            echo "</table>\n
            </div>\n";
          } else {
            echo "Žádné nové objednávky";
          }
        } else {
          echo mysqli_error($conn);
        }
        ?>

    </div>
  </div>
</div>
</div>


<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

<?php
    include_once("footer.php");
?>
