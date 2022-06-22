<?php
include_once("mysql_connect.php");

if(!isset($_GET["id"])){
  header("location: index.php");
  die();
}

$id = (int)$_GET["id"];

$sql = "SELECT * FROM kurzy WHERE id_kurzy = $id";

if($query = mysqli_query($conn, $sql)){
  if(mysqli_num_rows($query) == 0){
    header("location: index.php");
    die();
  }
  while($row = mysqli_fetch_array($query)){
    $nazev = $row["nazev"];
    $popis = $row["popis"];
    $cena = $row["cena"];
  }
} else {
  echo mysqli_error($conn);
  die();
}

$title = $nazev." | SVHP";

include_once("header.php");
?>


<div class="karty" id="tour">
  <div class="container">
    <div class="pagePaddingAll">
      <div class="row">
        <div class="col-sm-7 pr-5">
          <h1 class="seminarHeading text-left"><?php echo $nazev."\n"; ?></h1>
          <br>
          <div class="pr-5">
            <?php echo $popis."\n"; ?>
          </div>
        </div>

        <div class="col-sm-5 seminaryDetails">
          <!-- <form method="get" action="objednat.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Objednat" class="btn btn-primary btn-block objednatSeminar">
          </form> -->
          <br>
          <table class="table">
            <tr class="bolder">
              <td>Cena: </td>
              <td><?php echo $cena; ?> Kč</td>
            </tr>
            
            <?php
                    $sql = "SELECT id_terminy, datumOd, datumDo, cas, nazevmista, mesto, ulice, popisek FROM kurzy, terminy, mista
                    WHERE terminy.id_kurzy = kurzy.id_kurzy AND mista.id_mista = terminy.id_mista AND kurzy.id_kurzy = $id AND datumOd >= CURDATE()
                    ORDER BY datumOd";
                    if($query = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($query) > 0){
                        echo "
                        <tr>
                            <th>Datum:</th>
                            <th>Čas:</th>
                            <th>Místo:</th>
                        </tr>";

                        while($row = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                        
                            <td><?php echo date_format(date_create($row["datumOd"]), "j. n. Y").' - '.date_format(date_create($row["datumDo"]), "j. n. Y"); ?></td>
                            <td><?php echo date_format(date_create($row["cas"]), "H:i"); ?></td>
                            <td><?php echo ($row["nazevmista"]); ?></td>
                            </tr>
                            <?php
                        }

                        echo "</table>\n";
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
                     
          </table>
          <form method="get" action="objednat.php" class="text-center">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Objednat" class="button">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>






<?php
include_once("footer.php");
?>
