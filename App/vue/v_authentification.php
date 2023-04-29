<section id="authentification">
    <form method="POST" action="index.php?uc=authentification&action=loginClient">
        <fieldset>
            <legend>Authentication</legend>
            <p>
                <label for="email">Mail :</label>
                <input id="email" type="email" name="email" maxlength="100">
            </p>
            <p>
                <label for="mdp">Mot de passe :</label>
                <input id="mdp" type="password" name="mdp" minlength="6" maxlength="90">
            </p>
            <div>
                <input type="submit" value="Valider" name="valider">
                <input type="reset" value="Annuler" name="annuler">
            </div>
    </form>
</section>