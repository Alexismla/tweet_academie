<?php 

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

include 'message.php';
include 'recu.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery.js"></script>
    <title>Mon profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="main.js"></script>
<!------ Include the above in your HEAD tag ---------->

	<title>envois de message</title>
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
		<!-- <a href="reception.php">Boite de reception</a> -->
<form method="POST">

<div class="container">
    <div class="row">
		<div class="col-sm-6 col-md-6">
				<label  >Destinataire : </label>

 		<input type="text"  class="form-control counted" name="destinataire">
<br />	<br />
	<div class="col-sm-12 col-md-12" >
	<a href="envois.php">Nouveau message</a><br><br><br>
<?php 
       


if ($msg_nbr == 0 ) { 
	?>
		<div class="alert alert-success" role="alert">
  <a href="#" class="alert-link">VOUS N'AVEZ AUCUN MESSAGE !</a>
</div>
  <?php }
  ?>
  <div id="message">
  	<?php
while ($r = $msg->fetch()) { 
$user_sender = $dbcon->prepare('SELECT username FROM user WHERE id_user = ?');
$user_sender->execute(array($r['id_sender']));
$user_sender = $user_sender->fetch();
$user_sender = $user_sender['username'];
	?>

	 <br /> <b><?= $user_sender;  ?> </b> vous a envoyé à <?=  $r['date_message']; ?> :  <a href="supmsg.php"><img src="../image/xx.png"></a> 
 <br />  <br />
	<?= $r['content_message'] ?>
<br />--------------------------------- <br />

<?php } ?>
</div>
</div>
            <div class="panel panel-default">
                <div class="panel-body" id="resizable">                
                    <form accept-charset="UTF-8" action="" method="POST" >
                        <textarea  id="fullfilled" class="form-control counted" name="message" placeholder="Type in your message" rows="6" style="margin-bottom:10px;"></textarea>
                        <button class="btn btn-info" name="envoi_msg" type="submit">Envoyez !</button>
                        <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>

                    </form>
                </div>
            </div>
        </div>
	</div>
</div>

		<br />	<br />

</form>
<script> setInterval('load_message()', 2500);
		function load_message() {
			$('#message').load("load_message.php")
		}
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>


</body>
</html>