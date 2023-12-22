<?php
    include_once '../db.php'; // Add a semicolon at the end of this line
    //fetch le niveau d'accès du user
    //ensuite dans un if gérer l'affichage

    //si client (pas prendre en compte ils ne devraient pas y acceder a gerer dans l'index)
    //si modo -> peux insert dans la table listPlat ET update cette même table AND update de l'horaire 

    //si admin -> fct modo + insert table listRestau ET update listRestau (pas de gestion de delete enfin pour l'instant)

    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel= "stylesheet" href="../css/styleDashboard.css">
</head>
<?php ?>
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
        $varPlats = $db->accessListePlats($_GET['id_restau']);
        $but =$_GET['id_restau'];

        if (isset ($_GET['ok'])) {
            $newPlat = $db-> addPlat($_GET['nom_plat'], $_GET['type_plat'], $_GET['prix_plat'], $but);
            }
        echo '<div class="modif-container">';
        echo '<form action="vueDashboardModo.php?name="'.$but.' method="get">';
        echo '<p> Nom du plat: ', '<input type = "text" name="nom_plat">';
        echo '<p> Type: ', '<input type = "text" name="type_plat">';
        echo '<p> Prix: ', '<input type = "number" name="prix_plat">';
        echo '<input type="hidden" value="',$but,'"name="id_restau">';
        echo '<input type="submit" value="Envoyer" name="ok" >';
        echo '</form>';
        echo '</div>';
?>
</body>

    <?php include_once '../gabarits/footer.php';?>

