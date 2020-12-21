<?php

namespace App;
use Core\Database;

class User extends Database{

    public function getAccount()
	{
        //On récupere les données recu du formulaire
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $password = htmlspecialchars($_POST['password']);

        //On vérifie si des données sont trouvée dans la bdd
		$check = $this->pdo->query("SELECT * 
                                    FROM user 
                                    WHERE user_pseudo = '$pseudo'");
        $data = $check->fetch();
        $row = $check->rowcount();

        
        if ($row === 1) {
            //Si des données sont trouver on hash le pass et le compare a celui de la bdd
            $password = hash('sha256', $password);

            if ($data['user_password'] == $password) {
                session_start();
                $_SESSION['user_pseudo'] = $data['user_pseudo'];
                $_SESSION['user_id'] = $data['user_id'];
                $_SESSION['user_firstName'] = $data['user_firstName'];
                $_SESSION['user_lastName'] = $data['user_lastName'];
                $_SESSION['user_email'] = $data['user_email'];
                $online = $this->pdo->query("UPDATE user 
                                    SET user_online = 1
                                    WHERE user_id = ".$data['user_id']."");

                header('Location: login.php?login=yes&error=succes');
            }else{
                header('Location: login.php?login=yes&error=password');
            }
        }else{
            //Si aucun compte ne corespond au pseudo on renvoie un message d'erreur
            header('Location: login.php?login=yes&error=account');
        }

    }

    public function setAccount(){
        if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['lastName']) && !empty($_POST['firstName'])) {

            //On récupere les données recu et vérifie qu'il n'y a pas déjà un compte inscrit avec le meme identifiant
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $prenom = htmlspecialchars($_POST['firstName']);
            $nom = htmlspecialchars($_POST['lastName']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $check = $this->pdo->query("SELECT * 
                                        FROM user 
                                        WHERE user_pseudo = '$pseudo' OR user_email = '$email'");
            $data = $check->fetch();
            $row = $check->rowcount();

            if ($row == 0) {
                //On vérifie la taille du pseudo
                if (strlen($pseudo) <= 30) {

                    //On vérifie la taille de l'email
                    if (strlen($email) <= 100) {

                        //On vérifie la taille du mdp
                        if (strlen($password) >= 5) {

                            //On verifie qu'il s'agit bien d'une email
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                
                                //On hash le password puis envoyons les données a la bdd
                                $password = hash('sha256', $password);
                                $insert = $this->pdo->prepare("INSERT INTO user(user_pseudo,user_firstName, user_lastName, user_email, user_password, user_online) 
                                                                VALUES (:pseudo, :prenom, :nom, :email, :pass, :online)");
                                $insert = $insert->execute(array(
                                    'pseudo' => $pseudo,
                                    'prenom' => $prenom,
                                    'nom' => $nom,                                
                                    'email' => $email,
                                    'pass' => $password,
                                    'online' => 1,
                                ));
                                var_dump($insert);
                                
                                if ($insert === true) {
                                    header('location: login.php?signIn=yes&error=succes');
                                }else{
                                    header('location: login.php?signIn=yes&error=error');
                                }

                            }else {header('location: login.php?signIn=yes&error=email');}

                        }else {header('location: login.php?signIn=yes&error=password');}

                    }else {header('location: login.php?signIn=yes&error=emailLenght');}

                }else {header('location: login.php?signIn=yes&error=pseudo');}

            }else{ header('location: login.php?signIn=yes&error=already');}

        }else{ header('location: login.php?signIn=yes&error=incomplet');}
    }

    public function updateUser($champs, $value, $user)
    {
        if (!empty($value)) {
            $value = htmlspecialchars($value);
            $insert = $this->pdo->prepare("UPDATE user SET $champs= :valeur
                                            WHERE user_id = $user");
            $insert->execute(array(
                'valeur' => $value,
            ));
            $_SESSION[$champs] = $value;
            header('location: profil.php');
        }else{
            echo 'Veuillez remplir tout les champs';
        }
    }

    public function updatePassword($value, $user)
    {
        if (!empty($value)) {
            $value = hash('sha256', $value);

            $insert = $this->pdo->prepare("UPDATE user SET user_password = :valeur
                                            WHERE user_id = $user");
            $insert->execute(array(
                'valeur' => $value,
            ));
            header('location: profil.php');
        }else{
            echo 'Veuillez remplir tout les champs';
        }
    }

    public function disconnect($user)
    {
        $insert = $this->pdo->prepare("UPDATE user SET user_online = :valeur
                                        WHERE user_id = $user");
        $insert->execute(array(
            'valeur' => 0,
        ));

        session_destroy();

        header('location: login.php');
    }
}