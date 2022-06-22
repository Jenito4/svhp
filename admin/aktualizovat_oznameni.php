<?php
  $title = "Oznámení | SVHP";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_oznameni = (int)$_GET["id"];

  $id_oznameni = (int)$_GET["id"];
  $sql = "SELECT * FROM oznameni WHERE oznameni.id_oznameni = $id_oznameni";
  
  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $nazev = $row["nazev"];
      $obsah = $row["obsah"];

      
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
                <h1>Aktualizace oznámení</h1>
                <span class="d-flex justify-content-center h2Footer"></span>
                <div class="pageText">
                    <form enctype="multipart/form-data" action="php/aktualizace_oznameni.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id_oznameni; ?>">
                        <div class="col-sm-12">
                            <table class="table">
                                <tr class="bolder">
                                    <td>Název:</td>
                                    <td><input name="nazev" class="form-control" type="text" id="nazev" value="<?php echo $nazev; ?>" size="150" required /></td>
                                </tr>
                                <tr class="bolder">
                                    <td>Obsah:</td>
                                    <td><textarea name="obsah" class="form-control" id="obsah" rows="4" cols="50"><?php echo $obsah; ?></textarea></td>
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
