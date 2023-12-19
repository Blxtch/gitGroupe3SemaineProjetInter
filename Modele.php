<?php

// Renvoie la liste des billets du blog
//function getLogin() {
   
  //  $bdd = getBdd();
    //$logins = $bdd->prepare('SELECT login_user , mdp_user FROM users; ');
 //  $logins->execute(array($id_user));

   // if ($logins->rowCount() > 0)
    //    return $logins->fetch();  // Accès à la première ligne de résultat

  //  else
   //     throw new Exception("Aucun billet ne correspond à l'identifiant '$idUser'");
//}

// Renvoie les informations sur un billet
function getRestau() {
    $bdd = getBdd();
    $restau = $bdd->query('SELECT nom_restau , note_restau FROM restaurants;');
}

// Renvoie la liste des commentaires associés à un billet
function getPlats() {
    $bdd = getBdd();
    $listPlats = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats
                                    where id_restau = 1 AND type_plat = "Plat"');
 //   $listPlats->execute(array($id_restau));
  //  return $listPlats;
}

function getEntree() {
    $bdd = getBdd();
    $listEntree = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats
                                    where id_restau = 1 AND type_plat = "entree";');
   // $listEntree->execute(array($id_restau));
   // return $listEntree;
}

function getDessert() {
    $bdd = getBdd();
    $listDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats
                                    where id_restau = 1 AND type_plat = "Dessert";');
    //$listDessert->execute(array($id_restau));
   // return $listDessert;
}

function getEntreePlat() {
    $bdd = getBdd();
    $listEntreePlat = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats 
                                    where id_restau = 1 AND type_plat = "Plat" OR type_plat = "entree";');
    //$listEntreePlat->execute(array($id_restau));
    //return $listEntreePlat;
}

function getPlatDessert() {
    $bdd = getBdd();
    $listPlatDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats 
                                    where id_restau = 1 AND type_plat = "Plat" OR type_plat = "Dessert";');
   // $listPlatDessert->execute(array($id_restau));
   // return $listPlatDessert;
}

function getEntreeDessert() {
    $bdd = getBdd();
    $listEntreeDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats 
                                    where id_restau = 1 AND type_plat = "entree" OR type_plat = "Dessert";');
   // $listEntreeDessert->execute(array($id_restau));
   // return $listEntreeDessert;
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=dbsemaineprojetdef;charset=utf8', 'AdminISIM' ,
            'Test123*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}