<?php

class M_Article
{
    public static function trouvetoutLesTypesArticles($idtype_articles)
    {
        $req = "SELECT articles.*, type_articles.* 
        FROM articles
        JOIN type_articles on articles.type_article_id = type_articles.idtype_articles
        WHERE idtype_articles = :id";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idtype_articles, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    public static function trouvetoutesLesEspeces($idespeces)
    {
        $req = "SELECT articles.*, especes.*
        FROM articles
        JOIN especes on articles.especes_id = especes.idespeces
        WHERE idespeces = :id";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idespeces, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    public static function trouvetouteslesCategorie($idcategorie)
    {
        $req = "SELECT articles.*, categories.* 
        FROM articles
        JOIN categories on articles.categorie_id = categories.idcategorie
        WHERE idcategorie = :id";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idcategorie, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    public static function trouveToutLesArticles($idarticles)
    {
        $req = "SELECT articles.*  
        FROM articles
        WHERE articles.idarticles = :id;";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idarticles, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    public static function trouveLesArticlesDeCategorie($idcategorie) {
        $req = "SELECT articles.*, categories.* 
        FROM articles
        JOIN categories on articles.categorie_id = categories.idcategorie
        -- WHERE idcategorie = :id
        -- JOIN lignes_commande_client ON lignes_commande_client.article_id=articles.idarticles 
        -- WHERE articles.idarticle NOT IN (SELECT article_id FROM lignes_commande_client WHERE article_id IS NOT NULL)
        WHERE idcategorie = :id";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $idcategorie, PDO::PARAM_INT);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesLignes;
    }
    public static function trouveLesArticlesDuTableau($desIdArticles)
    {
        $nbProduits = count($desIdArticles);
        $lesProduits = array();
        if ($nbProduits != 0) {
            foreach ($desIdArticles as $unIdProduit) {
                $req = "SELECT articles.*
                FROM articles 
                WHERE articles.idarticles = :unIdProduit";
                $pdo = AccesDonnees::getPdo();
                $stmt = $pdo->prepare($req);
                $stmt->bindParam(':unIdProduit', $unIdProduit, PDO::PARAM_INT);
                $stmt->execute();
                $unProduit = $stmt->fetch(PDO::FETCH_ASSOC);

                $lesProduits[] = $unProduit;
            }
        }
        return $lesProduits;
    }
    public static function trouveUnArticle($idarticles)
    {
        $req = "SELECT articles.*,categories.*,especes.*,type_articles.*
        FROM articles
        JOIN especes ON articles.especes_id = especes.idespeces
        JOIN categories ON articles.categorie_id = categories.idcategorie
        JOIN type_articles ON articles.type_article_id = type_articles.idtype_articles
        WHERE articles.idarticles = :idarticles";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idarticles', $idarticles, PDO::PARAM_INT);
        $stmt->execute();
        $learticle = $stmt->fetch(PDO::FETCH_ASSOC);
        return $learticle;
    }
}
