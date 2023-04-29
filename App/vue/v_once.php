<main style="display: flex; flex-direction:column; justify-content:center; align-items:center">
    <section>
        <?php
                $idarticles = $lesArticles['idarticles'];
                $description = $lesArticles['nom_article'];
                $prix = $lesArticles['prix_unitaire'];
                $image = $lesArticles['image_article'];
                $quantite = $lesArticles['quantite'];
                $espece = $lesArticles['especes'];
                $type_article = $lesArticles['nom_type'];
                $categorie = $lesArticles['nom_categorie']
    ?>
                <article id="fleurs">
                    <img src="public/images/Carousel/<?= $image ?>" alt="Image de <?= $description; ?>" width="200px" height="200px"/>
                        <p><?= $description ?></p>
                        <p><?= "Prix :   $prix  Euros par $type_article<br>  $quantite en stock <br> Cette plante fait partie de l'espece des $espece<br>"?></p>

                        <a href="index.php?uc=visite&article=<?= $idarticles ?>&action=ajouterAuPanier">
                                <img src="public/images/mettrepanier.png" title="Ajouter au panier" class="add"/>
                            </a>
                </article>
    </section>
</main>