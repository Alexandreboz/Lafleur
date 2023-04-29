<?php

class M_Client {
/**
 * cette fonction créée un client et insert dans la table clients les données saisie lors de l'inscription
 *
 * @param [type] $identifiant
 * @param [type] $mdp
 * @param [type] $nom
 * @param [type] $prenom
 * @param [type] $adresse
 * @param [type] $cp
 * @param [type] $ville
 * @param [type] $mail
 * @return void
 */
    public static function creerClient( $nom,$prenom,$email,$telephone,$mdp) {
        if($erreurs = static::estValide( $nom, $prenom, $email, $telephone, $mdp)){
            return $erreurs;
        };

        $pdo = AccesDonnees::getPdo();
        $mdp = password_hash($mdp, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare('INSERT INTO client( nom,prenom,email,telephone,mdp) VALUES ( :nom, :prenom, :email, :telephone, :mdp)');
        // $stmt->bindParam(':identifiant', $identifiant);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        // $stmt->bindParam(':adresse', $adresse);
        // $stmt->bindParam(':cp', $cp);
        // $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':mdp', $mdp);
        $stmt->execute();
    }
    
    // public static function lastClient(){
    //     $idClient = AccesDonnees::getPdo()->lastInsertId();
    //     return $idClient;
    // }
/**
 * cette fonction permet de trouver un client en passant par son Id
 *
 * @param [type] $idClient
 * @return void
 */
    public static function trouverClientParId($idClient) {
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("SELECT * FROM client WHERE idclient = :idclient");
        $stmt->bindParam(":idclient", $idClient);
        $stmt->execute();
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        return $client;
    }
/**
 * cette fonction permet l'authentification en trouvant un client par son identifiant et son mot de passe
 *
 * @param [type] $identifiant
 * @param [type] $mdp
 * @return void
 */
    public static function trouverClientParMailEtMDP($email, $mdp) {
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare("SELECT * FROM client WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($client && password_verify($mdp, $client["mdp"])) {
            return $client;
        }
        return false;
    }
    
/**
 * cette fonction permet de valider l'inscription du client s'il n'a pas fait d'erreur lors de la saisie des informations demandées
 *
 * @param [type] $identifiant
 * @param [type] $mdp
 * @param [type] $nom
 * @param [type] $prenom
 * @param [type] $adresse
 * @param [type] $cp
 * @param [type] $ville
 * @param [type] $mail
 * @return void
 */
    public static function estValide($nom, $prenom, $email, $telephone, $mdp) {
        $erreurs = [];
        if ($mdp == "") {
            $erreurs[] = "Il faut saisir le champ mot de passe";
        }
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($prenom == "") {
            $erreurs[] = "Il faut saisir le champ prenom";
        }
        if ($telephone == "") {
            $erreurs[] = "Il faut saisir le champ téléphone";
        }
        if ($email == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($email)) {
            $erreurs[] = "erreur de mail";
        }
        return $erreurs;
    }


    public static function estProfilValide($nom, $prenom, $email, $telephone) {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($prenom == "") {
            $erreurs[] = "Il faut saisir le champ prenom";
        }
        if ($telephone == "") {
            $erreurs[] = "Il faut saisir le champ téléphone";
        }
        if ($email == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($email)) {
            $erreurs[] = "erreur de mail";
        }
        return $erreurs;
    }
    
}