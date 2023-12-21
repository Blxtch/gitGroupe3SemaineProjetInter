<?php //require_once '../index.php';
//require_once 'db.php';
if (isset ($_SESSION['id'])) {
    include 'vueAccueil.php';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DelivISIM | Connexion</title>
    <link rel= "stylesheet" href="css/styleLogin.css">
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>

        <?php if (!empty($message)): ?>
            <p style="color:red"><?= $message ?></p>
        <?php endif; ?>

        <form action="index.php" method="post">
            <div>
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username">
            </div>

            <div>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password">
            </div>

            <div>
                <input type="submit" value="Se connecter">
            </div>
        </form>
    </div>

    </body>
    </html>

<?php 

?>
