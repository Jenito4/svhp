<?php
  $title = "Kurz | SVHP";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: admin/index.php");
    die();
  }

  $id_kurzy = (int)$_GET["id"];

  $id_kurzy = (int)$_GET["id"];
  $sql = "SELECT * FROM kurzy WHERE kurzy.id_kurzy = $id_kurzy";

  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $nazevKurzy = $row["nazev"];
      $popis = $row["popis"];
      $cena = $row["cena"];

    }
  } else {
    echo mysqli_error($conn);
    die();
  }
?>

<div class="container">
    <div class="pagePadding">
        <div class="row seminaryDetails">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-5 pr-5 pt-5">
                <table class="table bolder">
                    <tr>
                        <td>Kurz:</td>
                        <td><?php echo $nazevKurzy; ?></td>
                    </tr>
                    <tr>
                        <td>Cena: </td>
                        <td><?php echo $cena; ?> Kč</td>
                    </tr>
                </table>
                <?php
                    $sql = "SELECT id_terminy, datumOd, datumDo, cas, nazevmista FROM kurzy, terminy, mista
                    WHERE terminy.id_kurzy = kurzy.id_kurzy AND mista.id_mista = terminy.id_mista AND kurzy.id_kurzy = $id_kurzy AND datumOd >= CURDATE()
                    ORDER BY datumOd";
                    if($query = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($query) > 0){
                        echo "<div class='table-responsive'>\n
                        <table class='table'>\n
                        <tr>
                            <th>Datum</th>
                            <th>Čas</th>
                            <th>Místo</th>
                        </tr>\n";

                        while($row = mysqli_fetch_array($query)){
                            ?>
                            <tr class='clickable-row alert alert-info' data-href='termin.php?id=<?php echo $row["id_terminy"] ?>' style="cursor: pointer;">
                        
                            <td><?php echo date_format(date_create($row["datumOd"]), "j. n. Y").' - '.date_format(date_create($row["datumDo"]), "j. n. Y"); ?></td>
                            <td><?php echo date_format(date_create($row["cas"]), "H:i"); ?></td>
                            <td><?php echo($row["nazevmista"]); ?></td>
                            </tr>
                            <?php
                        }

                        echo "</table>\n
                        </div>\n";
                    } else {
                        echo "
                        <table class='table'>
                            <tr class='bolder'>
                                <td>Datum:</td>
                                <td>Čas:</td>
                                <td>Místo:</td>
                            </tr>
                            <tr class='bolder'>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                            </tr>
                        </table>";
                    }
                    } else {
                    echo mysqli_error($conn);
                    }
                    ?>

                <a href="aktualizovat_kurz.php?id=<?php echo $id_kurzy; ?>" class="btn btn-success mb-4 p-3" alt="Aktualizovat kurz">Aktualizovat kurz</a>
                &emsp;
                &emsp;

                <a href="pridat_termin.php?id=<?php echo $id_kurzy; ?>" class="btn btn-primary mb-4 p-3" alt="Přidat termín">Přidat termín</a>
                &emsp;
                &emsp;
            
            </div>
            <div class="col-sm-5 pt-5">
                <?php
                    if(!empty($popis)){
                ?>
                    <div class="alert alert-info" role="alert">
                        <?php echo "<strong>Program: </strong>".$popis; ?>
                    </div>
                <?php
                    }
                ?>
            </div>
            <div class="col-sm-1">
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
