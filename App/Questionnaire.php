<?php

namespace App;
use Core\Database;

class Questionnaire extends Database{

    public function getQuestion($sondage)
    {
        $question = $this->pdo->query("SELECT * 
                                        FROM sondage 
                                        WHERE sondage_id = $sondage");
        $question = $question->fetch();
        return $question;
    }

    public function getReponse($sondage)
    {
        $question = $this->pdo->query("SELECT * FROM sondageReponse 
                                        WHERE sondage_id = $sondage");
        $question = $question->fetchAll();
        return $question;
    }

    public function setScore()
    {
        //Enregistre les réponse recu dans la bdd
        $sondage = $_GET['s'];
        $reponse = $_GET['r'];

        $request = $this->pdo->query("UPDATE sondageReponse 
                                        SET sondageReponse_score = sondageReponse_score + 1
                                        WHERE sondage_id = $sondage AND sondageReponse_id LIKE $reponse ");
    }

}