<?php
include_once("../../mysql_connect.php");

$id = (int)$_GET["id"];



$sqlSelect = "SELECT email, nazev FROM objednavky, kurzy WHERE id_objednavky = $id AND kurzy.id_kurzy = objednavky.id_kurzy";
if($querySelect = mysqli_query($conn, $sqlSelect)){
  while($row = mysqli_fetch_array($querySelect)){
    $email = $row["email"];
    $nazev = $row["nazev"];
  }
} else {
  echo mysqli_error($conn);
  die();
}

$sql = "DELETE FROM objednavky WHERE id_objednavky = $id";
if($query = mysqli_query($conn, $sql)){

    $to      = $email;
    $subject = 'Storno objednávky - SVHP';
    $message = "
      <html>
      <body>
      Dobrý den,<br>stornovali jsme Vaši objednávku kurzu <b>".$nazev."</b>.
      <br/>
      <br/>
      Sdružení výrobců hasicích přístrojů<br/>
  
      Srch 229, 533 52 Srch, areál Hastex & Haspr s.r.o.<br/>
  
      tel:  +420 774 734 999<br/>
  
      mail:  svhp@svhp.cz<br/>
  
      web: www.svhp.cz
      </body>
      </html>";
    $headers = "From: svhp@svhp.cz\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";

    mail($to, $subject, $message, $headers);



  header("location: ../objednavky.php?del=1");
} else {
  echo mysqli_error($conn);
  die();
}
?>
