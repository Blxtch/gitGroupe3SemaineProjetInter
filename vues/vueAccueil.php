
<?php require '../index.php';

// if (!isset($_SESSION['id'])) {
//     header('Location: vueLogin.php');
//     exit();
// }

echo $_SESSION['id'];
echo $_SESSION['login'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DelivISIM | Accueil</title>
    <link rel= "stylesheet" href="../css/styleAccueil.css">
</head>
<body>
    <?php include_once '../gabarits/header.php'; ?>
        <main>
            <?php 

            $varRestau = $db->accessListeRestau();

            while ($data = $varRestau->fetch()) {
                echo '<a href="vuePlats.php?id_restau='.$data['id_restau'].'">','<div class="restau">';
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

