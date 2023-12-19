<?php require 'gabarit.php' ?>

<h2>Login</h2>
    <form action="vueAccueil.php" method="post">
        <label for="login">Nom d'utilisateur:</label>
        <input type="text" id="login" name="login" required>
        <br>
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" required>
        <br>
        <input type="submit" value="Login">
    </form>
</div>