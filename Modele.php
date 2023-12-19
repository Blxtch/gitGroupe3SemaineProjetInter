<?php

function getLogin() {
    $bdd = getBdd();
    $logins = $bdd->prepare('SELECT login_user , id_user FROM users; ');
}

function getRestau() {
    $bdd = getBdd();
    $restau = $bdd->query('SELECT nom_restau , note_restau FROM restaurants;');
}

function getPlats() {
    $bdd = getBdd();
    $listPlats = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats
                                    where id_restau = 1 AND type_plat = "Plat"');
}

function getEntree() {
    $bdd = getBdd();
    $listEntree = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats
                                    where id_restau = 1 AND type_plat = "entree";');
}

function getDessert() {
    $bdd = getBdd();
    $listDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats
                                    where id_restau = 1 AND type_plat = "Dessert";');
}

function getEntreePlat() {
    $bdd = getBdd();
    $listEntreePlat = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats 
                                    where id_restau = 1 AND type_plat = "Plat" OR type_plat = "entree";');
}

function getPlatDessert() {
    $bdd = getBdd();
    $listPlatDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats 
                                    where id_restau = 1 AND type_plat = "Plat" OR type_plat = "Dessert";');
}

function getEntreeDessert() {
    $bdd = getBdd();
    $listEntreeDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats 
                                    where id_restau = 1 AND type_plat = "entree" OR type_plat = "Dessert";');
}


//CONNEXIONDB
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=dbsemaineprojetdef;charset=utf8', 'AdminISIM' ,
            'Test123*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

?>