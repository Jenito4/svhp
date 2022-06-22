<?php
    $title = "Místa | SVHP";
    include_once("header.php");
?>

<div class="container">
<div class="pagePadding">
  <div class="row seminaryDetails">

    <div class="col-sm-12">

        <h1>Místa</h1>
        <span class="d-flex justify-content-center h2Footer"></span>
        <br /><br />
        
        <a href="vloz_misto.php" class="btn btn-primary" alt="Vložit"><span class="glyphicon glyphicon-plus"></span> Přidat nový</a><br><br>
        <?php
        $sql = "SELECT * FROM mista";
        if($query = mysqli_query($conn, $sql)){
          if(mysqli_num_rows($query) > 0){
            echo "<div class='table-responsive'>\n
            <table class='table'>\n
              <tr>
                <th>Místo konání</th>
                <th>Město</th>
                <th>Ulice</th>
                <th>PSČ</th>
                <th>Popisek</th>
              </tr>\n";

              while($row = mysqli_fetch_array($query)){
                  ?>
                  <tr class='clickable-row alert alert-info' data-href='misto.php?id=<?php echo $row["id_mista"] ?>' style="cursor: pointer;">
              
                  <td><?php echo $row["nazevmista"]; ?></td>
                  <td><?php echo $row["mesto"]; ?></td>
                  <td><?php echo $row["ulice"]; ?></td>
                  <td><?php echo $row["psc"]; ?></td>
                  <td><?php echo $row["popisek"]; ?></td>
                </tr>
                <?php
              }

            echo "</table>\n
            </div>\n";
          } else {
            echo "Žádná nová místa";
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
