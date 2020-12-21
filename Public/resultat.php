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

        use App\Questionnaire;
        require "../Autoloader.php";
        Autoloader::register();
        $questionnaire = new Questionnaire();
        $questionnaire->setScore();
    ?>

    <main>
        <div class="hide">
            <p id="user"><?= $_SESSION['user_id'] ?></p>
            <p id="sondage"><?= $_GET['s'] ?></p>
        </div>
        <section class="resultat">
            <h2>FÉLICITATION <span class="name"><?=$_SESSION['user_firstName']?></span> !</h2>
            <p>Votre vote a bien été pris en compte </p>
            <p>Vous pouvez retrouver les résultats sur la page classement !</p>
            <a href="classement.php?s=<?=$_GET['s'] ?>" class="button">CLASSEMENT</a>

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
        </section>
    </main>

    <?php
        include'../include/footer.php';
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/chat.js"></script>
</body>

</html>