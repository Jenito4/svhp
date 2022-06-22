<?php
include_once("../../mysql_connect.php");

$error = false;

if(isset($_POST["SemName"]) && strlen(trim($_POST["SemName"])) > 0){
 $SemName = mysqli_real_escape_string($conn, $_POST["SemName"]);
} else {
  $error = true;
}

if(isset($_POST["SemText"]) && strlen(trim($_POST["SemText"])) > 0){
 $SemText = mysqli_real_escape_string($conn, $_POST["SemText"]);
} else {
  $error = true;
}

if(isset($_POST["SemCena"])){
 $SemCena = mysqli_real_escape_string($conn, $_POST["SemCena"]);
} else {
  $error = true;
}


if(!$error){
  $sql = "INSERT INTO kurzy(nazev, popis, cena)
    VALUES('$SemName', '$SemText', '$SemCena')";

  if($query = mysqli_query($conn, $sql)){
    header("location: ../kurzy.php");
    die();
  }else{
    echo mysqli_error($conn);
  }
} else {
  header("location: ../vloz_kurz.php?err=1");
  die();
}

?>
