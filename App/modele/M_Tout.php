<?php

/**
 * Les jeux sont rangés par catégorie
 *
 * @author Loic LOG
 */
class M_Tout {

    /**
     * Retourne tous les exemplaires et les classe en fonction de leurs id du plus récent au plus ancien sous forme d'un tableau associatif
     *
     * @return le tableau associatif des catégories
     */
    public static function trouveLesArticles() {
        $req = "SELECT * FROM articles";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
}
