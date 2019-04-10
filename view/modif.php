<?php
session_start();

include '../conn_bdd.php'; 
$login->isLogged($_SESSION['id_user']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Modifier mon compte</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css_perso/theme_bs.css">
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
<h1>Les informations de <?php echo $_SESSION['username'];?></h1><a href="index.php">Home</a>

<form class="container" method="post" action="" enctype="multipart/form-data">
  <fieldset>
    <div class="form-group col-sm-4">
      <label for="exampleInputEmail1">Pseudo</label>
      <input class="form-control" name="username"  placeholder="Changer Pseudo" type="text">
    </div>
    </div>
    <div class="form-group col-sm-4">
      <label for="exampleInputEmail1">Email</label>
      <input class="form-control" name="mail"  placeholder="Changer Email" type="email">
    </div>
    <div class="form-group col-sm-4">
      <label for="exampleInputPassword1">Mot de passe</label>
      <input class="form-control"  name="mdp" placeholder="Changer Mdp" type="password">
    </div>
    <div class="form-group">
      <label for="exampleInputFile">Changer d'Avatar</label>
      <input class="form-control-file"name="image" accept="image/png, image/jpeg" type="file">
    </div>
    <button type="submit" name="valid" class="btn btn-primary">Submit</button>     
<?php
    if(isset($_POST['valid']))
    {
      if(!empty($_POST['mail']))
      {
        if($login->modifier_mail($_POST['mail']))
        {
          echo "Le changement de mail a bien été effectué";
        }
      }
    }
?>
<?php
    if(isset($_POST['valid']))
    {
      if(!empty($_POST['username']))
      {
        if($login->modifier_pseudo($_POST['username']))
        {
          echo "Le changement de Pseudo a bien été effectué";
        }
      }
    }
?>

<?php
    if(isset($_POST['valid']))
    {
      if(!empty($_POST['mdp']))
      {
        if($login->modifier_mdp($_POST['mdp']))
        {
          echo "Le changement de mot de passe a bien été effectué";
        }
      }
    }
?>
<?php
    if(isset($_POST['valid']))
    {
    $login->uploadImg($_FILES['image']['name']);
    
    }

?>

</fieldset>
</form>
</body>
</html>