<?php

/**
 * Initialise le panier
 *
 * Crée une variable de type session dans le cas
 * où elle n'existe pas 
 */
function initPanier() {
    if (!isset($_SESSION['articles'])) {
        $_SESSION['articles'] = array();
    }
}

/**
 * Supprime le panier
 *
 * Supprime la variable de type session 
 */
function supprimerPanier() {
    unset($_SESSION['articles']);
}

/**
 * Ajoute un jeu au panier
 *
 * Teste si l'identifiant du jeu est déjà dans la variable session 
 * ajoute l'identifiant à la variable de type session dans le cas où
 * où l'identifiant du jeu n'a pas été trouvé
 * @param $idJeu : identifiant de jeu
 * @return vrai si le jeu n'était pas dans la variable, faux sinon 
 */
function ajouterAuPanier($idJeu) {
    $ok = false;
    if (!in_array($idJeu, $_SESSION['articles'])) {
        $_SESSION['articles'][] = $idJeu;
        $ok = true;
    }
    return $ok;
}

/**
 * Retourne les articles du panier
 *
 * Retourne le tableau des identifiants de jeu
 * @return : le tableau
 */
function getLesIdarticlesDuPanier() {
    return $_SESSION['articles'];
}

/**
 * Retourne le nombre de articles du panier
 *
 * Teste si la variable de session existe
 * et retourne le nombre d'éléments de la variable session
 * @return : le nombre 
 */
function nbarticlesDuPanier() {
    $n = 0;
    if (isset($_SESSION['articles'])) {
        $n = count($_SESSION['articles']);
    }
    return $n;
}

/**
 * Retire un de articles du panier
 *
 * Recherche l'index de l'idProduit dans la variable session
 * et détruit la valeur à ce rang
 * @param $idProduit : identifiant de jeu

 */
function retirerDuPanier($idProduit) {
    $index = array_search($idProduit, $_SESSION['articles']);
    unset($_SESSION['articles'][$index]);
}

/**
 * Affiche une liste d'erreur
 * @param array $msgErreurs
 */
function afficheErreurs(array $msgErreurs) {
    echo '<div class="erreur"><ul>';
    foreach ($msgErreurs as $erreur) {
        ?>     
        <li><?= $erreur ?></li>
        <?php
    }
    echo '</ul></div>';
}

function afficheErreur(string $msgErreur) {
    echo '<div class="erreur">' . $msgErreur . '</div>';
}

/**
 * Affiche un message bleu
 * @param string $msg
 */
function afficheMessage(string $msg) {
    echo '<div class="message">'.$msg.'</div>';
}
