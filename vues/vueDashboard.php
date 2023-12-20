<?php 
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
    <div>
        <form action="vueAccueil.php" method="post">
        <label for="page" >PageAccueil</label>
        <input type="submit" value="PageAccueil">
    </div>
</body>

