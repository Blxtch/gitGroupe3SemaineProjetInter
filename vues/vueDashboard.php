<?php 
include_once '../index.php';
    //fetch le niveau d'accès du user
    //ensuite dans un if gérer l'affichage

    //si client (pas prendre en compte ils ne devraient pas y acceder a gerer dans l'index)
    //si modo -> peux insert dans la table listPlat ET update cette même table AND update de l'horaire 

    //si admin -> fct modo + insert table listRestau ET update listRestau (pas de gestion de delete enfin pour l'instant)
?>
<h1>DASHBOARD</h1>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel= "stylesheet" href="../css/stylePlats.css">
</head>
<body>
    <?php include_once '../gabarits/header.php';
        $modif = $db -> accessListePlats();
        echo '<div id="modif">';
        echo '<form action="vueDashboard.php" method="post">';
        echo '<p> Nom: ', '<input type = "text" name="nom_restau">';
        echo '<p> type: ', '<input type = "text" name="type_restau">';
        echo '<p> Note: ', '<input type = "number" name="note_restau">';
        echo '<p> Description: ', '<input type = "textarea" name="descriptio">';
        echo '<p> <input type="submit" value="Envoyer" name="ok" ></p>';
        echo '</form>';
    include_once '../gabarits/footer.php';
    ?>
</body>

