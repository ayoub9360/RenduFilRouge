<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendslist</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php
    include '../include/nav.php';
?>

<body>
    <section class="loginContainer">
        <section class="login">
            <?php 

        use App\FriendList;

        require "../Autoloader.php";
        Autoloader::register();

        $friendList = new FriendList();


        if (isset($_GET['delete'])) {
            $friendList->deleteFriend($_GET['delete']);
        }

        if (isset($_GET['submit'])){
            $searchFriend = $friendList->searchFriend($_POST['recherche']);
        }

        if (isset($_GET['addFriendId'])){
            $friendList->addFriend($_GET['addFriendId'], $_SESSION['user_id']);
        }
    ?>
            <h1>Amis</h1>
            <p class="titre"><b>Liste d'amis en ligne</b></p>
            <?php
                $listFriends = $friendList->getFriendList();
            ?>
            <p class="titre"><b>Liste d'amis hors ligne</b></p>
            <?php
                $listFriendsH = $friendList->getFriendListDisconnect();
            ?>

            <p class="titre"><b>RECHERCHER UNE PERSONNE</b></p>
            <form method="POST" action="amis.php?submit=send">
                <input type="text" placeholder="Rechercher..." name="recherche">
                <input type="submit" value="Rechercher">
            </form>
            <table>

                <?php
    if (isset($_GET['submit'])){
       foreach($searchFriend as $friend):
            if ($friend['user_id'] === $_SESSION['user_id']) {
                echo '<tr><td>' . $friend["user_pseudo"] . '</td><td><p>|  Vous </p></td></tr>'; 
            }
            echo '<tr><td>' . $friend["user_pseudo"] . '</td><td><a href="amis.php?addFriendId='.$friend['user_id'] .'" class="green">|  Ajouter amis </a></td></tr>'; 
        endforeach;
    }   
              
         ?>
            </table>

        </section>
    </section>
</body>

</html>