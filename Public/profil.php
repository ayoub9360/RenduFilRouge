<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liset Sondage - Fils rouge</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <?php
        include'../include/nav.php';

        use App\User;
        require "../Autoloader.php";
        Autoloader::register();
        $user = new User();
    ?>

    <main>
        <section class="loginContainer">

            <section class="login">
                <h1>PROFIL</h1>
                
                <div>
                    <h2>Pseudo : </h2>
                    <p><?=$_SESSION['user_pseudo']?></p>
                    <a href="profil.php?edit=user_pseudo" class="button">modifier</a>
                </div>

                <div>
                    <h2>Email : </h2>
                    <p><?=$_SESSION['user_email']?></p>
                    <a href="profil.php?edit=user_email" class="button">modifier</a>

                </div>

                <div>
                    <h2>Mot de passe : </h2>
                    <p>**********</p>
                    <a href="profil.php?edit=user_password" class="button">modifier</a>

                </div>

                <div>
                    <h2>Nom : </h2>
                    <p><?=$_SESSION['user_lastName']?></p>
                    <a href="profil.php?edit=user_lastName" class="button">modifier</a>

                </div>

                <div>
                    <h2>Prenom : </h2>
                    <p><?=$_SESSION['user_firstName']?></p>
                    <a href="profil.php?edit=user_firstName" class="button">modifier</a>
                </div>

                <a href="profil.php?disconnect" class="button" style="background-color: red;">DECONNEXION</a>

                <?php

                    if (isset($_GET['edit'])) {
                        ?>
                            <form action="profil.php?edit=<?=$_GET['edit']?>" method="post">
                                <label for="<?=$_GET['edit']?>"><?= $_GET['edit'] ?></label>
                                <input type="text" placeholder="<?php if ($_GET['edit'] === 'user_pseudo') {echo 'Pseudo';}elseif ($_GET['edit'] === 'user_email') {echo 'Email';}elseif ($_GET['edit'] === 'user_password') {echo 'Mot de passe';}elseif ($_GET['edit'] === 'user_lastName') {echo 'Nom';}elseif ($_GET['edit'] === 'user_firstName') {echo 'Prenom';} ?>" name="<?=$_GET['edit']?>">
                                <button type="submit" class="button">MODIFIER</button>
                            </form>
                        <?php

                        if (isset($_POST[$_GET['edit']])) {
                            if ($_GET['edit'] == 'user_password') {
                                $user->updatePassword($_POST[$_GET['edit']], $_SESSION['user_id']);
                            }else{
                                $user->updateUser($_GET['edit'], $_POST[$_GET['edit']], $_SESSION['user_id']);
                            }
                        }
                    }

                    if (isset($_GET['disconnect'])) {
                        $user->disconnect($_SESSION['user_id']);
                    }

                ?>
    
                
            </section>

        </section>
    </main>

    <?php
        include'../include/footer.php';
    ?>

</body>

</html>