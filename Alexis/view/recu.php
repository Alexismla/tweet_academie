<?php 

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

// var_dump($_SESSION['id_user']);

if (isset($_SESSION['id_user']) AND !empty($_SESSION['id_user'])) {

$msg = $dbcon->prepare('SELECT * FROM message WHERE id_receiver = ? ORDER BY `id_message` ASC');
$msg->execute(array($_SESSION['id_user']));
$msg_nbr = $msg->rowCount();
}


?>