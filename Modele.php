<?php

class Modele {

    private function getBdd() {
        $bdd = new PDO('mysql:host=localhost;dbname=dbsemaineprojetdef;charset=utf8', 'AdminISIM' ,'Test123*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }

    public function getInstance() {
        return $this->getBdd();
    }
    //fonctionnel mais utilisable autre pars
    public function getLogin($login, $mdp) {
        $bdd = $this->getBdd();
        $log = $bdd->prepare('SELECT COUNT(*) FROM users WHERE login_user = :login AND mdp_user = :mdp');
        $log->bindParam(':login', $login);
        $log->bindParam(':mdp', $mdp);
        $log->execute();
        $result = $log->fetchColumn();

        if ($result == 1) {
            //Hop Hop on envoie l'accueil
            $_SESSION["authenticated"] = true;
            //header("Location: view/vueAccueil.php");
            exit();
        } else {
           
            echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
        }
    }

   
    public function getRestau(){
        $bdd = $this->getBdd(); // Correction ici
        $restau = $bdd->query('SELECT nom_restau, note_restau FROM restaurants;');
        return $restau;
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
    

}



