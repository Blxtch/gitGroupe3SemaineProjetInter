<?php require '../index.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel= "stylesheet" href="../css/stylePlats.css">
</head>
<body>
    <?php include_once '../gabarits/header.php'; ?>
        <main>
            <?php 

            $varPlats = $db->accessListePlats();

            while ($data = $varRestau->fetch()) {
                echo '<h2>',$data['nom_restau'],'</h2>';
                echo '<p>',$data['type_restau'],'</p>';
                echo '<p>',$data['descriptio'],'</p>';
                echo '<p>',$data['note_restau'], '★','</p>';
                echo '</div></a>';
            }
            ?>
        </main>

    <?php include_once '../gabarits/footer.php'; ?>
</body>
</html>
