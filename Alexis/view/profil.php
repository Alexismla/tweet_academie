<?php
session_start();


include '../conn_bdd.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mon profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<h1>Le profil de <?php echo $_SESSION['firstname'];?>&nbsp<?php echo $_SESSION['lastname'];?></h1>
<h3>Nombre de follower : <?php $login->follower();
?>
 </h3>
<h3>Nombre d'abonné : <?php $login->followed();
?>
</h3>
</body>
</html>