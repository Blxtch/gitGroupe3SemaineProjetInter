<?php
require_once 'modele.php';
$db = new Modele;
$db -> getInstance();

session_start();


//include 'vues/vueAccueil.php';

// if(!isset($_SESSION['id'])){
//     header('Location: vues/vueLogin.php');
//     if (isset($SESSION['id'])){
//         header('Location: vues/vueAccueil.php');
//     }
// else {
//     header('Location: vues/vueErreur.php');
// }
// }

//     if (isset($_POST['login']) && isset($_POST['mdp'])) {
//         $login = $_POST['login'];
//         $mdp = $_POST['mdp'];
//         $db->getLogin($login, $mdp);
//         header('Location: vueAccueil.php');
//     }
//     else {
//         header('Location: vueErreur.php');
//     }