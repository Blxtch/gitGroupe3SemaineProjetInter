<?php require '../index.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DelivISIM | Plats</title>
    <link rel= "stylesheet" href="../css/stylePlats.css">
</head>
<body>
    <?php include_once '../gabarits/header.php'; ?>
        <main>
            <?php 

            $varPlats = $db->accessListePlats();
            $but = $_GET['id_restau'];

            if ($varPlats !== null) {
                while ($data = $varPlats->fetch()) {
                    echo '<a href="">','<div class="plat">';
                    echo '<h2>',$data['nom_plat'],'</h2>';
                    echo '<p>',$data['type_plat'],'</p>';
                    echo '<p>',$data['prix_plat']. '€','</p>';
                    echo '<form action="vuePlats.php?name=',$but,' method="get">';
                    echo '<input type="hidden" value="',$data['id_restau'],'"name="id_restau">';
                    echo '<input type="submit" value="ajouter au panier">';
                    echo '</form>';
                    echo '</div></a>';
                }
            }
            ?>
                
        </main>

    <?php include_once '../gabarits/footer.php'; ?>
</body>
</html>
