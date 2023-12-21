<?php

class Modele {

    private function getBdd() {
        $bdd = new PDO('mysql:host=localhost;dbname=dbsemaineprojetdef;charset=utf8', 'AdminISIM' ,'Test123*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
        
    private function checkLogin() {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = hash('sha256', $_POST['password']);
    
            $bdd = $this->getBdd();
            $sql = $bdd->prepare("SELECT * FROM users WHERE login_user = :username");
            $sql->execute(['username' => $username]);
            $user = $sql->fetch();
            if ($user) {
                $mdp_user = hash('sha256', $user['mdp_user']);
                
                if ($password == $mdp_user) {
                    $_SESSION['id'] = $user['id_user'];
                    $_SESSION['login'] = $user['login_user'];
                    //session_start();
                    header('Location: index.php');
                    exit();
                } 
                else {
                    $message = 'Mauvais identifiants';
                }
            } 
            else {
                $message = 'Non connecté';
            }
        }
        else {
            echo 'Veuillez remplir les champs';
        }
    }
    
    private function getListeRestau(){
        $bdd = $this->getBdd();
        $varRestau = $bdd->query('SELECT nom_restau , note_restau , id_restau, descriptio, type_restau FROM restaurants');
        $varRestau->execute();
        $varRestau->setFetchMode(PDO::FETCH_ASSOC);
        return $varRestau;
}


    private function getListeEntreesPlatsDesserts() {
        $bdd = $this->getBdd();
        $varPlat = $bdd->prepare('SELECT nom_plat , prix_plat , id_plat, type_plat, id_restau FROM plats WHERE id_restau = :id_restau');
        if(isset($_GET['id_restau'])){
            $id_restau = $_GET['id_restau'];
            $varPlat->bindParam(':id_restau', $id_restau);
            $varPlat->execute();
        $varPlat->setFetchMode(PDO::FETCH_ASSOC);
        return $varPlat;
        return $id_restau;
    }
}

    private function getListePlats(){
        $bdd = $this->getBdd();
        $varPlat = $bdd->query('SELECT nom_plat , prix_plat , id_plat, type_plat FROM plats');
        $varPlat->execute();
        $varPlat->setFetchMode(PDO::FETCH_ASSOC);
        return $varPlat;
    }

    private function addRestau(){
        $bdd = $this->getBdd();
        if (isset($_POST['ok']))
        {
            $nom_restau = $_POST['nom_restau'];
            $type_restau = $_POST['type_restau'];
            $note_restau = $_POST['note_restau'];
            $descritpio = $_POST['descritpio'];
            $modif = $bd->prepare('INSERT users SET nom_restau = :nom_restau, type_restau = :type_restau, note_restau = :note_restau descriptio = :descriptio');
            $modif->bindParam(':nom_restau', $nom_restau);
            $modif->bindParam(':type_restau', $type_restau);
            $modif->bindParam(':note_restau', $note_restau);
            $modif->bindParam(':descriptio', $descritpio);
            $modif->execute();
            header('Location: vues/vueDashboard.php');
        }
    }

    private function panierPlat(){
        $bdd = $this->getBdd();
        $varPanier = $bdd->query("INSERT INTO panier VALUES ('" . $user['id_user'] . "', '" . $plat['id_plat'] . "', '" . $user['id_user'] . "', '" . $id_restau . "', '" . $plat['prix_plat'] . "')");
    }

    public function getEntree() {
        $bdd = $this->getBdd();
        $listEntree = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats
                            where id_restau = 1 AND type_plat = "entree";');
        return $listEntree;
    }

    public function getDessert() {
        $bdd = $this->getBdd();
        $listDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats
                            where id_restau = 1 AND type_plat = "Dessert";');
        return $listDessert;
    }

    public function getEntreePlat() {
        $bdd = $this->getBdd();
        $listEntreePlat = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats 
                            where id_restau = 1 AND type_plat = "Plat" OR type_plat = "entree";');

        return $listEntreePlat;
    }


    public function getPlatDessert() {
        $bdd = $this->getBdd();
        $listPlatDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats 
                            where id_restau = 1 AND type_plat = "Plat" OR type_plat = "Dessert";');
        return $listPlatDessert;
    }

    public function getEntreeDessert() {
        $bdd = $this->getBdd();
        $listEntreeDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats 
                            where id_restau = 1 AND type_plat = "entree" OR type_plat = "Dessert";');

        return $listEntreeDessert;
    }
# Publics methods

// Accès BDD
public function getInstance() {
    return $this->getBdd();
}

//Accès aux logins users
public function accessLogin() {
    return $this->checkLogin();
}

public function accessListeRestau() {
    return $this->getListeRestau();
}

public function accessListePlats() {
    return $this->getListeEntreesPlatsDesserts();

}

public function accessModifRestau() {
    return $this->addRestau();
}

public function accessPanierPlat() {
    return $this->panierPlat();
}

}
