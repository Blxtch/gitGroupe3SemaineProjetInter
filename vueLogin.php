<?php

include("config.php");
include ("Modele.php");
$bdd = getBdd();

$message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $temp = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $password = $temp;

    echo $password;

    $sql = $bdd->prepare("SELECT * FROM users WHERE login_user = :username");
    $sql->execute(['username' => $username]);
    $user = $sql->fetch();

    $mdp_user = password_hach($user['mdp_user'], PASSWORD_DEFAULT);

    echo $mdp_user;

    if ($user && password_verify($password, $mdp_user)) {
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
    <link rel= "stylesheet" href="style.css">
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

    .login-container {
        max-width: 400px;
        margin: 100px auto;
        background-color: #fff;
        padding: 20px 30px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h2 {
        margin-top: 0;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #555;
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    p {
        color: red;
        font-weight: bold;
    }
</style>
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
