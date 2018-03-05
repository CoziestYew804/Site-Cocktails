<?php
include("php/session.php");
// --- On affiche le prenom de l'utilisateur dans le cas ou il a entre son prenom --- //
if(isset($_SESSION["estConnecte"]) && $_SESSION["estConnecte"] == true){
    echo $_SESSION["InfoMembre"]["prenom"];
}
// --- On supprime l'ancienne recherche de l'utilisateur --- //
$_SESSION['nav']="<span>Aliment</span> > ";
?>

<!DOCTYPE html>
    <?php include('Donnees.inc.php');
    $type="Aliment";?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>AllTheCoktails</title>
        <script src="JS/jquery-3.1.0.min.js"></script>
        <script src="JS/fil.js"></script>
        <script src="JS/panier.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.css">
        <link rel="stylesheet" href="css/style.css">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body>

    <header class="header clearfix">
        <ul class="header__menu animate">
            <li class="header__menu__item"><a href="#">Accueil</a></li>
            <li class="header__menu__item"><a href="#">Contactez Nous</a></li>
            <li class="header__menu__item"><a href="#">À Propos</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Aliment</a>
                <div class="dropdown-content">
                    <?php foreach($Hierarchie['Aliment']['sous-categorie'] as $listeElements)
                    {
                        ?><a href='index.php?choix=<?php echo $listeElements ?>'><?php echo $listeElements ?> </a> <?php ;
                    }
                    ?>

                </div>
            </li>
            <?php
            if(isset($_SESSION["estConnecte"]) && $_SESSION["estConnecte"] == true){

                echo '<button type="button" value ="Inscription" onClick="window.location.href=\'index.php?page=compte\';"><i class="button"></i>Mon compte</button>';

            }
            else{

                echo '<button type="button" value ="Connexion" onClick="window.location.href=\'index.php?page=connexion\';">Connexion</button>
                <button type="button" value ="Inscription" onClick="window.location.href=\'index.php?page=formulaire\';">Inscription</button>';

            }
            ?>
            <button type="button" value ="Panier" onClick="window.location.href='index.php?page=panier';">Panier <?php if(($nbPanier = count($_SESSION["InfoMembre"]["panier"])) > 0){echo '<span id="parenthesePanier">(<span id="nbpanier">'.$nbPanier.'</span>)</span>';}else{ echo '<span id="parenthesePanier"><span id="nbpanier"></span></span>';}?></button>
    </header>
    </ul>




    </ul>
    </header>


    <section class="cover cover--single">
        <div class="cover__filter"></div>
        <div class="cover__caption">
            <div class="cover__caption__copy">
                <h1>All The Cocktails </h1>
                <h2>Number 1 reference for coktails recipes</h2>
            </div>
        </div>
    </section>


    </div>
    <article class="panel">
        <div class="panel__copy">
            <?php
            if(isset($_GET["page"])){
                echo "<section>";

                switch($_GET["page"]){
                    case "formulaire" :
                        afficherFormulaire();
                        break;
                    case "connexion" :
                        afficherConnexion();
                        break;
                    case "compte" :
                        afficherCompte();
                        break;
                    case "panier" :
                        afficherPanier();
                        break;
                }
                echo "</section>";
            }?>
            <h1>Bienvenue sur AllTheCocktails ! </h1>
            <p> Vous trouverez toutes les recettes de cocktails pour vos soirèes !</p>
            <p>Choisissez une categorie ! </p>
        </div>
    </article>



    <section class="banner clearfix">
        <div class="banner__image"></div>
        <div class="banner__copy">
            <div class="banner__copy__text">
                <h3>Règle numéro 1</h3>
                <h4>Ne pas conduire après avoir consommeé trop d'alcool</h4>
                <p>Non seulement prendre le volant après avoir trop bu est irréfléchi, mais c’est dangereux pour soi et pour autrui.</p>
            </div>
        </div>
    </section>

    <section class="banner clearfix">
        <div class="banner__copy">
            <div class="banner__copy__text">
                <h3>Règle numéro 2</h3>
                <h4>Respecter ses propres limites</h4>
                <p>Devant l’alcool, nous ne sommes pas égaux.Ne vous fiez surtout pas à ce que consomme votre voisin, votre collègue ou toute autre personne pour fixer vos propres limites de consommation.</p>
            </div>
        </div>
        <div class="banner__image"></div>
    </section>



    <footer class="footer">
        <p>Copyright - Amin Raziq And Kevin Zochowski L3 Informatique UFR MIM Metz</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

            $(".header__icon-bar").click(function(e){

                $(".header__menu").toggleClass('is-open');
                e.preventDefault();

            });
        });
    </script>


    </body>
    </html>
