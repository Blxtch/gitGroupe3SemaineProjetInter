<?php
class Modele {
    //à faire absolument mardi soir
    // private function getLogin($login, $mdp) {
    //     $bdd = $this->getBdd();
    //     $log = $bdd->prepare('SELECT COUNT(*) FROM users WHERE login_user = :login AND mdp_user = :mdp');
    //     $log->bindParam(':login', $login);
    //     $log->bindParam(':mdp', $mdp);
    //     $log->execute();
    //     $result = $log->fetchColumn();
    //     if ($result == 1) {
    //         // Authentification réussie - démarre la session et redirige vers une page sécurisée
    //         $_SESSION["authenticated"] = true;
    //         header("Location: view/vueAccueil.php");
    //         exit();
    //     } else {
    //         // Authentification échouée - affiche un message d'erreur
    //         echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
    //     }
    // }
    
    // Rest of the code...
//}
    public function getRestau(){
        $bdd = getBdd();
        $restau = $bdd->query('SELECT nom_restau , note_restau FROM restaurants;');
        return  $restau;
    }


    public function getPlats() {
        $bdd = getBdd();
        $listPlats = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats
                            where id_restau = 1 AND type_plat = "Plat"');
        return $listPlats;
    }

    public function getEntree() {
        $bdd = getBdd();
        $listEntree = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats
                            where id_restau = 1 AND type_plat = "entree";');
        return $listEntree;
    }

    public function getDessert() {
        $bdd = getBdd();
        $listDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats
                            where id_restau = 1 AND type_plat = "Dessert";');
        return $listDessert;
    }

    public function getEntreePlat() {
        $bdd = getBdd();
        $listEntreePlat = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats 
                            where id_restau = 1 AND type_plat = "Plat" OR type_plat = "entree";');

        return $listEntreePlat;
    }


    public function getPlatDessert() {
        $bdd = getBdd();
        $listPlatDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats 
                            where id_restau = 1 AND type_plat = "Plat" OR type_plat = "Dessert";');
        return $listPlatDessert;
    }

    public function getEntreeDessert() {
        $bdd = getBdd();
        $listEntreeDessert = $bdd->query('SELECT nom_plat , type_plat , prix_plat from plats 
                            where id_restau = 1 AND type_plat = "entree" OR type_plat = "Dessert";');

        return $listEntreeDessert;
    }
    

}
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=dbsemaineprojetdef;charset=utf8', 'AdminISIM' ,'Test123*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}
