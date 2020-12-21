<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fils Rouge</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <?php
        include'../include/nav.php';

        use App\Classement;
        require "../Autoloader.php";
        Autoloader::register();
        $sondage = new Classement();
    ?>

    <main>

        <section class="classement">

            <article class="deuxieme">
                <section>
                    <?php
                        $sondage->selectSondage();
                    ?>
                </section>
                <h2>2E</h2>
                <p>
                    <?php 
                        $reponse = $sondage->getScore(1);
                        echo $reponse['sondageReponse_reponse']
                    ?>
                </p>
            </article>

            <article class="premier">
                <section>
                    <?php
                        $sondage->selectSondage();
                    ?>
                </section>
                <h2>1ER</h2>
                <p>
                    <?php 
                        $reponse = $sondage->getScore(0);
                        echo $reponse['sondageReponse_reponse']
                    ?>
                </p>
            </article>

            <article class="troisieme">
                <section>
                    <?php
                        $sondage->selectSondage();
                    ?>
                </section>
                <h2>3E</h2>
                <p>
                    <?php 
                        $reponse = $sondage->getScore(2);
                        echo $reponse['sondageReponse_reponse']
                    ?>
                </p>
            </article>
        </section>
        <div class="hide">
            <p id="user"><?= $_SESSION['user_id'] ?></p>
            <p id="sondage"><?= $_GET['s'] ?></p>
        </div>

        <section class="resultat" id="classementResultat">
            <section class="chat">
                <article id="zoneMessage">
                    <p>Discutez avec vos amis a propos de ce sondage !</p>
                </article>
                <hr>
                <article class="entreMessage">
                    <form action="#">
                        <input type="text" placeholder="Entrez votre message..." name="message" id="chat">
                        <button type="submit" id="submit">Envoyer</button>
                    </form>
                </article>
            </section>
            <section class="chat">
                <article>
                    <h1>Résultat</h1>
                </article>
                <article>
                    <ul id="zoneReponse">
                        <li>Reponse 1: 2 votes</li>
                        <li>Reponse 2: 4 votes</li>
                    </ul>
                </article>
            </section>
        </section>
    </main>

    <?php
        include'../include/footer.php';
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/chat.js"></script>
</body>

</html>