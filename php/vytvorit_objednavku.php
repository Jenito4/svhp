<?php
include_once("../mysql_connect.php");

$error = false;

if(isset($_POST["id_kurzy"])){
 $id_kurzy = mysqli_real_escape_string($conn, $_POST["id_kurzy"]);
} else {
  $error = true;
}

if(isset($_POST["KurzDate"]) && strlen(trim($_POST["KurzDate"])) > 0){
    $KurzDate = mysqli_real_escape_string($conn, $_POST["KurzDate"]);
} else {
    $error = true;
}

if(isset($_POST["billingFirstName"]) && strlen(trim($_POST["billingFirstName"])) > 0){
 $billingFirstName = mysqli_real_escape_string($conn, $_POST["billingFirstName"]);
} else {
  $error = true;
}

if(isset($_POST["billingSurname"]) && strlen(trim($_POST["billingFirstName"])) > 0){
  $billingSurname = mysqli_real_escape_string($conn, $_POST["billingSurname"]);
} else {
  $error = true;
}

if(isset($_POST["billingPhone"]) && strlen(trim($_POST["billingPhone"])) >= 9 && strlen(trim($_POST["billingPhone"])) <= 22){
  $billingPhone = mysqli_real_escape_string($conn, $_POST["billingPhone"]);
} else {
  $error = true;
}

if(isset($_POST["billingEmail"]) && filter_var($_POST["billingEmail"], FILTER_VALIDATE_EMAIL)){
  $billingEmail = mysqli_real_escape_string($conn, $_POST["billingEmail"]);
} else {
  $error = true;
}

if(isset($_POST["billingICO"]) && strlen(trim($_POST["billingICO"])) > 0){
    $billingICO = mysqli_real_escape_string($conn, $_POST["billingICO"]);
} else {
  $billingICO = "";
}

if(isset($_POST["billingBirth"]) && strlen(trim($_POST["billingBirth"])) > 0){
  $billingBirth = mysqli_real_escape_string($conn, $_POST["billingBirth"]);
} else {
  $billingBirth = "";
}

if(isset($_POST["billingCompStreet"]) && strlen(trim($_POST["billingCompStreet"])) > 0){
  $billingCompStreet = mysqli_real_escape_string($conn, $_POST["billingCompStreet"]);
} else {
  $error = true;
}

if(isset($_POST["billingCompPSC"]) && strlen(trim($_POST["billingCompPSC"])) >= 5){
  $billingCompPSC = mysqli_real_escape_string($conn, $_POST["billingCompPSC"]);
} else {
  $error = true;
}

if(isset($_POST["billingCompCity"]) && strlen(trim($_POST["billingCompCity"])) > 0){
  $billingCompCity = mysqli_real_escape_string($conn, $_POST["billingCompCity"]);
} else {
  $error = true;
}

if(isset($_POST["CompStreet"]) && strlen(trim($_POST["CompStreet"])) > 0){
    $CompStreet = mysqli_real_escape_string($conn, $_POST["CompStreet"]);
} elseif (empty($_POST["CompStreet"])) {
    $CompStreet = "";
    } else {
    $error = true;
}

if(isset($_POST["CompPSC"]) && strlen(trim($_POST["CompPSC"])) >= 5){
    $CompPSC = mysqli_real_escape_string($conn, $_POST["CompPSC"]);
} elseif (empty($_POST["CompPSC"])) {
    $CompPSC = "";
    } else {
    $error = true;
}

if(isset($_POST["CompCity"]) && strlen(trim($_POST["CompCity"])) > 0){
    $CompCity = mysqli_real_escape_string($conn, $_POST["CompCity"]);
} elseif (empty($_POST["CompCity"])) {
    $CompCity = "";
    } else {
    $error = true;
}

if(isset($_POST["CompName"]) && strlen(trim($_POST["CompName"])) > 0){
    $CompName = mysqli_real_escape_string($conn, $_POST["CompName"]);
  } elseif (empty($_POST["CompName"])) {
    $CompName = "";
    } else {
    $error = true;
  }

  if(isset($_POST["CompPhone"]) && strlen(trim($_POST["CompPhone"])) >= 9 && strlen(trim($_POST["CompPhone"])) <= 22){
    $CompPhone = mysqli_real_escape_string($conn, $_POST["CompPhone"]);
    } elseif (empty($_POST["CompPhone"])) {
    $CompPhone = "";
    } else {
    $error = true;
  }
  
  if(isset($_POST["CompEmail"]) && filter_var($_POST["CompEmail"], FILTER_VALIDATE_EMAIL)){
    $CompEmail = mysqli_real_escape_string($conn, $_POST["CompEmail"]);
    } elseif (empty($_POST["CompEmail"])) {
    $CompEmail = "";
    } else {
    $error = true;
  }

if(isset($_POST["text"])){
  $text = mysqli_real_escape_string($conn, $_POST["text"]);
} else {
    $text = "";
}



if(!$error){
  if($_POST["room"] == "ano"){
    $sql = "INSERT INTO objednavky(jmeno, prijmeni, email, telefon, firmaEmail, firmaTelefon, adresa, psc, mesto, firmaAdresa, firmaPSC, firmaMesto, zprava, status, id_kurzy, firmaNazev, ico, rodne_cislo,  id_terminy, ubytovani)
      VALUES('$billingFirstName', '$billingSurname', '$billingEmail', '$billingPhone', '$CompEmail', '$CompPhone', '$billingCompStreet', '$billingCompPSC', '$billingCompCity', '$CompStreet', '$CompPSC', '$CompCity', '$text', 'new', '$id_kurzy', '$CompName', '$billingICO', '$billingBirth', '$KurzDate', '1')";
  } else {
    $sql = "INSERT INTO objednavky(jmeno, prijmeni, email, telefon, firmaEmail, firmaTelefon, adresa, psc, mesto, firmaAdresa, firmaPSC, firmaMesto, zprava, status, id_kurzy, firmaNazev, ico, rodne_cislo,  id_terminy, ubytovani)
    VALUES('$billingFirstName', '$billingSurname', '$billingEmail', '$billingPhone', '$CompEmail', '$CompPhone', '$billingCompStreet', '$billingCompPSC', '$billingCompCity', '$CompStreet', '$CompPSC', '$CompCity', '$text', 'new', '$id_kurzy', '$CompName', '$billingICO', '$billingBirth', '$KurzDate', '0')";
  }

  if($query = mysqli_query($conn, $sql)){
    $id_objednavky = mysqli_insert_id($conn);





// Mailer ---------------------------------------------------------------------------------------
$sqlMailMess = "SELECT nazev FROM kurzy WHERE id_kurzy = $id_kurzy";

if($queryMail = mysqli_query($conn, $sqlMailMess)){
  while($rowMail = mysqli_fetch_array($queryMail)){
    $nazev = $rowMail["nazev"];
  }

  $mess = "
  <html>
  <body>
    Dobr?? den,<br/>
    potvrzujeme p??ijet?? Va???? objedn??vky kurzu:  <b>".$nazev."</b>.
    V??ce informac?? ke konkr??tn??mu kurzu V??m obratem za??leme na uveden?? e-mail. Dal???? informace najdete na na??ich str??nk??ch, p????padn?? n??s nev??hejte kontaktovat.<br/>
    Z??lohovou fakturu s ??daji pro uhrazen?? V??m po??leme cca 14 dn?? p??ed kon??n??m kurzu na uveden?? e-mail.<br/>
    D??kujeme za d??v??ru a t??????me se na V??s na kurzu.
    <br/>
    <br/>
    S pozdravem<br/>
    <br/>
    Sdru??en?? v??robc?? hasic??ch p????stroj??<br/>

    Srch 229, 533 52 Srch, are??l Hastex & Haspr s.r.o.<br/>

    tel:  +420 774 734 999<br/>

    mail:  svhp@svhp.cz<br/>

    web: www.svhp.cz
  </body>
  </html>";

} else {
  echo mysqli_error($conn);
  die();
}
//------------------------------------------------------------



    $to      = $billingEmail;
    $subject = 'Objedn??vka - SVHP';

    $message = $mess;

    $headers = "From: svhp@svhp.cz\r\n";
    $headers .= "Cc: svhp@svhp.cz\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";

    mail($to, $subject, $message, $headers);

    header("location: /objednavka_hotova.php?id=".$id_objednavky);
    die();
  } else {
    echo mysqli_error($conn);
  }
} else {
    header("location: /objednat.php?id=".$id_kurzy."&err=1");
    die();
}



?>
