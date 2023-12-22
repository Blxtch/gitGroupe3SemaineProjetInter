
<?php
require_once '../db.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DelivISIM | Commandes</title>
    <link rel="stylesheet" href="../css/styleCommande.css">
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
        <?php echo '<h1> Commandes : </h1>';  ?>
        <main>
            <?php 

            $varRestau = $db->accessListeCommandes();
            while ($data = $varRestau->fetch()) {
                echo '<div class="commande">';
                echo '<h2> Numéro de la commande :',$data['id_commande'],'</h2>';
                echo '<p> Etat de la commande : ',$data['etat_commande'],'</p>';
                echo '</div>';
            }
            ?>

            
        </main>

    <?php include_once '../gabarits/footer.php'; ?>
</body>
</html>

