<?php
    session_name("legis");
    session_start();
    $_SESSION=array();
    session_destroy();
    header("Location: index.php");
?>
