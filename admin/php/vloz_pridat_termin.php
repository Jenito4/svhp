<?php
include_once("../../../mysql_connect.php");

$error = false;

if(isset($_POST["SemName"]) && strlen(trim($_POST["SemName"])) > 0){
$SemName = mysqli_real_escape_string($conn, $_POST["SemName"]);
} else {
    $error = true;
}

if(isset($_POST["KurzDate"])){
$KurzDate = mysqli_real_escape_string($conn, $_POST["KurzDate"]);
} else {
    $error = true;
}

if(isset($_POST["KurzTime"])){
$KurzTime = mysqli_real_escape_string($conn, $_POST["KurzTime"]);
} else {
    $error = true;
}

if(!$error){
  $sql = "INSERT INTO terminy(dat, cas, id_kurzy)
    VALUES('$KurzDate', '$KurzTime', '$SemName')";

  if($query = mysqli_query($conn, $sql)){
    header("location: ../kurzy.php");
    die();
  } else {
    echo mysqli_error($conn);
  }
} else {
  header("location: ../pridat_termin.php?err=1");
  die();
}
?>
