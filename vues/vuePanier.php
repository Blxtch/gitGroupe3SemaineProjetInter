
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
    <?php include_once '../gabarits/header.php'; ?>
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
        <form action="vuePanier.php" method="post">
        <input type="submit" value="Valider la commande" name='ok'>
        </form>

        <?php
        if (isset ($_POST['ok'])) {
            $newCommande = $db-> accessEnvoiCommande();
            }

    <?php include_once '../gabarits/footer.php'; ?>
</body>
</html>

