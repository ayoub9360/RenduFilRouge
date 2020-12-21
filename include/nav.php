<?php
    session_start();
?>
<nav>
    <section class="nav">
        <article>
            <a href="../Public/index.php">
                <img src="../assets/Logo.png" alt="Logo Quiz">
            </a>
        </article>
        <article>
            <ul>
                <li><a href="../Public/index.php" title="Page Accueil">Accueil</a></li>
                <li><a href="../Public/sondage.php" title="Page Sondage">Sondage</a></li>
                <li><a href="../Public/listeClassement.php" title="Page Classement">Classement</a></li>
                <?php if (isset($_SESSION['user_pseudo'])) { ?><li><a href="../Public/createSondage.php" title="Page Creation Sondage">Crée un sondage</a></li><?php }?>
                <?php if (isset($_SESSION['user_pseudo'])) { ?><li><a href="../Public/amis.php" title="Page Amis">Amis</a></li><?php }?>
                <li><a href="../public/<?php if (isset($_SESSION['user_pseudo'])) {echo 'profil.php';}else{echo 'login.php';}?>" title="Page Connexion">
                    <p class="orange">
                        <?php 
                            if (isset($_SESSION['user_pseudo'])) {
                                echo $_SESSION['user_pseudo'];
                            }else{
                                echo 'Se connecter';
                            }
                        ?>
                    </p>
                        <img src="../assets/user.png" alt="Illustration connexion">
                    </a>
                </li>
            </ul>
        </article>
    </section>
</nav>