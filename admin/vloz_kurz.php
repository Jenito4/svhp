<?php
    $title = "Vložit nový kurz | SVHP";
    include_once("header.php");
?>
<div class="container">
    <div class="pagePadding">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 seminaryDetails">
                <h1>Vložení kurzu</h1>
                <span class="d-flex justify-content-center h2Footer"></span>
                <div class="pageText">
                    <form enctype="multipart/form-data" action="php/vloz_kurz_skript.php" method="post">
                        <fieldset>
                            <div class="col-md-12">
                                <label for="SemName">Název kurzu:* </label><br>
                                    <input type="text" class="form-control" name="SemName" id="SemName" required /><br />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  for="SemText">Popis kurzu:* </label><br>
                                        <textarea class="form-control" name="SemText" id="SemText"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="SemCena">Cena za osobu:* </label><br>
                                    <input type="number" class="form-control" name="SemCena" id="SemCena" min=1 max=100000 required /><br />
                                    <input class="btn btn-primary" type="submit" value="Vložit" /><br />
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
