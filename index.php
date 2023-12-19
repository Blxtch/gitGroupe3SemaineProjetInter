<?php

require 'Modele.php';

try {
    $logins = getLogin();
    require 'vueLogin.php';
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}