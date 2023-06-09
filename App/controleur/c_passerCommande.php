<?php

include 'App/modele/M_commande.php';

/**
 * Controleur pour les commandes
 * @author Loic LOG
 */
switch ($action) {
    case 'passerCommande' :

        $n = nbArticlesDuPanier();
        if ($n > 0) {
            if (isset($idClient) && !empty($idClient)) {
                $desIdArticles = getLesIdArticlesDuPanier();
                try {
                    M_Commande::creerCommande($idClient, $desIdArticles);
                    afficheMessage("Commande passée avec succès !");
                    supprimerPanier();
                } catch (PDOException $e) {
                    afficheErreur("Erreur lors de la commande : " . $e->getMessage());
                }
            }
        } else {
            afficheMessage("Panier vide !!");
            $uc = '';
        }
        break;
}



