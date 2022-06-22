<?php
  $title = "Kontakt | SVHP";
  include_once("header.php");
?>

<div class="karty" id="tour">
    <div class="container">
        <div class="pagePaddingAll">      
            <h1>KONTAKT</h1> 
            <span class="d-flex justify-content-center h2Footer"></span> 
            <br /><br />
            
            <?php
            if(isset($_GET["ok"])){
            ?>
            <div class="alert alert-success d-flex justify-content-center font-weight-bold" role="alert">
                <p>Děkujeme za dotaz! Budeme se Vám snažit co nejdříve odpovědět.</p>
            </div>
            <?php
            }
            ?>
    
            <div class="row">
                <div class="col-md-6">
                    <h2 class="h2Footer pl-5">Alena Cuberková</h2>
                        <ul class="pFooter pl-5">
                            <li class="space"><i class="biKontakt bi-telephone-fill pr-3"></i> +420 774 734 999</li>
                            <li class="space"><i class="biKontakt bi-telephone-fill pr-3"></i> +420 777 595 606</li>
                            <li class="space"><i class="biKontakt bi-envelope-fill pr-3"></i> svhp@<!-- -->svhp.cz</li> 
                            <li class="space"><i class="biKontakt bi-geo-alt-fill pr-3"></i>
                            Školící středisko: 
                                <ul class="pFooter pl-5">
                                    <li class="space">Srch 229, 533 52 Staré Hradiště (okres Pardubice)</li>
                                </ul>
                            </li>
                            <li class="space"><i class="biKontakt bi-geo-alt-fill pr-3"></i>
                            Sídlo: 
                                <ul class="pFooter pl-5">
                                    <li class="space">Gen. Svobody 329, 533 51 Pardubice - Rosice nad Labem</li>
                                </ul>
                            </li>    
                        </ul>
                </div>
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2560.0605884768!2d15.759447715718192!3d50.08515247942661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470dcd4a5806c9af%3A0x7238625c0b634c0d!2sHASTEX%20%26%20HASPR%20s.r.o.!5e0!3m2!1scs!2scz!4v1653320573038!5m2!1scs!2scz" width="100%" height="450" style="border:1px solid #A50113" allowfullscreen="" loading="lazy"></iframe>  
                    
                </div>
            </div>
                <br /><br />
            <div class="row">
                <div class="col-md-6">
                    <h2 class="h2Footer pl-5">Napište nám!</h2>
                    <p class="text-top-mini pl-5">Máte nějaký dotaz? Nebojte se nám napsat nebo zavolat.</p>
                </div>
                <div class="col-md-6">
                    <form action="/php/mail.php" method="post">
                        <input type="text" class="form-control" name="jmeno" placeholder="Jméno a příjmení..." required /><br />
                        <input type="tel" class="form-control" name="telefon" minlength="9" maxlength="16" placeholder="Telefon..." required /><br />
                        <input type="email" class="form-control" name="email" placeholder="E-mail..." required /><br />
                        <textarea name="zprava" class="form-control" name="zprava" placeholder="Jaký je váš dotaz?" maxlength="200" style="height:150px;" required></textarea><br />
                        <div class="text-center">
                        <button class="button" type="submit" value="ODESLAT">ODESLAT</button><br /><br />
                        </div>
                    </form>
                </div>
            </div>  
            <div class="col-sm">
            </div>           
        </div>
    </div>
</div>
  
<?php
  include_once("footer.php");
?>