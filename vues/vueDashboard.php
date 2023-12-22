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
<?php include_once '../gabarits/header.php'; ?>
<body>
    
        <?php $modif = $db -> accessListePlats();

        if (isset ($_POST['ok'])) {
            $newRestau = $db-> accessModifRestau($_POST['nom_restau'], $_POST['type_restau'], $_POST['note_restau'], $_POST['descriptio']);
            }
        echo '<div class="modif-container">';
        echo '<form action="vueDashboard.php" method="post">';
        echo '<p> Nom: ', '<input type = "text" name="nom_restau">';
        echo '<p> type: ', '<input type = "text" name="type_restau">';
        echo '<p> Note: ', '<input type = "number" name="note_restau">';
        echo '<p> Description: ', '<input type = "textarea" name="descriptio">';
        echo '<p> <input type="submit" value="Envoyer" name="ok" ></p>';
        echo '</form>';
        echo '</div>';
?>
</body>

    <?php include_once '../gabarits/footer.php';?>

