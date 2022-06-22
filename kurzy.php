<?php
    $title = "Kurzy | SVHP";
    include_once("header.php");
?>

<!-- Page content -->
 
  <!-- The Tour Section -->
<div class="karty">
    <div class="container">
        <div class="pagePaddingAll"> 
            <h1>Výcvikové kurzy</h1>
            <span class="d-flex justify-content-center h2Footer"></span>   
            
            <p class="text-center text-top-mini bolder">Sdružení výrobců hasicích přístrojů není plátcem DPH.</p>
            <p class="text-center">Výcvikové kurzy se konají v Srchu 229 u Starého Hradiště (okres Pardubice) v sídle společnosti Hastex & Haspr s.r.o. — učebna 1. patro. <br>V případě většího počtu zájemců o školení z jedné lokality je možné uskutečnit výcvikový kurz na dohodnutém místě (min. 10 účastníků).<br>Sdružení výrobců hasicích přístrojů si vyhrazuje právo možnosti změn termínů výcvikových kurzů, o čemž bude v dostatečném předstihu případné zájemce informovat.</p>
            <br /><br />

            <?php
            $sql="SELECT id_kurzy, nazev, cena, foto FROM kurzy";

            if($query = mysqli_query($conn, $sql)){
             if(mysqli_num_rows($query) == 0) {
             echo '<div class="col-xs-12 text-center">V současné době nenabízíme nové kurzy</div><br>';
             }
              while($row = mysqli_fetch_array($query)){
                if(strlen($row["foto"]) > 0){
                    $foto = $row["foto"];
                  } else {
                    $foto = "default_seminar.jpg";
                  }
                ?>

                <div class="col-md-6">
                        <a href="kurz.php?id=<?php echo $row["id_kurzy"]; ?>" class="productHover">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <figure><img src="/foto/<?php echo $foto; ?>" class="img-responsive" alt="<?php echo $row["nazev"]; ?> - SVHP"></figure>
                                </div>
                                <div class="panel-footer">
                                    <?php echo $row["nazev"]; ?>
                                    <div class="priceInProductPrint">
                                        <?php echo $row["cena"]." Kč"; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php
              }
            } else {
              echo mysqli_error($conn);
            }
          ?>

        </div>
    </div>  
</div>
    
<?php
    include_once("footer.php");
?>
