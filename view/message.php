<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include '../conn_bdd.php';


if (isset($_SESSION['id_user']) AND !empty($_SESSION['id_user'])) {


if(isset($_POST['envoi_msg'], $_POST['destinataire'], $_POST['message']) AND !empty($_POST['destinataire']) AND !empty(['message'])) 
{
    header('Location:envois.php');
$destinataire = htmlspecialchars($_POST['destinataire']);
$message = htmlspecialchars($_POST['message']);

$id_destinataire = $dbcon->prepare('SELECT id_user FROM user WHERE username = ?');
$id_destinataire->execute(array($destinataire));
$id_destinataire = $id_destinataire->fetch();
$id_destinataire = $id_destinataire['id_user'];

$ins = $dbcon->prepare('INSERT INTO message(id_sender,id_receiver,content_message) VALUES (?,?,?)');
$ins->execute(array($_SESSION['id_user'],$id_destinataire,$message));

$error = "Votre message a été envoyez !";
 

$destinataire = htmlspecialchars($_POST['destinataire']);

$destinataires = $dbcon->query('SELECT username FROM user WHERE username LIKE "%'.$destinataire.'%" 
	');
} 

else {
	$error = "Veuillez remplir tout les champs";
}

}


//while($d = $destinataires->fetch()) {  } 
?>