<?php 
session_start();
include '../conn_bdd.php';
if (isset($_POST['submit'])) 
{
    $email = $_POST['email'];
	$mdp = $_POST['password'];
	if ($login->login())
	{
		session_start();
		session();
		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['firstname'] = $row['firstname'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['passsword'] = $row['password'];
		header('location:index.php');
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Login</title>
</head>
<body>
	<footer>
		<h2>Tweet_Academie</h2>
	</footer>
	<form method="post">
		<div class="form-row block">
			<div class="container">
				<h2>Connexion</h2>
				<div class="form-group col-md-6">
					<input type="text" name="email" placeholder="email ou pseudo" class="form-control">
				</div>
					<div class="form-group col-md-6">
					<input type="password" name="password" placeholder="mot de passe" class="form-control">
				</div>
					<div class="form-group col-md-6">
						<input type="submit" name="submit" value="Connexion" class="btn btn-dark">
					</div>
				
			</div>
		</div>
		</form>
			<div class="form-group col-md-6">
		<a href="register.php" class="lien">Toujours pas inscrit ?</a>
	</div>
</body>
</html>