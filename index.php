<?php

//require 'Modele.php';

try {
    $logins = getLogin();
    require 'vueAccueil.php';
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}