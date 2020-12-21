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
        use App\Sondage;
        require "../Autoloader.php";
        Autoloader::register();

        $sondage = new Sondage();
        ?>

    <main>

        <section class="hauteur">
            <h1>Serez-Vous a la hauteur ?</h1>
            <p>Affrontez vos amis sur différents sondages et prédisez l'avenir afin de savoir lequel d'entre vous est le
            meilleur pronostiqueur dans l'âme !</p>
            <a href="#" title="#" class="button">COMMENCER</a>
        </section>

        <section class="sondageEnCours">
            <section>
                <h2>Sondages de vos amis</h2>
                <section class="sondageContainer">
                    <?php
                        $sondage->getSondageEnCours($_SESSION['user_id']);    
                    ?>
                </section>
            </section>
        </section>
        
        <section class="sondageEnCours">
            <section>
                <h2>Mes sondages</h2>
                <section class="sondageContainer">
                    <?php
                        $sondage->getMesSondages($_SESSION['user_id']);    
                    ?>
                </section>
            </section>
        </section>

        <section class="leSaviezVous">
            <h2>Le Saviez Vous ?</h2>
            <p>Une fois que vous avez jouer, vous pouvez comparer vos résultats avec ceux de vos amis !</p>
            <a href="#" title="#" class="button"> CLASSEMENT </a>
        </section>

    </main>

    <?php
        include'../include/footer.php';
    ?>

</body>

</html>