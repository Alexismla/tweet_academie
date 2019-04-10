<?php
session_start();

include '../conn_bdd.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery.js"></script>
    <title>Mon profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="main.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Tweet_Academie</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profil.php">Mon profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="envois.php">MP</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Déconnecter</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" placeholder="Search" type="text">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!-- FIN -->    
<!-- Banniere -->
<div class="background">
</div>
<!-- FIN -->

<!-- Profil -->
<div class="container-fluid">
<div class="row">
<div class="col">
<br>
  <div class="alert alert-light border border-primary" role="alert">
  <br>
  <img src=../avatars/<?php echo $_SESSION['avatar'];?> alt="Image de profil" height="200px" width="200px" class="rounded-circle">
  <br>
  <h4>Profil de&nbsp<?php echo $_SESSION['firstname'];?>&nbsp<?php echo $_SESSION['lastname'];?></h4>
  <br>
  <a href="abonne.php">
  <h6>Abonné : <?php $login->followed(); ?></h6>
  </a>
  <br>
  <a href="abonnement.php">
  <h6>Abonnement : <?php $login->follower();?></h6>
  </a>
  <br>
  <h6>Date d'inscription : <?php echo $_SESSION['register_date'];?></h6>
  <br>
  <a href="modif.php">
  <img src="http://www.musique-dutin.fr/Icones/param.png" alt="Reglages" style="width:50px;height:50px;border:0;">
  </a>
  </div>
</div>
<div class="col"></div>
  <div class="col">
  <br>
  <div class="alert alert-light border border-primary" role="alert">
  <h4> Mes Tweet </h4>
  <div id="load">
  <?php  $login->ListMyTweet();?>
</div>
  </div>
  </div>
  <div class="col"></div>
  <div class="col">
  <br>
  <div class="alert alert-light border border-primary" role="alert">
  <h4>Suggestion</h4>

  </div>
  </div>
</div>
</div>
</div>
<script>
$(document).ready(function () {
  setInterval(function() {
    $('#load');
  }, 500);
});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>


</body>
</html>