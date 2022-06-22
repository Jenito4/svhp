<?php
include_once("../../mysql_connect.php");

$id = (int)$_GET["id"];

$sql = "UPDATE objednavky SET status = 'paid' WHERE id_objednavky = $id";

if($query = mysqli_query($conn, $sql)){

  header("location: ../objednavka.php?id=".$id);
} else {
  echo mysqli_error($conn);
  die();
}
?>
