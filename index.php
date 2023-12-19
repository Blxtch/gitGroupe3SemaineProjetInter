<?php

//require 'Modele.php';

try {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< conversionModeleEnObjet
>>>>>>> b3ee589b415543e2abfb45e3520c639542595fe7
    //$logins = getLogin();
    require 'view\vueAccueil.php';
=======
    $logins = getLogin();
    require 'vueLogin.php';
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 26eb457 (Clean MVC)
=======
>>>>>>> 1b32f7b (Login)
=======
>>>>>>> main
>>>>>>> b3ee589b415543e2abfb45e3520c639542595fe7
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'view\vueErreur.php';
}