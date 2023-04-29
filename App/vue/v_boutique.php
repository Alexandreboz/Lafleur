<section id="visite">
    <aside id="categories">
        <h3>Catégorie</h3>
        <ul class="categories">
            <?php
            foreach ($categories as $uneCategorie) {
                $idCategorie = $uneCategorie['idcategorie'];
                $libCategorie = $uneCategorie['nom_categorie'];
                ?>
                <li>
                    <a href=index.php?uc=visite&categorie=<?php echo $idCategorie ?>&action=voircategorie><?php echo $libCategorie ?></a>
                </li>
                <?php
            }
            ?>
            </ul>
            <h3>Especes</h3>
            <ul class="especes">
            <?php
            foreach ($especes as $uneEspece) {
                $idEspeces = $uneEspece['idespeces'];
                $libEspeces = $uneEspece['especes'];
                ?>
                <li>
                    <a href=index.php?uc=visite&especes=<?php echo $idEspeces ?>&action=voirespeces><?php echo ucfirst($libEspeces) ?></a>
                </li>
                
                <?php
            }
            ?>
            </ul>
             <h3>Type Article</h3>
                <ul class="typeArticles">
            <?php
            foreach ($typeArticle as $unArticle) {
                $idtypeArticle = $unArticle['idtype_articles'];
                $libtypeArticle = $unArticle['nom_type'];
                ?>
                
                <li>
                    <a href=index.php?uc=visite&typeArticles=<?php echo $idtypeArticle ?>&action=voirtypeArticles><?php echo ucfirst($libtypeArticle) ?></a>
                </li>
                
                <?php
            }
            ?>
    </aside>
        <div class="articleBoutique">
            <!-- <h3>Tous les jeux disponibles par ordre du plus récent au plus ancien ajouté dans la collection</h3> -->
            <?php
            // include 'App/controleur/c_consultation.php';
            foreach ($lesArticles as $plusieurs) {
                $idartciles = $plusieurs['idarticles'];
                $libarticles = $plusieurs['nom_article'];
                $prix = $plusieurs['prix_unitaire'];
                $image = $plusieurs['image_article'];
            ?>
                <article id="fleurs">
                    <a href="index.php?uc=consulterArticle&idarticles=<?= $idartciles ?>"><img src="public/images/CAROUSEL/<?= $image ?>" alt="Image de <?= $libarticles; ?>" width="300px" height="250px" />
                    <p style="color: #B40303;"><?= $libarticles . "<br>" ?>
                        <?= "Prix :   $prix  Euros " ?>
                    </p></a>
                    <a href="index.php?uc=visite&article=<?= $idartciles ?>&action=ajouterAuPanier">
                                <img src="public/images/mettrepanier.png" title="Ajouter au panier" class="add"/>
                            </a>
                </article>
            <?php
            }
            ?>
        </div>
</section>
