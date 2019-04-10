<?php include '../conn_bdd.php'; 
include 'recu.php';
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
