<!DOCTYPE html>
<html lang="cs">
<head>
<title><?php echo $title;?></title>
<meta charset="UTF-8">
<link href="foto/svhp.jpg" rel="shortcut icon" type="image/x-icon">
<!--
<link rel="apple-touch-icon-precomposed" href="/nove2/foto/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="57×57" href="/nove2/foto/favicon.ico"="">
<link rel="apple-touch-icon-precomposed" sizes="72×72" href="/nove2/foto/favicon.ico"="">
<link rel="apple-touch-icon-precomposed" sizes="114×114" href="/nove2/foto/favicon.ico"="">

<meta name="robots" content="all">
<meta name="description" content="POTES s.r.o., poskytujeme technické služby v požární ochraně a s tím spojený prodej požární techniky a následné provádění kontrol.">
<meta name="keywords" content="POTES s.r.o, potes, potes Sobotín, hasicí technika, servis, kontrola hasicí techniky">
<meta name="author" content="Jan Mašlej">

<meta name="robots" content="all">

<meta property="og:title" content="POTES s.r.o. | technické služby v požární ochraně" />
<meta property="og:description" content="technické služby v požární technice" />
<meta property="og:site_name" content="POTES s.r.o. | technické služby v požární ochraně" />
<meta property="og:image" content="http://potes.cz/nove2/foto/ostro.jpg" />
<meta property="og:type" content="website" />
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="style.css">
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
<!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light navigace navbar-fixed-top shadow-lg p-3 mb-5 rounded">
        <div class="container">
            <a class="navbar-brand" href="/novy/index.php"><img src="foto/logo.png" width="auto" height="38" alt="SVHP">
            </a>
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
                    <!-- <li class="nav-item">
                        <a class="nav-link linka" 
                           href="/novy/kurzy.php">
                          KURZY
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linka" 
                           href="/novy/onas.php">
                          O NÁS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linka" 
                           href="/novy/fotogalerie.php">
                          FOTOGALERIE
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linka"
                         href="/novy/kontakt.php">
                          KONTAKT
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link linka"
                         href="/novy/admin/prihlaseni.php"><span class="glyphicon glyphicon-log-in"></span>
                          Přihlášení
                        </a>
                    </li> -->
                </ul>                  
            </div>
        </div>
    </nav>
</header>    