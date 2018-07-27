<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
        include '../conn_bdd.php';

    include 'recu.php';


	if (isset($_SESSION['id_user']) AND !empty($_SESSION['id_user'])) {

while ($r = $msg->fetch()) { 
$delete = $dbcon->prepare("DELETE FROM `message` WHERE `message`.`id_message` = ?");
$delete->execute(array($r['id_message']));
				header('location:envois.php');

	}
}

?>
