<?php
  $title = "Vložit nové oznámení | SVHP";
  include_once("header.php");
?>

<div class="container">
    <div class="pagePadding">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 seminaryDetails">
                <h1>Vložení oznámení</h1>
                <span class="d-flex justify-content-center h2Footer"></span>
                <div class="pageText">
                    <form action="php/vloz_oznameni_skript.php" method="post">
                        <fieldset>
                            <div class="col-md-12">
                                <label for="OznameniNazev">Název:* </label><br>
                                    <input type="text" class="form-control" id="OznameniNazev" name="OznameniNazev" placeholder="Název oznámení..." required/><br />
                            </div>                   
                            <div class="col-md-12"> 
                                <label  for="OznameniObsah">Obsah:* </label><br>
                                <textarea class="form-control" id="OznameniObsah" name="OznameniObsah" placeholder="Obsah oznámení..." style="height:8em;"></textarea><br />  
                                    <input class="btn btn-primary" type="submit" value="Vložit" />
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once("footer.php");
?>
