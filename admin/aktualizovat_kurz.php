<?php
  $title = "Kurz | SVHP";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_kurzy = (int)$_GET["id"];

  $id_kurzy = (int)$_GET["id"];
  $sql = "SELECT * FROM kurzy WHERE id_kurzy = $id_kurzy";

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
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 seminaryDetails">
                <h1>Aktualizace kurzu</h1>
                <span class="d-flex justify-content-center h2Footer"></span>
                <div class="pageText">
                    <form enctype="multipart/form-data" action="php/aktualizace_kurzy.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id_kurzy; ?>">
                        <fieldset>
                            <div class="col-md-12">
                                <label for="SemName">Název kurzu:* </label><br>
                                    <input type="text" class="form-control" name="SemName" id="SemName" value="<?php echo $nazevKurzy; ?>" required /><br />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  for="SemText">Popis kurzu:* </label><br>
                                        <textarea class="form-control" name="SemText" id="SemText"><?php echo $popis; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="SemCena">Cena za osobu:* </label><br>
                                    <input type="number" class="form-control" name="SemCena" id="SemCena" min=1 max=100000 value="<?php echo $cena; ?>" required /><br />
                                    <input class="btn btn-primary" type="submit" value="Aktualizovat" />
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  
<script>tinymce.init({selector:'textarea'});</script>

<?php
  include_once("footer.php");
?>
