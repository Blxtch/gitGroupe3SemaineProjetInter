<header>
    <img src="img/logo.png" alt="" id='sans'>
    <img src="../img/logo.png" alt="" id="avec">  


    <nav>
        <ul>
            <li><a href="../index.php">Accueil</a></li>
            <?php
            echo $_SESSION['id'];
                if (isset($_SESSION['id'])){
                    if ($_SESSION['id'] > 0) {
                        echo '<li><a href="vueDashboard.php">Dashboard</a></li>';
                    }
                    else{
                    }
                }
             ?>
            
            <li><a href="vuePanier.php">Panier</a></li>
            <li><a href="vueCommande.php">Commandes</a></li>
        </ul>
    </nav>
</header>