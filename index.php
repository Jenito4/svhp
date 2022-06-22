<?php
    $title = "SVHP | výcvikové kurzy";
    include_once("header.php");

    $sql = "SELECT * FROM kurzy LIMIT 1";
    if($query = mysqli_query($conn, $sql)){
        while($row = mysqli_fetch_array($query)){
            echo $row["nazev"];
        }
    } else{
        echo mysqli_error($conn);
    }
?>

<!-- Page content -->

   
  
  <!-- Automatic Slideshow Images -->      
  
<div class="back d-none d-lg-block">     
    <div class="textFoto text-center w-25 mb-3">
        <div class="card-body text-block">
            <p class="card-title">Sdružení výrobců hasicích přístrojů</p>
            <span class="d-flex justify-content-center h2Kontakt pb-3"></span> 
            <p class="card-text">Nabízí výcvikové kurzy pro kontrolory hasicích přístrojů</p>
            <a href="kurzy.php" title="SVHP - seminář" class="button">Objednat kurz!</a>
        </div>
    </div>  
    <div class="bottom-right">
        <p class="card-text-kunka">Kunětická hora - dominanta kraje</p>
    </div>      
</div>

  
  <!-- The Band Section -->
<div class="sortimentDiv">
    <div class="container">
        <div class="pagePaddingSmall">
            <div class="row">
                <div class="col-md-4">       
                    <div class="card shadow p-1 mb-5">
                        <!-- <img class="card-img" src="img/metr2.png" alt="SK Design - postup1">     -->
                        <span class="card-body">
                            <h3 class="card-title textKarty">Výcvikové kurzy</h3>
                            <p class="card-text karta">Nabízíme profesní vzdělání</p>
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-1 mb-5">
                        <span class="card-body">
                            <h3 class="card-title textKarty underline">Lektoři</h3>
                            <p class="card-text karta">Lidé s praxí a zkušeností</p>
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-1 mb-5">
                        <span class="card-body">
                            <h3 class="card-title textKarty">Zaměření</h3>
                            <p class="card-text karta">Výcvikové kurzy kontrolorů HP</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>  

<div class="onas" id="onas">
    <div class="container">
        <div class="pagePaddingSmall"> 
            <?php
            $sql = "SELECT * FROM oznameni";
            if($query = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($query) > 0){
                    while($row = mysqli_fetch_array($query)){
                        ?>
                        <div class='clickable-row alert alert-danger'>
                            <h2>Oznámení</h2>
                            <hr>
                            <h3 class="alert-heading" style="text-align:center"><?php echo $row["nazev"]; ?></h3>
                            <p style="text-align:center"><?php echo $row["obsah"]; ?></p>
                        </div>
                        <?php
                    }
                } else {
                }
            } else {
            echo mysqli_error($conn);
            }
        ?>
        </div>
    </div>
</div> 

<div class="onas">
    <div class="container">
        <div class="pagePaddingSmall"> 
            <div class="col-md-6">
                <img src="foto/svhp.jpg" class="imageStyle" alt="SVHP"> 
            </div>
            <div class="col-md-6 mt-5">
                <p class="aboutUs-title pl-5">O naší společnosti</p>
                <h1 class="main-title text-left pl-5 h1Nadpis">SVHP</h1> 
                        <p class="text-left text-top-mini pl-5">Sdružení výrobců hasicích přístrojů pořádá základní a obnovovací kurzy pro osoby provádějící kontroly hasicích přístrojů v souladu s právními předpisy, normativními požadavky a průvodní dokumentací výrobců. Absolvent školení získá oprávnění a certifikát k provádění kontrol hasicích přístrojů.</p>
                        <!-- <p class="triple-text text-left">Co nabízíme?</p> 
                        <span class="teckyKarty d-flex justify-content-center">&#8213;&#8213;&#8213;</span> 
                        <p class="text-left">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas temporibus harum officiis ratione iusto dolorum architecto neque maiores. Voluptatibus culpa expedita nam maiores quisquam. Soluta eum dolorem qui hic illo?</p> -->         
            </div>
        </div>
    </div>
</div>
 
  <!-- The Tour Section -->
<div class="karty">
    <div class="container">
        <div class="pagePaddingSmall"> 
            <h2 class="main-title text-center">Výcvikové kurzy</h2>
            <span class="d-flex justify-content-center h2Kontakt"></span>
            <br /><br />      
            <div class="row">
                <?php
                $sql="SELECT id_kurzy, nazev, cena, foto FROM kurzy";
                if($query = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($query) == 0) {
                        echo '<div class="col-xs-12 text-center">V současné době nenabízíme nové kurzy</div>';
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
                                    <figure><img src="/foto/<?php echo $foto; ?>" class="panel-img img-responsive" alt="<?php echo $row["nazev"]; ?> - SVHP"></figure>
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
</div>
  
<?php
    include_once("footer.php");
?>
