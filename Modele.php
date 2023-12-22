<?php

class Modele {

    private function getBdd() {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=dbsemaineprojetdef;charset=utf8', 'AdminISIM' ,'Test123*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $bdd;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
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
        $varPlat = $bdd->prepare('SELECT DISTINCT * FROM plats WHERE id_restau = :id_restau');
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
        $bd = $this->getBdd();
        if (isset($_POST['ok'])) {
            $nom_restau = $_POST['nom_restau'];
            $type_restau = $_POST['type_restau'];
            $note_restau = $_POST['note_restau'];
            $descritpio = $_POST['descriptio'];
            $modif = $bd->prepare('INSERT INTO restaurants (nom_restau, type_restau, note_restau, descriptio) VALUES (:nom_restau, :type_restau, :note_restau, :descriptio)');
            $modif->bindParam(':nom_restau', $nom_restau);
            $modif->bindParam(':type_restau', $type_restau);
            $modif->bindParam(':note_restau', $note_restau);
            $modif->bindParam(':descriptio', $descritpio);
            $modif->execute();
            header('Location: vueDashboard.php');
        }
    }

    private function panierPlat(){
        $bdd = $this->getBdd();
        $id_plat = $_GET['id_plat'];
        $prix_plat = $_GET['prix_plat'];
        $id_restau = $_GET['id_restau'];
        $id_user = 1;
        $modif = $bdd->prepare('INSERT INTO panier (id_panier, id_plat, prix_plat, id_restau, id_user) VALUES (:id_user ,:id_plat, :prix_plat, :id_restau, :id_user)');
        $modif->bindParam(':id_panier', $id_user);
        $modif->bindParam(':id_plat', $id_plat);
        $modif->bindParam(':prix_plat', $prix_plat);
        $modif->bindParam(':id_restau', $id_restau);
        $modif->bindParam(':id_user', $id_user);
        $modif->execute();
        header('Location: vuePlats.php?id_restau='.$id_restau );
    
    }

    private function getListePlatsPanier(){
        $bdd = $this->getBdd();
        $varPlat = $bdd->query('SELECT nom_plat , pa.prix_plat , type_plat FROM panier as pa JOIN plats as pl ON pl.id_plat = pa.id_plat WHERE id_user = 1;');
        $varPlat->execute();
        $varPlat->setFetchMode(PDO::FETCH_ASSOC);
        return $varPlat;
    }

    private function getCommande(){
        $bdd = $this->getBdd();
        $varCmd = $bdd->query('INSERT INTO commandes (id_user, id_restau, id_plat) SELECT id_user, id_restau, id_plat FROM panier WHERE id_user = 1;');
        $varCommande = $bdd->query('DELETE FROM panier WHERE id_user = 1;');
        $varCmd->execute();
        $varCommande->execute();
        
        
    }

    private function getListeCommandes(){
        $bdd = $this->getBdd();
        $varCmd = $bdd->query('SELECT id_commande , etat_commande , u.prenom_user , l.nom_logement FROM commandes as c
        JOIN users as u ON c.id_user = u.id_user
        JOIN logement as l ON c.id_logement = u.id_logement
        WHERE c.id_user = 1;
        ');
        $varCmd->execute();
        $varCmd->setFetchMode(PDO::FETCH_ASSOC);
        return $varCmd;
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

public function accessListePlatsPanier() {
    return $this->getListePlatsPanier();

}

public function accessEnvoiCommande() {
    return $this->getCommande();

}

public function accessListeCommandes() {
    return $this->getListeCommandes();

}
}