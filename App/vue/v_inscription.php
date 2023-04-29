<section id="inscription">
    <form method="POST" action="index.php?uc=inscription&action=creerClient">
        <fieldset>
            <legend>Inscription</legend>

            <p>
                <label for="nom">Nom :</label>
                <input id="nom" type="text" name="nom" maxlength="90">
            </p>
            <p>
                <label for="prenom">Prenom :</label>
                <input id="prenom" type="text" name="prenom" maxlength="90">
            </p>
            <p>
                <label for="email">Email :</label>
                <input id="email" type="email" name="email" maxlength="100">
            </p>
            <p>
                <label for="telephone">Téléphone : </label>
                <input type="text" id="telephone" name="telephone" maxlength="15">
            </p>
            <p>
                <label for="mdp">Mot de passe :</label>
                <input id="mdp" type="text" name="mdp" minlength="6" maxlength="90">
            </p>
            <div>
                <input type="submit" value="Valider" name="Valider">
                <input type="reset" value="Annuler" name="Annuler">
            </div>
    </form>
</section>