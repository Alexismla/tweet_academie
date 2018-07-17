<?php
session_start();
var_dump($_SESSION);
echo 'Vous etes connecter <br>';
echo '<a href="../class/logout.php">Deconnecter</a>';