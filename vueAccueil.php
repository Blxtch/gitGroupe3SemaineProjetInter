<?php
require 'modele.php';
$bdd = getBdd();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel= "stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Accueil</h1>
        <p>Bienvenue sur le site de DelivISIM</p>
        <p>Vous pouvez dès à présent commander votre repas</p>
        <p>Vous pouvez également consulter les restaurants et leurs menus</p>
    </header>
        <main>
            <?php 
            $varRestau = $bdd->query('SELECT nom_restau , note_restau , id_restau FROM restaurants');
            $varRestau->execute();
            $varRestau->setFetchMode(PDO::FETCH_ASSOC);

            while ($data = $varRestau->fetch()) {
                echo '<a href="vuePlats.php?id_restau='.$data['id_restau'].'">','<div class="restau">';
                echo '<p>',$data['nom_restau'],'</p>';
                echo '<p>',$data['note_restau'],'</p>';
                echo '</div>';
            }
            ?>
        </main>
</body>
</html>