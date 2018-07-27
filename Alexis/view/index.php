<?php
session_start();

include '../conn_bdd.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
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

<form method="post" action="">
<div class='md-form'>
<textarea type="text" id="form7" class="md-textarea form-control" rows="3" name="content"></textarea>
<input type="submit" name="tweet" value="Tweeter" class= "btn btn-primary btn-lg">
</div>
</form>
<?php
    if(isset($_POST['tweet']))
    {
      if(!empty($_POST['content']))
      {
        $login->Createtweet();
      }
    }
?>
    <div class="col"></div>
  <div class="col">
  <br>
  <div class="alert alert-light border border-primary" role="alert">
  <h4>Tweet List</h4>
  <?php  $login->ListAboTweet();?>
  </div>
  </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>
