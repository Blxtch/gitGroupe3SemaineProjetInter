<?php
session_start();
try {
    require 'vueLogin.php';
    $login = getLogin();
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}