    <?php

    require_once "index.php";


    $message = '';

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $temp = hash('sha256', $_POST['password']);
        $password = $temp;

        $sql = $db->prepare("SELECT * FROM users WHERE login_user = :username");
        $sql->execute(['username' => $username]);
        $user = $sql->fetch();

        
        $mdp_user = hash('sha256', $user['mdp_user']);

        if ($user && $password == $mdp_user) {
            session_start();
            $_SESSION['id'] = $user['id_user'];
            header('Location: vueAccueil.php');
        } else {
            $message = 'Mauvais identifiants';
        }
    }
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel= "stylesheet" href="styleLogin.css">
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>

        <?php if (!empty($message)): ?>
            <p style="color:red"><?= $message ?></p>
        <?php endif; ?>

        <form action="vueLogin.php" method="post">
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
