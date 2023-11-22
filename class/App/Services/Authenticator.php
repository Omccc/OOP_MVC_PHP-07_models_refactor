<?php 
namespace App\Services;
use App\Models\UserManager;

class Authenticator

{
    public function __construct()

    {
        if (!isset($_SESSION)) session_start();        //si session n'est pas déjà ouverte, on l'ouvre
        
    }

    public function setSessionData(array $userData): void //on définit les données dans la session
    
    {
        $_SESSION["user"] = $userData;
    }

    public function login(string $email, string $password): bool


    {
        $user = [];
        $verif = false;
        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);
        if ($user) {

            $verif = password_verify($password,$user['password']); //je vérifie si le mot de passe correspond à celui dans la base de données


        }

        if($verif) {
            $this->setSessionData($user);
        }


        // var_dump($user); // pour voir les données de l'utilisateur
        // die();

        return $verif;
 


    }

    public function logout(): void
    {
        session_destroy();   //pour se déconnecter (on aurait pu mettre session_unset pour vider la session ; session_abort();))
    }

}