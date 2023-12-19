<?php

//require 'Modele.php';

try {
<<<<<<< HEAD
    //$logins = getLogin();
    require 'view\vueAccueil.php';
=======
    $logins = getLogin();
    require 'vueLogin.php';
>>>>>>> 26eb457 (Clean MVC)
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'view\vueErreur.php';
}