<?php
session_start();

include '../conn_bdd.php'; 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modifier mon compte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
<h1>Les informations de <?php echo $_SESSION['firstname'];?>&nbsp<?php echo $_SESSION['lastname'];?></h1>

<div>
<form method="post" action="">
    <h3>Pseudo :</h3>
    <h4><?php echo $_SESSION['username'];?></h4>
    <input type="text" name="username" placeholder="Modifier Pseudo">
    <input type="submit" name="modifuser" value="Modifier">
    <a href="index.php">Home</a>

    <h3>Mail :</h3>
    <h4><?php echo $_SESSION['email'];?></h4>
    <input type="text" name="mail" placeholder="Modifier Pseudo">
    <input type="submit" name="modifmail" value="Modifier">

    <h3>Mot de passe :</h3>
    <h4><?php echo $_SESSION['password'];?></h4>
    <input type="text" name="mdp" placeholder="Modifier Pseudo">
    <input type="submit" name="modifmdp" value="Modifier">

<?php
    if(isset($_POST['modifmail']))
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
    if(isset($_POST['modifuser']))
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
    if(isset($_POST['modifmdp']))
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

</form>
</div>
</body>
</html>