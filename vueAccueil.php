 
<?php

if ( !isset($_SESSION['id']) ) {
    header('Location: vueLogin.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel= "stylesheet" href="styleAccueil.css">
</head>
<body>

    <?php include 'header.php'; ?>
        <main>
            <?php 
            $varRestau = $bdd->query('SELECT nom_restau , note_restau , id_restau, descriptio , type_restau  FROM restaurants');
            $varRestau->execute();
            $varRestau->setFetchMode(PDO::FETCH_ASSOC);

            while ($data = $varRestau->fetch()) {
                echo '<a href="vuePlats.php?id_restau='.$data['id_restau'].'">','<div class="restau">';
                echo '<h2>',$data['nom_restau'],'</h2>';
                echo '<p>',$data['type_restau'],'</p>';
                echo '<p>',$data['descriptio'],'</p>';
                echo '<p>',$data['note_restau'], '★','</p>';
                echo '</div>';
            }
            ?>
        </main>

    <?php include 'footer.php'; ?>
</body>
</html>