<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Core\Controller\Controller;
use Core\Http\Response;
use Core\Session\Session;

class SecurityController extends Controller
{
    public function register():Response
    {
        $username = null;
        $unencryptedPassword = null;

        if(!empty($_POST['username'])) {$username = $_POST['username'];}
        if(!empty($_POST['password'])) {$unencryptedPassword = $_POST['password'];}

        if($username && $unencryptedPassword) {
            $userRepository = new UserRepository();

            $userExistant = $userRepository->findByUsername($username);

            if($userExistant){

            return $this->redirect("?type=security&action=register");
            }

            $user = new User();
            $user->setUsername($username);
            $user->setPassword($unencryptedPassword);

            $userRepository->save($user);


            return $this->redirect();
        }

            return $this->render("user/register", [
            "pageTitle"=> "Nouveau compte"
        ]);
    }

    public function login():Response
    {

        $username = null;
        $unencryptedPassword = null;
        if (!empty($_POST['username'])) {
            $username = $_POST['username'];
        }
        if (!empty($_POST['password'])) {
            $unencryptedPassword = $_POST['password'];
        }

        if ($username && $unencryptedPassword) {
            $userRepository = new UserRepository();

            $user = $userRepository->findByUsername($username);

            if (!$user) {

                $this->addFlash("nom d'utilisateur inconnu", "danger");
                return $this->redirect("?type=security&action=login");
            }

            if (!$user->logIn($unencryptedPassword)) {
                $this->addFlash("mot de passe incorrect ", "danger");
                return $this->redirect("?type=security&action=login");
            }


            $this->addFlash("Bienvenue " . $user->getUsername(), "success");
            return $this->redirect("?type=article&action=index");

        }




        return $this->render("user/login", [
            "pageTitle"=> "Connexion"
        ]);
    }

    public function signOut():Response
    {
        Session::remove("user");
        $this->addFlash("utilisateur déconnecté", "secondary");
        return $this->redirect("?type=article&action=index");
    }



}