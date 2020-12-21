<?php

namespace App;
use Core\Database;

class Classement extends Database{

    //Affiche les sondages en cours des différents amis
    public function getSondageEnCours ($user){
        //selectionne les amis
        $listFriends = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID2 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID2 WHERE friendsList_userID1 = $user");
        $listFriends = $listFriends->fetchAll();

        //Pour chaque amis on récupere les sondage qu'il on crée et qui sont toujour en cours
        foreach ($listFriends as $friend) {

            $friend_id = $friend['friendsList_userID2'];
            $listSondageEnCours = $this->pdo->query("SELECT *
                                                    FROM sondage 
                                                    WHERE user_id = $friend_id AND sondage_finish >= NOW()
                                                    ");
            $listSondageEnCours = $listSondageEnCours->fetchAll();
            //Pour chaque sondage qu'il on crée on les affiche
            foreach ($listSondageEnCours as $Fetch) {
                echo '<article><a href="classement.php?s='.$Fetch['sondage_id'].'"><img src="'.$Fetch['sondage_image'].'" alt="'.$Fetch['sondage_question'].'"></a></article>';
            }
        }

        //selectionne les amis
        $listFriends2 = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID1 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID1 WHERE friendsList_userID2 = $user AND user_online = 1");
        $listFriends2 = $listFriends2->fetchAll();

        //Pour chaque amis on récupere les sondage qu'il on crée et qui sont toujour en cours
        foreach ($listFriends2 as $friend) {
            
            $friend_id = $friend['friendsList_userID1'];
            $listSondageEnCours = $this->pdo->query("SELECT *
                                                    FROM sondage 
                                                    WHERE user_id = $friend_id AND sondage_finish >= NOW()
                                                    ");
            $listSondageEnCours = $listSondageEnCours->fetchAll();

            //Pour chaque sondage qu'il on crée on les affiche
            foreach ($listSondageEnCours as $Fetch) {
                echo '<article><a href="classement.php?s='.$Fetch['sondage_id'].'"><img src="'.$Fetch['sondage_image'].'" alt="'.$Fetch['sondage_question'].'"></a></article>';
            }
        }

        //Pour chaque amis on récupere les sondage qu'il on crée et qui sont toujour en cours
        foreach ($listFriends as $friend) {

            $friend_id = $friend['friendsList_userID2'];
            $listSondageEnCours = $this->pdo->query("SELECT *
                                                    FROM sondage 
                                                    WHERE user_id = $friend_id AND sondage_finish <= NOW()
                                                    ");
            $listSondageEnCours = $listSondageEnCours->fetchAll();
            //Pour chaque sondage qu'il on crée on les affiche
            foreach ($listSondageEnCours as $Fetch) {
                echo '<article><a href="classement.php?s='.$Fetch['sondage_id'].'"><img class="finish" src="'.$Fetch['sondage_image'].'" alt="'.$Fetch['sondage_question'].'"></a></article>';
            }
        }

        //Pour chaque amis on récupere les sondage qu'il on crée et qui sont toujour en cours
        foreach ($listFriends2 as $friend) {

            $friend_id = $friend['friendsList_userID2'];
            $listSondageEnCours = $this->pdo->query("SELECT *
                                                    FROM sondage 
                                                    WHERE user_id = $friend_id AND sondage_finish <= NOW()
                                                    ");
            $listSondageEnCours = $listSondageEnCours->fetchAll();
            //Pour chaque sondage qu'il on crée on les affiche
            foreach ($listSondageEnCours as $Fetch) {
                echo '<article><a href="classement.php?s='.$Fetch['sondage_id'].'"><img class="finish" src="'.$Fetch['sondage_image'].'" alt="'.$Fetch['sondage_question'].'"></a></article>';
            }
        }
    }

    //Fonction qui affiche nos sondages
    public function getMesSondages($user){
        
        //selectionne nos sondages encore en cours puis les affiche
        $listSondageEnCours = $this->pdo->query("SELECT *
                                                FROM sondage 
                                                WHERE user_id = $user AND sondage_finish >= NOW()
                                                ORDER BY sondage_finish DESC
                                                ");
        $listSondageEnCours = $listSondageEnCours->fetchAll();

        foreach ($listSondageEnCours as $Fetch) {
            echo '<article><a href="classement.php?s='.$Fetch['sondage_id'].'"><img src="'.$Fetch['sondage_image'].'" alt="'.$Fetch['sondage_question'].'"></a></article>';
        }

        //selectionne nos sondages encore FINIS puis les affiche
        $listSondageEnCours = $this->pdo->query("SELECT *
                                                FROM sondage 
                                                WHERE user_id = $user AND sondage_finish <= NOW()
                                                ORDER BY sondage_finish DESC
                                                ");
        $listSondageEnCours = $listSondageEnCours->fetchAll();

        foreach ($listSondageEnCours as $Fetch) {
        echo '<article><a href="classement.php?s='.$Fetch['sondage_id'].'"><img class="finish" src="'.$Fetch['sondage_image'].'" alt="'.$Fetch['sondage_question'].'"></a></article>';
        }
    }

    public function getScore($position)
    {
        $sondage = $_GET['s'];
        $resultat = $this->pdo->query("SELECT * 
                                        FROM sondageReponse 
                                        WHERE sondage_id = $sondage
                                        ORDER BY sondageReponse_score DESC
                                        LIMIT $position,1");
        $resultat = $resultat->fetch();
        return $resultat;
    }

    public function selectSondage()
    {
        $sondage = $_GET['s'];
        $resultat = $this->pdo->query("SELECT * 
                                        FROM sondage 
                                        WHERE sondage_id = $sondage");
        $resultat = $resultat->fetch();
        echo '<img src="'.$resultat['sondage_image'].'" alt="'.$resultat['sondage_question'].'">';
    }

}