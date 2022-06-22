<?php
include_once("../../mysql_connect.php");

$error = false;

if(isset($_POST["id"])){
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
   } else {
     $error = true;
   }

if(isset($_POST["KurzDateFrom"])){
$KurzDateFrom = mysqli_real_escape_string($conn, $_POST["KurzDateFrom"]);
} else {
    $error = true;
}

if(isset($_POST["KurzDateTo"])){
    $KurzDateTo = mysqli_real_escape_string($conn, $_POST["KurzDateTo"]);
    } else {
        $error = true;
    }


if(isset($_POST["KurzTime"])){
$KurzTime = mysqli_real_escape_string($conn, $_POST["KurzTime"]);
} else {
    $error = true;
}

if(isset($_POST["KurzPlace"])){
$KurzPlace = mysqli_real_escape_string($conn, $_POST["KurzPlace"]);
} else {
    $error = true;
}

if(!$error){
  $sql = "INSERT INTO terminy(datumOd, datumDo, cas, id_kurzy, id_mista)
    VALUES('$KurzDateFrom', '$KurzDateTo', '$KurzTime', '$id', '$KurzPlace')";

  if($query = mysqli_query($conn, $sql)){
    header("location: ../kurz.php?id=".$id);
    die();
  } else {
    echo mysqli_error($conn);
  }
} else {
  header("location: ../pridat_termin.php?err=1");
  die();
}
?>
