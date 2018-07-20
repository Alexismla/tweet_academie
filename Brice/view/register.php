<?php include '../conn_bdd.php';

if (isset($_POST['submit']))  
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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css_perso/styles.css">

</head>
<body class="register">
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
	<div class="jumbotron">
  <div class="center2"> 

	
	<form action="#" method="post">
		<div class="form-row block">
			<h3 class="ml-5" >Créer votre compte</h3>
			<div class="container">
            <div class="form-group col-md-6">
					<input type="text" name="username" class="form-control" placeholder="pseudo">
				</div>
				<div class="form-group col-md-6">
					<input type="text" name="firstname" class="form-control" placeholder="Nom">
				</div>
				<div class="form-group col-md-6">
					<input type="text" name="lastname" class="form-control" placeholder="Prénom">
				</div>
				<div class="form-group col-md-6">
					<input type="email" name="email" class="form-control" placeholder="Email">
				</div>
				<div class="form-group col-md-6">
					<input type="password" name="password" class="form-control" placeholder="Mot de passe">
				</div>
				<div class="form-group col-md-8">
						<input type="submit" name="submit" value="Valider" class="btn btn-dark btn-lg">
						<a class="btn btn-primary btn-lg" href="login.php" role="lien">Déjà inscrit ?</a>

			</div>
			
					
		
		</div>
	</div>
			</form>
</div>
</div>
	


</body>
</html>