<?php
session_name("legis");
session_start();

if(!isset($_SESSION["legis"])){
  header("location: ../index.php");
  die("Přístup odepřen");
}

include_once("../mysql_connect.php");
?>
<!DOCTYPE html>
<html lang="cz">
<head>
  <title><?php echo $title;?></title>
  <link href="/foto/svhp.jpg" rel="shortcut icon" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" media="screen" href="../style.css">

<link rel="stylesheet" media="print" href="print.css" />


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto%3A300%2C400%2C400i%2C500%2C600%2C600i%2C700%2C700i%2C800%2C800i%2C900%7CPoppins%3A300%2C400%2C500%2C600%2C700%2C800%2C900%7CPoppins%3A400%2C500%2C600%2C700%7CRubik%7CPoppins%7CRoboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%20Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRubik%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CPoppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">


</head>
<body>

<header>
    <nav class="navbar navbar-expand-sm navbar-light navigace navbar-fixed-top shadow-lg p-3 mb-5 rounded">
        <div class="container">
            <!-- <a class="navbar-brand" href="/admin/index.php"><img src="../foto/logo.png" width="auto" height="38" alt="SVHP">
            </a> -->
            <button class="navbar-toggler" type="button" 
                    data-toggle="collapse"
                    data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown"
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" 
                id="navbarNavDropdown">
                <ul class="nav navbar-nav mr-auto mt-2 mt-lg-0 nav-fill w-100 navbar-center">
                    <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle linka" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        SORTIMENT
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Záclony</a></li>
                        <li><a class="dropdown-item" href="#">Design</a></li>
                    </ul>       
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link linka logo" 
                           href="/admin/index.php">
                           OBJEDNÁVKY
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linka" 
                            href="/admin/objednavky.php">
                            ARCHIV
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linka" 
                            href="/admin/kurzy.php">
                            KURZY
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linka"
                            href="/admin/terminy.php">
                            TERMÍNY
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linka"
                            href="/admin/mista.php">
                            MÍSTA
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link linka"
                            href="/admin/lektori.php">
                            LEKTOŘI
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link linka"
                            href="/admin/oznameni_seznam.php">
                            OZNÁMENÍ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linka"
                            href="/admin/logout.php"><span class="glyphicon glyphicon-log-out"></span>
                            Odhlásit se
                        </a>
                    </li>   
                </ul>          
            </div>
        </div>
    </nav>
</header>