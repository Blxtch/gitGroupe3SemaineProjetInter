<?php
require_once "Modele.php";
$Modele_en_Session = new Modele;

$db = $Modele_en_Session->getInstance();
session_start();

try {
    require 'vueLogin.php';
    $login = $Modele_en_Session->getLogin($login,$mdp);
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}