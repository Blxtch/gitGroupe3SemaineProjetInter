<header>
    <img src="img/logo.png" alt="" id='sans'>
    <img src="../img/logo.png" alt="" id="avec">  


    <nav>
        <ul>
            <li><a href="../index.php">Accueil</a></li>
            <?php
                //solution improbable qui mène à des pb de bypass à éviter
                // if (isset($_SESSION['class'])){
                //     if ($_SESSION['class'] > 0) {
                //         echo '<li><a href="vueDashboard.php">Dashboard</a></li>';
                //     }
                //     else{
                //     }
                // }
             ?>
            <li><a href="vues/vueDashboard.php">Dashboard</a></li>
            
            <li><a href="vues/vuePanier.php">Panier</a></li>
            <li><a href="vues/vueCommande.php">Commandes</a></li>
        </ul>
    </nav>
</header>