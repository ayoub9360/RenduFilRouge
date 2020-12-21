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
        use App\Classement;
        require "../Autoloader.php";
        Autoloader::register();
        $sondage = new Classement();
    ?>

    <main>
        <section class="sondageEnCours">
            <section>
                <h2>Classement sondages</h2>
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
    </main>

    <?php
        include'../include/footer.php';
    ?>

</body>

</html>