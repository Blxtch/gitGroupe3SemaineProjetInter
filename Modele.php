<?php

function getLogin() {
    $bdd = getBdd();
    $log = $bdd->prepare('SELECT COUNT(*) FROM users WHERE login_user = ".$login" AND mdp_user = ".$mdp" ');
    if ($result->num_rows == 1) {
        // Authentification réussie - démarre la session et redirige vers une page sécurisée
        
        $_SESSION["authenticated"] = true;
        
        header("Location: vueAccueil.php");
        exit();
    } 
    else {
        // Authentification échouée - affiche un message d'erreur
        echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
    }
}

function getRestau() {
    $bdd = getBdd();
    $restau = $bdd->query('SELECT nom_restau , note_restau FROM restaurants;');
}


function getPlats() {
    $bdd = getBdd();
    $listPlats = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats where id_restau = 1 AND type_plat = "Plat"');

}

function getEntree() {
    $bdd = getBdd();
    $listEntree = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats where id_restau = 1 AND type_plat = "entree";');

}

function getDessert() {
    $bdd = getBdd();
    $listDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats where id_restau = 1 AND type_plat = "Dessert";');
}

function getEntreePlat() {
    $bdd = getBdd();
    $listEntreePlat = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats  where id_restau = 1 AND type_plat = "Plat" OR type_plat = "entree";');
}

function getPlatDessert() {
    $bdd = getBdd();
    $listPlatDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats  where id_restau = 1 AND type_plat = "Plat" OR type_plat = "Dessert";');
}

function getEntreeDessert() {
    $bdd = getBdd();
    $listEntreeDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats  where id_restau = 1 AND type_plat = "entree" OR type_plat = "Dessert";');
}
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=dbsemaineprojetdef;charset=utf8', 'AdminISIM' ,
            'Test123*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

