<?php
require_once 'modele.php';
$db = new Modele;
$db->getInstance();
session_start();

if (!isset($_SESSION['id'])) {
    // Debugging
    echo 'youhou';
    //header('Location: vues/vueLogin.php');
    //exit; //je dois faire ca jsp 
} 

else {
    echo 'hnouais';
    //header('Location: vues/vueErreur.php');
   // exit;
}

if (isset($_POST['login']) && isset($_POST['mdp'])) {
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    
    // Debugging
    echo ' login...';

    $db->accessLogin($login, $mdp);

    // Debugging
    echo 'After login ';

   // header('Location: vues/vueAccueil.php');
   // exit;
} 

else {
    // Debugging
    echo 'haaaaaaaaaaaaaaaaaaaaaaaaaaan';

   // header('Location: vues/vueLogin.php');
    //exit;
}

