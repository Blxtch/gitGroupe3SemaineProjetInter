<?php
session_start();
require 'Modele.php';


try {
    require 'vueLogin.php';
    $login = getLogin();
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}