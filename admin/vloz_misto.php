<?php
  $title = "Vložit nové místo | SVHP";
  include_once("header.php");
?>

<div class="container">
    <div class="pagePadding">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 seminaryDetails">
                <h1>Vložení místa konání</h1>
                <span class="d-flex justify-content-center h2Footer"></span>
                <div class="pageText">
                    <form action="php/vloz_mista_skript.php" method="post">
                        <fieldset>
                            <div class="col-md-12">
                                <label for="MistoNazev">Místo konání:* </label><br>
                                    <input type="text" class="form-control" id="MistoNazev" name="MistoNazev" placeholder="Název místa např.: Sídlo společnosti.." required/><br />
                            </div>  
                            <div class="col-md-12">
                                <label for="MistoAdresa">Adresa:* </label><br>
                                    <input type="text" class="form-control" id="MistoAdresa" name="MistoAdresa" placeholder="Adresa a číslo popisné..." required/><br />
                            </div>
                            <div class="col-md-5">
                                <label for="MistoPSC">PSČ:* </label><br>
                                    <input type="text" class="form-control" id="MistoPSC" name="MistoPSC" required><br />
                            </div>
                            <div class="col-md-7">
                                <label for="MistoMesto">Město:* </label><br>
                                    <input type="text" class="form-control" id="MistoMesto" name="MistoMesto" required /><br />
                            </div>
                            <div class="col-md-12">
                            <label  for="MistoPopisek">Popisek: </label><br>
                                <textarea class="form-control" id="MistoPopisek" name="MistoPopisek" placeholder="Upřesnění např.: první vchod vlevo" style="height:8em;"></textarea><br />
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
