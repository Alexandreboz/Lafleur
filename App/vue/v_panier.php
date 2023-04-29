<section id="panier">
    <div id="articlePanier">
        <?php
        foreach ($lesArticlesDuPanier as $plusieurs) {
            $idarticles = $plusieurs['idarticles'];
            $libarticles = $plusieurs['nom_article'];
            $prix = $plusieurs['prix_unitaire'];
            $image = $plusieurs['image_article'];
            ?>
                <article id="fleurs">
                    <img src="public/images/CAROUSEL/<?= $image ?>" alt="Image de <?= $libarticles; ?>" width="300px" height="250px" />
                    <p><?= $libarticles . "<br>" ?>
                        <?= "Prix :   $prix  Euros " ?>
                    </p>
                    <a href="index.php?uc=panier&article=<?php echo $idarticles ?>&action=supprimerUnArticle" onclick="return confirm('Voulez-vous vraiment retirer cet article ?');">
                    <img src="public/images/retirerpanier.png" TITLE="Retirer du panier">
                </a>
                </article>
            <?php
        }
        ?>
    </div>

<?php 
    if (isset($clientSession['idclient'])) {
    echo "<a href=index.php?uc=commander&action=passerCommande&idClient=" . $clientSession['idclient'] . ">";
    echo '<img src="public/images/commander.jpg" title="Passer commande" >';
    echo "</a>";
    } else {
        echo "<p><strong>Vous devez vous connecter ou vous inscrire pour commander.</p>";
        echo "<a href=index.php?uc=authentification>Se connecter</a>";
        echo "<br><br>";
        echo "<a href=index.php?uc=inscription>S'inscrire</a>";
    }
    ?>
    <br>
</section>