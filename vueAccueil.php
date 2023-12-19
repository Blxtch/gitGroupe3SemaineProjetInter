<?php require "Modele.php" ?>

<?php $titre = 'login'; ?>
        <?php require 'gabarit.php'; ?>

        <form method='post'>
            <label for="login">Nom d'utilisateur:</label>
            <input type="text" id="login" name="login" required>
            <br>
            <label for="mdp">Mot de passe:</label>
            <input type="password" id="mdp" name="mdp" required>
            <br>
            <input type="submit" value="Login">
        </div>
    </div>
    
    <?php require 'footer.php'; ?>