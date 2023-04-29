<?php
include 'App/modele/M_Article.php';
include 'App/modele/M_categorie.php';
include 'App/modele/M_Tout.php';
include 'App/modele/M_Type_Articles.php';
include 'App/modele/M_Especes.php';
include 'App/modele/M_commande.php';

switch ($action) {
    case 'voirTout':
        $tout = filter_input(INPUT_GET, 'tout');
        $lesArticles = M_Article::trouveToutLesArticles($tout);
        break;
    case 'voircategorie':
        $categories = filter_input(INPUT_GET, 'categorie');
        $lesArticles = M_Article::trouvetouteslesCategorie($categories);
        break;
    case 'voirtypeArticles':
        $typeArticle = filter_input(INPUT_GET, 'typeArticles');
        $lesArticles = M_Article::trouvetoutLesTypesArticles($typeArticle);
        break;
    case 'voirespeces':
        $especes = filter_input(INPUT_GET, 'especes');
        $lesArticles = M_Article::trouvetoutesLesEspeces($especes);
        break;
        case 'ajouterAuPanier' :
        $idArticle = filter_input(INPUT_GET, 'article');
        $categories = filter_input(INPUT_GET, 'categorie');
        if (!ajouterAuPanier($idArticle)) {
             afficheErreurs(["Cet article est déjà dans le panier !!"]);
        } else {
             afficheMessage("Cet article a été ajouté");
        }
        $lesArticles = M_Article::trouveLesArticlesDeCategorie($categories);
        break;
    default:
        $lesArticles = [];
        break;
}

$tout = M_Tout::trouveLesArticles();
$categories = M_Categorie::trouvelesCategories();
$typeArticle = M_Type_Articles::trouveLesTypesArticles();
$especes = M_Especes::trouveLesEspeces();