<?php
include_once("../../mysql_connect.php");

$error = false;

if(isset($_POST["SemName"]) && strlen(trim($_POST["SemName"])) > 0){
$SemName = mysqli_real_escape_string($conn, $_POST["SemName"]);
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

if(isset($_POST["KurzPlace"]) && strlen(trim($_POST["KurzPlace"])) > 0){
    $KurzPlace = mysqli_real_escape_string($conn, $_POST["KurzPlace"]);
} else {
    $error = true;
}

if(!$error){
  $sql = "INSERT INTO terminy(datumOd, datumDo, cas, id_kurzy, id_mista)
    VALUES('$KurzDateFrom', '$KurzDateTo', '$KurzTime', '$SemName', '$KurzPlace')";

  if($query = mysqli_query($conn, $sql)){
    header("location: ../terminy.php");
    die();
  } else {
    echo mysqli_error($conn);
  }
} else {
  header("location: ../pridat_termin.php?err=1");
  die();
}
?>
