<?php

include 'App/modele/M_Client.php';

switch ($action) {
    case 'loginClient':
        $email = filter_input(INPUT_POST, 'email');
        $mdp = filter_input(INPUT_POST, 'mdp');
        $client = M_Client::trouverClientParMailEtMDP($email, $mdp);
        if (!$client) {
            afficheErreur("Entrez votre email et votre mot de passe ou enregistrez-vous sur la page Inscription");
        } else {
            $_SESSION['client'] = $client;
            header('Location: index.php');
        }
        break;
    case 'logoutClient':
        supprimerPanier();
        unset($_SESSION['client']);
        header('Location: index.php');
        die();
        break;
}