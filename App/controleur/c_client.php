<?php

include 'App/modele/M_Client.php';

switch ($action) {
    case 'creerClient' :
        // $identifiant = filter_input(INPUT_POST, 'identifiant');
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        // $ville = filter_input(INPUT_POST, 'ville');
        // $cp = filter_input(INPUT_POST, 'cp');
        // $adresse = filter_input(INPUT_POST, 'adresse');
        $email = filter_input(INPUT_POST, 'email');
        $telephone = filter_input(INPUT_POST, 'telephone');
        $mdp = filter_input(INPUT_POST, 'mdp');
        $erreurs = M_Client::creerClient($nom, $prenom, $email, $telephone, $mdp);
        if ($erreurs) {
            afficheErreurs($erreurs);
        } else {
            afficheMessage("Vous êtes bien inscrit, félicitations !");
        }
        break;
}