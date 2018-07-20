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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <script src="main.js"></script>
</head>
<body>
<h1>Le profil de <?php echo $_SESSION['firstname'];?>&nbsp<?php echo $_SESSION['lastname'];?></h1>
<h3>Nombre de follower : <?php $login->follower();
?>
 </h3>
<h3>Nombre d'abonnement : <?php $login->followed();
?>
</h3>
<a class="btn btn-primary btn-lg" href="index.php" role="lien">Retour</a>

				<table class="table table-dark">
					<th scope="col">Abonnement</th>
					<tr>
					<td><?php $login->ListFollowed(); ?></td>				
                    </tr>
				</table>

                <table class="table table-dark">
					<th scope="col">Follower</th>
					<tr>
					<td><?php $login->ListFollower(); ?></td>				
                    </tr>
				</table>


</body>
</html>