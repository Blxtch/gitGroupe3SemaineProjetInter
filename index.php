<?php
session_start();
try {
    require 'vueLogin.php';
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}