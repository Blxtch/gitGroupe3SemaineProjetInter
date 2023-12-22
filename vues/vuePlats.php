<?php require '../db.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DelivISIM | Plats</title>
    <link rel= "stylesheet" href="../css/stylePlats.css">
</head>
<body>
<header>
        <img src="img/logo.png" alt="" id='sans'>
        <img src="../img/logo.png" alt="" id="avec">  


        <nav>
            <ul>
                <li><a href="../index.php">Accueil</a></li>
            
                <li><a href="vueDashboard.php">Dashboard</a></li>
                
                <li><a href="vuePanier.php">Panier</a></li>
                <li><a href="vueCommande.php">Commandes</a></li>
            </ul>
        </nav>
    </header>
    <?php 
    
    ?>
        <main>
            <?php 

            $varPlats = $db->accessListePlats($_GET['id_restau']);
            $id = $_GET['id_restau']; 


            //$varPlats = $db->accessPanierPlat($_POST['id_restau'], $data['id_plat'], $data['prix_plat'], $_SESSION['id']);

            if ($varPlats !== null) {
                while ($data = $varPlats->fetch()) {
                    echo '<a href="">','<div class="plat">';
                    echo '<h2>',$data['nom_plat'],'</h2>';
                    echo '<p>',$data['type_plat'],'</p>';
                    echo '<p>',$data['prix_plat']. '€','</p>';
                    echo '<form action="vuePlats.php?name='.$id.'&id='.$data['id_plat'].'&prix'.$data['prix_plat'].' method="get">';
                    echo '<input type="hidden" value="',$data['id_restau'],'"name="id_restau">';
                    echo '<input type="hidden" value="',$data['id_plat'],'"name="id_plat">';
                    echo '<input type="hidden" value="',$data['prix_plat'],'"name="prix_plat">';
                    echo '<input type="submit" value="ajouter au panier">';
                    echo '</form>';
                    echo '</div></a>';

                    if ($varPlats == null) {
                        return $data['id_restau']; 

                    }
            }
        }
            
            if (isset($_GET['id_restau']) && isset($_GET['id_plat']) && isset($_GET['prix_plat'])) {
                $addPanier = $db->accessPanierPlat($_GET['id_restau'], $_GET['id_plat'], $_GET['prix_plat'], 1 );
            }
            ?>
                
        </main>
            <?php

            echo '<form action="vueDashboardModo.php?name='.$id.' method="get">';
            echo '<input type="hidden" value="',$id,'"name="id_restau">';
            echo '<input type="submit" value="Ajouter un plat">';
            ?>
    <?php include_once '../gabarits/footer.php'; ?>
</body>
</html>
