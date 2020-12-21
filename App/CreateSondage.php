<?php

namespace App;
use Core\Database;

class CreateSondage extends Database{

    public function setSondage(){

        $userid = $_SESSION['user_id'];
        $time = $_POST['date'] . ' ' . $_POST['time'];
        $question = $_POST['question'];
        $question = htmlspecialchars($question);

        //Définie les chemin d'accées
        $cheminTemporaire = $_FILES['image']['tmp_name'];
        $cheminDefinitif = '../upload/'.$_FILES['image']['name'];
        //Deplace l'image dans le répertoire choisis
        $moveIsOk = move_uploaded_file($cheminTemporaire, $cheminDefinitif);
        //Si le déplacement est bon on enregistre le chemin
        if ($moveIsOk == true) {
            $image = $cheminDefinitif;
        }
                                        
        $insert = $this->pdo->prepare("INSERT INTO sondage(sondage_question, user_id, sondage_finish, sondage_image)
                                        VALUES (:question, :userid, :time, :image)");
        $insert = $insert->execute(array(
            'question' => $question,
            'userid' => $userid,
            'time' => $time,                                
            'image' => $image,
        ));

    }

    public function getSondage($userid){

        //On récupere le dernier sondage de l'utilisateur
        $select = $this->pdo->query("SELECT * FROM sondage 
                                    WHERE user_id = $userid
                                    ORDER BY sondage_id desc
                                    LIMIT 1");
        return $select->fetch();
    }

    public function setResponse($reponse, $sondageID){
        if (!empty($reponse)) {
            $insert = $this->pdo->prepare("INSERT INTO sondageReponse(sondage_id, sondageReponse_reponse, sondageReponse_score)
                                            VALUES (:sondage_id, :sondageReponse_reponse, :sondageReponse_score)");
            $insert = $insert->execute(array(
            'sondage_id' => $sondageID,
            'sondageReponse_reponse' => $reponse,
            'sondageReponse_score' => 0,
            ));
        }else {
            header("location: createSondage.php?error=incomplet");
        }
    }

}