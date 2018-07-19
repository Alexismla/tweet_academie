<?php
session_start();
var_dump($_SESSION);
echo 'Vous etes connecter <br>';
echo '<a href="logout.php">Deconnecter</a>';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="modif.php">Modifier mon compte</a>
<a href="profil.php">Afficher mon profil</a>
</body>
</html>
