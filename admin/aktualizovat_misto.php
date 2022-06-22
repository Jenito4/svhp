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
  $count = "SELECT COUNT(id_seminare) FROM seminar WHERE id_mista = $id_mista";
  
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
            <div class="col-lg-8 col-lg-offset-2 seminaryDetails">
                <h1>Aktualizace Místa</h1>
                <span class="d-flex justify-content-center h2Footer"></span>
                <div class="pageText">
                    <form enctype="multipart/form-data" action="php/aktualizace_misto.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id_mista; ?>">
                        <div class="col-sm-12">
                            <table class="table">
                                <tr class="bolder">
                                    <td>Místo konání:</td>
                                    <td><input name="nazevmista" class="form-control" type="text" id="nazevmista" value="<?php echo $nazevmista; ?>" size="150" required /></td>
                                </tr>  
                                <tr class="bolder">
                                    <td>Ulice:</td>
                                    <td><input name="ulice" class="form-control" type="text" id="ulice" value="<?php echo $ulice; ?>" size="15" required /></td>
                                </tr>
                                <tr class="bolder">
                                    <td>Město:</td>
                                    <td><input name="mesto" class="form-control" type="text" id="mesto" value="<?php echo $mesto; ?>" size="15" required /></td>
                                </tr>
                                <tr class="bolder">
                                    <td>PSČ</td>
                                    <td><input name="psc" class="form-control" type="text" id="psc" value="<?php echo $psc; ?>" size="15" required /></td>
                                </tr>
                                <tr class="bolder">
                                    <td>Popisek</td>
                                    <td><input name="popisek" class="form-control" type="text" id="popisek" value="<?php echo $popisek; ?>" size="15" required /></td>
                                </tr>
                            </table>
                        <input class="btn btn-primary" type="submit" value="Aktualizovat" /><br /><br />
                        </div>
                    </form>                       
                </div>
            </div>
        </div>
    </div>
</div>

<?php
  include_once("footer.php");
?>
