
<?php
require_once '../db.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DelivISIM | Panier</title>
    <link rel="stylesheet" href="../css/stylePanier.css">
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
        <?php echo '<h1> Voici votre panier: </h1>';  ?>
        <main>
    
            <?php 

            $varRestau = $db->accessListePlatsPanier();
            while ($data = $varRestau->fetch()) {
                echo '<div class="panier">';
                echo '<h2>',$data['nom_plat'],'</h2>';
                echo '<p>',$data['type_plat'],'</p>';
                echo '<p>',$data['prix_plat'],'</p>';
                echo '</div>';
            }
            
            

            ?>

            
        </main>
        <form action="vueCommande.php" method="post">
        <input type="submit" value="Valider la commande" name='ok'>
        </form>

        <?php
        if (isset ($_POST['ok'])) {
            $newCommande = $db-> accessEnvoiCommande();
            }

    include_once '../gabarits/footer.php'; ?>
</body>
</html>

