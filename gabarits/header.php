<header>
    <img src="img/logo.png" alt="" id='sans'>
    <img src="../img/logo.png" alt="" id="avec">  


    <nav>
        <ul>
            <li><a href="../index.php">Accueil</a></li>
            <?php
            
                if (isset($_SESSION['class'])){
                    if ($_SESSION['class'] > 0) {
                        echo '<li><a href="vueDashboard.php">Dashboard</a></li>';
                    }
                    else{
                    }
                }
             ?>
            
            <li><a href='vuePanier.php class ="header"'>Panier</a></li>
            <li><a href='vueCommande.php class ="header"'>Commandes</a></li>
        </ul>
    </nav>
</header>