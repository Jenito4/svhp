<?php
$jmeno = $_POST['jmeno'];
$email = $_POST['email'];
$zprava = $_POST['zprava'];
$telefon = $_POST['telefon'];

$recipient = "svhp@svhp.cz";
$subject = "Dotaz z webové stránky - SVHP";
$formcontent = "
    <html>
    <body>
    Jméno: <b>".$jmeno."</b> <br/><br/>
    Telefon: <b>".$telefon."</b> <br/><br/>
    Dotaz: $zprava
    </body>
    </html>";
$headers = "From: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
       
mail($recipient, $subject, $formcontent, $headers) or die("Chyba!");
header("location:/kontakt.php?ok=1");
echo "Thank You!";
?>  