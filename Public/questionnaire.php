<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Sondage - Fils rouge</title>
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
        $question = $questionnaire->getQuestion($_GET['s']);
        $reponse = $questionnaire->getReponse($_GET['s']);
    ?>

    <main>
        <section class="questionnaire">
            <div>
                <img src="<?=$question['sondage_image'] ?>" alt="<?=$question['sondage_question'] ?>">
            </div>
            <h2><?=$question['sondage_question'] ?></h2>
            <article class="zoneReponse">
                <div><a href="resultat.php?s=<?=$_GET['s']?>&r=<?=$reponse[0]['sondageReponse_id']?>" class="button"><?= $reponse[0]['sondageReponse_reponse'] ?></a></div>
                <div><a href="resultat.php?s=<?=$_GET['s']?>&r=<?=$reponse[1]['sondageReponse_id']?>" class="button"><?= $reponse[1]['sondageReponse_reponse'] ?></a></div>
                <div><a href="resultat.php?s=<?=$_GET['s']?>&r=<?=$reponse[2]['sondageReponse_id']?>" class="button"><?= $reponse[2]['sondageReponse_reponse'] ?></a></div>
                <div><a href="resultat.php?s=<?=$_GET['s']?>&r=<?=$reponse[3]['sondageReponse_id']?>" class="button"><?= $reponse[3]['sondageReponse_reponse'] ?></a></div>
            </article>
        </section>
    </main>

    <?php
        include'../include/footer.php';
    ?>

</body>

</html>