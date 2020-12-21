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
        use App\User;
        require "../Autoloader.php";
        Autoloader::register();

        $user = new User();
    ?>

    <?php
        include'../include/nav.php';
    ?>

    <main>

        <?php
            if (isset($_GET['signIn'])) {

                if ($_GET['signIn'] == 'yes') {
                    //Envoie des données d'inscription ici
                    if (!isset($_GET['error'])) {
                        $user->setAccount();
                    }

                    //Affiche message de confirmation ou d'erreur
                    ?>
                        <section class="loginContainer">
                            <section class="login">
                    <?php
                    if (isset($_GET["error"])) {
                        switch ($_GET["error"]) {

                            case 'incomplet':
                                echo '<h1>Veuillez remplir tout les champs !<h1> <a href="login.php?signIn" class="button">INSCRIPTION</a>';
                                break;
                            case 'already':
                                echo '<h1>Ce compte existe déjà, veuillez vous connecter !<h1> <a href="login.php" class="button">CONNEXION</a>';
                                break;
                            case 'pseudo':
                                echo '<h1>Votre pseudo fait plus de 30 caracteres !<h1> <a href="login.php?signIn" class="button">INSCRIPTION</a>';
                                break;
                            case 'email':
                                echo '<h1>Ceci n\'est pas une adresse email !<h1> <a href="login.php?signIn" class="button">INSCRIPTION</a>';
                                break;
                            case 'emailLenght':
                                echo '<h1>Votre adresse email fait plus de 100 caracteres !<h1> <a href="login.php?signIn" class="button">INSCRIPTION</a>';
                                break;
                            case 'succes':
                                echo '<h1>Vous êtes maintenant bien inscrit !<h1> <a href="login.php" class="button">CONNEXION</a>';
                                break;
                            case 'error':
                                echo '<h1>Un probleme est survenue ! veuillez réessayer plus tard<h1> <a href="login.php" class="button">CONNEXION</a>';
                                break;
                            case 'password':
                                echo '<h1>Votre mdp doit faire plus de 5 caracteres !<h1> <a href="login.php" class="button">CONNEXION</a>';
                                break;
                        }    
                    }
                    ?>
                            </section>
                        </section>
                    <?php
                }else{
                    ?>
                    <section class="loginContainer">

                        <section class="login">
                            <h1>INSCRIPTION</h1>

                            <form action="login.php?signIn=yes" method="post">
                                <label for="pseudo">pseudo :</label>
                                <input type="text" placeholder="Pseudo" name="pseudo" id="pseudo">

                                <label for="email">email :</label>
                                <input type="email" placeholder="Email" name="email" id="email">
                                
                                <label for="firstName">nom :</label>
                                <input type="text" placeholder="Prenom" name="firstName" id="firstName">

                                <label for="lastName">prenom :</label>
                                <input type="text" placeholder="Nom" name="lastName" id="lastName">
                                
                                <label for="password">MDP :</label>
                                <input type="password" placeholder="Password" name="password" id="password">
                                
                                <button type="submit" class="button">INSCRIPTION</button>
                            </form>

                            <p><a href="login.php" title="Page Connexion">Connexion</a></p>
                        </section>
                    </section>
                    <?php
                }
            }else{
                if (isset($_GET['login'])) {
                    if (!isset($_GET['error'])) {
                        $user->getAccount();
                    }
                
                ?>
                    <section class="loginContainer">
                    <section class="login">
                <?php
                    switch ($_GET["error"]) {
                        case 'account':
                            echo '<h1>Aucun compte trouver, veuillez vous inscrire !<h1> <a href="login.php?signIn" class="button">INSCRIPTION</a>';
                            break;
                        case 'password':
                            echo '<h1>Votre mot de passe est incorret !<h1> <a href="login.php" class="button">CONNEXION</a>';
                            break;
                        case 'succes':
                            echo '<h1>Salut ' . $_SESSION['user_firstName'] . ' !<h1> <a href="index.php" class="button">Accueil</a>';
                            break;
                    }
                    ?>
                    
                    <?php
                }else{
                ?>
                    
                <section class="loginContainer">

                    <section class="login">
                        <h1>CONNEXION</h1>

                        <form action="login.php?login=yes" method="post">
                            <label for="pseudo">pseudo :</label>
                            <input type="pseudo" placeholder="Pseudo" name="pseudo" id="pseudo">
                            <label for="password">MDP :</label>
                            <input type="password" placeholder="Password" name="password" id="password">
                            <button type="submit" class="button">CONNEXION</button>
                        </form>

                        <p><a href="login.php?signIn" title="Page Inscription">Inscription</a></p>
                    </section>
                </section>
                <?php
            }
        }
        ?>

    </main>

    <?php
        include'../include/footer.php';
    ?>

</body>

</html>