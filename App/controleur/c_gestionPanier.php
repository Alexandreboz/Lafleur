<?php
include 'App/modele/M_Article.php';
/**
 * Controleur pour la gestion du panier
 * @author Loic LOG
 */
switch ($action) {
    case 'supprimerUnArticle':
        $idArticle = filter_input(INPUT_GET, 'article');
        retirerDuPanier($idArticle);
    case 'voirPanier':
        $n = nbArticlesDuPanier();
        if ($n > 0) {
            $desIdArticles = getLesIdArticlesDuPanier();
            $lesArticlesDuPanier = M_Article::trouveLesArticlesDuTableau($desIdArticles);
        } else {
            afficheMessage("Panier Vide !!");
            $uc = '';
        }
        break;
}