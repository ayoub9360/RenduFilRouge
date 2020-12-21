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

        use App\CreateSondage;
        require "../Autoloader.php";
        Autoloader::register();

        $sondage = new CreateSondage();

        if (isset($_GET['create'])) {
            if (empty($_POST['question'])) {
                header('Location: createSondage.php?error=incomplet');
            }else{
                $createSondage = $sondage->setSondage();
            }
        }

        if (isset($_GET['finish'])) {
            if (empty($_POST['reponse1'])) {
                header('Location: createSondage.php?error=incomplet');
            }else{
                $sondage_id = $sondage->getSondage($_SESSION['user_id']);
                $i = 1;
                while (isset($_POST['reponse' . $i])) {
                    $sondage->setResponse($_POST['reponse' . $i], $sondage_id['sondage_id']);
                    $i++;
                }
            }
        }
    ?>
    <main>

        <?php
            if (isset($_GET['create'])) { 
        ?>
                <section class="loginContainer">
                    <section class="login">
                        <h1>Indiquez les réponses possibles</h1>
                        <?php if (isset($_GET['error'])){ if ($_GET['error'] === 'incomplet'){ echo '<p class="red">Veuillez remplir tout les champs<p>'; }} ?>
                        <form method="post" action="createSondage.php?finish">
                            
                            <label for="reponse1">reponse1 :</label>
                            <input type="text" name="reponse1" placeholder="Reponse 1">
                            
                            <label for="reponse2">reponse2 :</label>
                            <input type="text" name="reponse2" placeholder="Reponse 2">

                            <label for="reponse3">reponse3 :</label>
                            <input type="text" name="reponse3" placeholder="Reponse 3">

                            <label for="reponse4">reponse4 :</label>
                            <input type="text" name="reponse4" placeholder="Reponse 4">
                            
                            <button type="submit" class="button">Envoyer</button>
                        </form>
                    </section>
                </section>
        <?php
            }else{
        ?>
        <section class="loginContainer">
            <section class="login">
                <h1>Créer un sondage</h1>
                <?php if (isset($_GET['error'])){ if ($_GET['error'] === 'incomplet'){ echo '<p class="red">Veuillez remplir tout les champs<p>'; }} ?>
                <form action="createSondage.php?create" method="post" enctype="multipart/form-data">
                    <label for="pseudo">question :</label>
                    <input type="text" placeholder="Question" name="question">

                    <label for="date">date :</label>
                    <input type="date" name="date">

                    <label for="time">time :</label>
                    <input type="time" name="time">

                    <label for="image">image :</label>
                    <input type="file" name="image">

                    <button type="submit" class="button">Envoyer</button>
                </form>
            </section>
        </section>
    </main>

    <?php
        }
        include'../include/footer.php';
    ?>
</body>
<style type="text/css">
.red {
  color: orange;
}
</style>
</html>