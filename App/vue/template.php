<!DOCTYPE html>

<html>

<head>
    <title>Lafleur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/general.css" rel="stylesheet" type="text/css">
    <script src="../../public/js/main.js"></script>
    <meta charset="UTF-8">
</head>

<body>
    <header>
        <!-- Images En-tête -->
        <div class="entete">
            <a href="index.php?uc=quiSommeNous" id="gauche"> Qui somme nous? </a>
            <a href="index.php?uc=accueil"> <img src="public/images/Lafleur.png"></a>
            <div>
                <?php
                if (empty($clientSession)) {
                    echo "<li><a href = 'index.php?uc=authentification'> Connexion </a></li>";
                    echo "<li><a href = 'index.php?uc=inscription'> Inscription </a></li>";
                } else {
                    echo "<li><a href = 'index.php?uc=compte'>Mon compte</a></li>";
                    echo "<li><a href='index.php?uc=authentification&action=logoutClient'> Se déconnecter </a></li>";
                }
                ?>
                <a href="index.php?uc=panier&action=voirPanier"> Panier</a>
                <a href="index.php?uc=quiSommeNous" id="droite"> Qui somme nous? </a>
            </div>
        </div>

        <!--  Menu haut-->
        <?php
        include 'App/vue/v_nav.php';
        ?>

    </header>
    <main>
        <?php
        switch ($uc) {
            case 'accueil':
                include 'App/vue/v_accueil.php';
                break;
            case 'visite':
                include("App/vue/v_boutique.php");
                break;
            case 'panier':
                include("App/vue/v_panier.php");
                break;
            case 'Contact':
                include ("App/vue/v_contact.php");
                break;
            case 'quiSommeNous':
                include ("App/vue/v_quiSommeNous.php");
                break;
            case 'inscription':
                include("App/vue/v_inscription.php");
                break;
                // case 'consulterJeu':
                //     include 'App/modele/M_Exemplaire.php';
                //     $idJeu = filter_input(INPUT_GET, 'id');
                //     $lesJeux = M_Exemplaire::trouveUnJeu($idJeu);
                //     $laConsole = M_Exemplaire::trouveMemeConsole($idJeu);
                //     $laCategorie = M_Exemplaire::trouveMemeCategorie($idJeu);
                //     include 'App/vue/v_once.php';
                //     break;
            case 'authentification':
                include("App/vue/v_authentification.php");
                break;
            case 'compte':
                include("App/vue/v_compte.php");
                break;
            case 'consulterArticle':
                    include'App/modele/M_Article.php';
                    $idArticles = filter_input(INPUT_GET, 'idarticles');
                    $lesArticles = M_Article::trouveUnArticle($idArticles);
                    include'App/vue/v_once.php';
                    break;
            default:
                break;
        }
        ?>
    </main>
    <!-- <script src="/lafleur/public/js/main.js" defer></script> -->
<!-- <script src="../../public/js/main.js"></script> -->
<footer>
    <?php
    include 'App/vue/v_footer.php'
    ?>
</footer>
</body>

</html>