<?php

//require 'Modele.php';

try {
<<<<<<< HEAD
    //$logins = getLogin();
    require 'view\vueAccueil.php';
=======
    $logins = getLogin();
    require 'vueLogin.php';
<<<<<<< HEAD
>>>>>>> 26eb457 (Clean MVC)
=======
>>>>>>> 1b32f7b (Login)
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'view\vueErreur.php';
}