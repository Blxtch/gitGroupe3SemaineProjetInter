
<?php
require_once '../db.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DelivISIM | Panier</title>
    <link rel="stylesheet" href="../css/styleCommande.css">
</head>
<body>
    <?php include_once '../gabarits/header.php'; ?>
        <?php echo '<h1> Commandes : </h1>';  ?>
        <main>
            <?php 

            $varRestau = $db->accessListeCommandes();
            while ($data = $varRestau->fetch()) {
                echo '<div class="commande">';
                echo '<h2> Numéro de la commande :',$data['num_commande'],'</h2>';
                echo '<p> Etat de la commande : ',$data['etat_commande'],'</p>';
                echo '</div>';
            }
            ?>

            
        </main>

    <?php include_once '../gabarits/footer.php'; ?>
</body>
</html>

