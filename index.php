<?php

//require 'Modele.php';

try {
    //$logins = getLogin();
    require 'view\vueAccueil.php';
=======
    $logins = getLogin();
    require 'vueLogin.php';
>>>>>>> main
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'view\vueErreur.php';
}