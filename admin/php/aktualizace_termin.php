<?php
include_once("../../mysql_connect.php");

$error = false;

 if(isset($_POST["id"])){
 $id = mysqli_real_escape_string($conn, $_POST["id"]);
} else {
  $error = true;
}

if(isset($_POST["KurzName"])){
    $KurzName = mysqli_real_escape_string($conn, $_POST["KurzName"]);
} else {
    $error = true;
}

if(isset($_POST["SemDayFrom"])){
    $SemDayFrom = mysqli_real_escape_string($conn, $_POST["SemDayFrom"]);
} else {
    $error = true;
}

if(isset($_POST["SemDayTo"])){
    $SemDayTo = mysqli_real_escape_string($conn, $_POST["SemDayTo"]);
} else {
    $error = true;
}

if(isset($_POST["SemTime"])){
    $SemTime = mysqli_real_escape_string($conn, $_POST["SemTime"]);
} else {
    $error = true;
}

if(isset($_POST["KurzPlace"])){
    $KurzPlace = mysqli_real_escape_string($conn, $_POST["KurzPlace"]);
} else {
    $error = true;
}

if(!$error){

$sql= "UPDATE terminy SET datumOd = '$SemDayFrom', datumDo = '$SemDayTo', cas = '$SemTime', id_kurzy = '$KurzName', id_mista = '$KurzPlace' WHERE id_terminy = $id";

if($query = mysqli_query($conn, $sql)){
    header("location: ../termin.php?id=".$id);
    die();
  }else{
    echo mysqli_error($conn);
  }
} else {
  header("location: ../aktualizovat_termin.php?err=1");
  die();
}
?>
