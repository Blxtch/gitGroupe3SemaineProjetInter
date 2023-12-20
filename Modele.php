<?php

class Modele {

    private function getBdd() {
        $bdd = new PDO('mysql:host=localhost;dbname=dbsemaineprojetdef;charset=utf8', 'AdminISIM' ,'Test123*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }

    // private function pour obtenir les logins {
    private function getLogin($username, $password) {
        $bdd = $this->getBdd();
        $sql = $bdd->prepare("SELECT * FROM users WHERE login_user = :username");
        $sql->execute(['username' => $username]);
        $user = $sql->fetch();
        return $user;
    }
        
    private function checkLogin() {

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = hash('sha256', $_POST['password']);
    
            $user = $this -> getLogin($username, $password);
            echo $user;
            if ($user) {
                $mdp_user = hash('sha256', $user['mdp_user']);
                
                if ($password == $mdp_user) {
                    session_start();
                    $_SESSION['id'] = $user['id_user'];
                    header('Location: vueAccueil.php');
                    exit();

                    return $_SESSION['id'];
                } 
                else {
                    $message = 'Mauvais identifiants';
                }
            } 
            else {
                $message = 'Non connecté';
            }
    }
    }
   
    private function getListeRestau(){
        $bdd = $this->getBdd();
        $varRestau = $bdd->query('SELECT nom_restau , note_restau , id_restau, descriptio, type_restau FROM restaurants');
        $varRestau->execute();
        $varRestau->setFetchMode(PDO::FETCH_ASSOC);
        return $varRestau;
}


    public function getPlats() {
        $bdd = $this->getBdd();
        $listPlats = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats
                            where id_restau = 1 AND type_plat = "Plat"');
        return $listPlats;
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

}