<?php include '../conn_bdd.php';
if (isset($_POST['submit']))  
{
	if($login->CheckPost())
	{
   		if($login->register())
	    { 
			header('location:login.php');
		}
			else
			{
				echo "<script>alert('Champs non remplis')</script>";
			}

	}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<footer>
	<h2>Tweet_Academie</h2>
	</footer>
	<form action="#" method="post">
		<div class="form-row block">
			<h3>Inscrit toi</h3>
			<div class="container">
            <div class="form-group col-md-6">
					<input type="text" name="username" class="form-control" placeholder="pseudo">
				</div>
				<div class="form-group col-md-6">
					<input type="text" name="firstname" class="form-control" placeholder="Prénom">
				</div>
				<div class="form-group col-md-6">
					<input type="text" name="lastname" class="form-control" placeholder="nom">
				</div>
				<div class="form-group col-md-6">
					<input type="email" name="email" class="form-control" placeholder="Email">
				</div>
				<div class="form-group col-md-6">
					<input type="password" name="password" class="form-control" placeholder="Mot de passe">
				</div>
				<div class="form-group">
				<input type="submit" name="submit" value="Valider" class="btn btn-dark">
			</div>
		</div>
	</div>
			</form>
			<div class="form-group">
				<a href="login.php" class="lien">Déjà inscrit ?</a>
			</div>
</body>
</html>