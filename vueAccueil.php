<?php require 'Modele.php' ?>

<?php $titre = 'login'; ?>
        <?php require 'gabarit.php'; ?>

        <form method='post'>
            <label for='login'>Nom utilisateur: </label>
            <input type="text" id="login" name="login"/>
            <label for='password'>Mot de passe: </label>
            <input type="password" id='password' name='password'/>
            <input type="submit">
        </div>
    </div>
    
    <?php require 'footer.php'; ?>