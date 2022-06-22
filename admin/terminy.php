<?php
    $title = "Termíny | SVHP";
    include_once("header.php");
?>

<div class="container">
<div class="pagePadding">
  <div class="row seminaryDetails">

    <div class="col-sm-12">

        <h1>Termíny</h1>
        <span class="d-flex justify-content-center h2Footer"></span>
        <br /><br />
        
        <a href="vloz_termin.php" class="btn btn-primary" alt="Vložit"><span class="glyphicon glyphicon-plus"></span> Přidat nový</a><br><br>
        <?php
        $sql = "SELECT id_terminy, datumOd, datumDo, cas, nazev, nazevmista  FROM kurzy, terminy, mista
        WHERE terminy.id_kurzy = kurzy.id_kurzy AND mista.id_mista = terminy.id_mista 
        ORDER BY datumOd";
        if($query = mysqli_query($conn, $sql)){
          if(mysqli_num_rows($query) > 0){
            echo "<div class='table-responsive'>\n
            <table class='table'>\n
              <tr>
                <th>Název</th>
                <th>Datum</th>
                <th>Čas</th>
                <th>Místo</th>
              </tr>\n";

              while($row = mysqli_fetch_array($query)){
                  $datumPorovnani = $row["datumOd"];
                  $datumPorovnani = new DateTime($datumPorovnani);
                  $dnes = new DateTime();
                  if ($datumPorovnani <= $dnes){    
                  ?>
                    <tr class='clickable-row alert alert-danger' data-href='termin.php?id=<?php echo $row["id_terminy"] ?>' style="cursor: pointer;">
                    <?php
                  } else {
                    ?>
                    <tr class='clickable-row alert alert-info' data-href='termin.php?id=<?php echo $row["id_terminy"] ?>' style="cursor: pointer;">
                    <?php
                  }
                    ?>
                  <td><?php echo $row["nazev"]; ?></td>  
                  <td><?php echo date_format(date_create($row["datumOd"]), "j. n. Y").' - '.date_format(date_create($row["datumDo"]), "j. n. Y"); ?></td>
                  <td><?php echo date_format(date_create($row["cas"]), "H:i"); ?></td>
                  <td><?php echo $row["nazevmista"]; ?></td>  
                </tr>
                <?php
              }

            echo "</table>\n
            </div>\n";
          } else {
            echo "Žádné nové termíny";
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
