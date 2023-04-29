<div class="pageContact">
    <h1>Les dernières commandes</h1>
    <section id="compte">
        <article id="commande">
            <?php foreach ($commandesClient as $commandes) {
                $idartciles = $commandes['idarticles'];
                $libarticles = $commandes['nom_article'];
                $prix = $commandes['prix_unitaire'];
                $image = $commandes['image_article'];
                $datecommande = $commandes['commande_le'];
            ?>
                <article id="fleurs">
                    <img src="public/images/Carousel/<?= $image ?>" alt="Image de <?= $libarticles; ?>" width="200px" height="200px" />
                    <p><?= $libarticles ?></p>
                    <p><?= "Prix :   $prix  Euros <br> Commandé le : $datecommande" ?>
                    </p>
                </article>
            <?php
            }
            ?>
        </article>
        <form method="POST" action="index.php?uc=compte&action=changerProfil" style="width: 60vw;">
            <fieldset>
                <legend>Les informations du compte</legend>
                <p>
                    <label for="nom">Nom :</label>
                    <?= $clientSession['nom'] ?>
                </p>
                <p>
                    <label for="prenom">Prenom :</label>
                    <?= $clientSession['prenom'] ?>
                </p>
                <p>
                    <label for="email">Email :</label>
                    <?= $clientSession['email'] ?>
                </p>
                <p>
                    <label for="telephone">Téléphone :</label>
                    <?= $clientSession['telephone'] ?>
                </p>
        </form>
    </section>
</div>