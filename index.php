<?php
require_once 'modele.php';
require_once 'db.php';

$_SESSION['id'] = $db-> accessLogin();

if (!isset ($_SESSION['id'])) {
    require_once 'vues/vueLogin.php';
}

$username = '';
$password = '';

//géer avec des variables de

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