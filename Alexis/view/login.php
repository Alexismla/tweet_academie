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
		$_SESSION['register_date'] = $row['register_date'];
		
		header('location:index.php');
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css_perso/styles.css">
	<title>Login</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="Brand" src="../image/twitter_logo.png">
      </a>
    </div>  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="register.php">Inscription<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Connexion</a>
      </li>
    </ul>
  </div>
</nav>
	<!------    body    ------>
<div class="container">
	<div class="jumbotron mt-3">
  <div class="center"> 

	<form method="post">
		<div class="form-row block">
			<div class="container fluid">
				<div class="row">
				<h2 class="ml-4">Se connecter à Tweet academie</h2>
				<div class="form-group col-md-8">
					<input type="email" name="email" placeholder="email" class="form-control">
				</div>
					<div class="form-group col-md-8">
					<input type="password" name="password" placeholder="mot de passe" class="form-control">
				</div>
					<div class="form-group col-md-8">
						<input type="submit" name="submit" value="Connexion" class="btn btn-dark btn-lg">
						 <a class="btn btn-primary btn-lg" href="register.php" role="lien">Toujours pas inscrit ?</a>

					</div>
		
							</div>
							</div>

		</form>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>