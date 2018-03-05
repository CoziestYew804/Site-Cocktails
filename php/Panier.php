<!DOCTYPE html>
<html>

<head>
      <title>Vos recettes de coktail</title>
	  <meta charset="utf-8" />
</head>

<style>
	.erreur{
		background-color : red;
	}
</style>

<body>
<h1 class="titre">Vos recettes de coktail favoris</h1>
    <button class="viderPanier">Vider le panier</button>
    <div id="panier">
        <?php
            include ("Donnees.inc.php");
            if(empty($_SESSION["InfoMembre"]["panier"])){
                echo 'Votre panier est vide :( ';
            }
            else{
                foreach($_SESSION["InfoMembre"]["panier"] as $cocktail){
                    afficherRecettePanier($cocktail,$Recettes);
                }
            }
        ?>
    </div>
    <button class="viderPanier">Vider le panier</button>
</body>
</html>
<?php
    // --- Fonction pour afficher une recette du panier --- //
    function afficherRecettePanier($cocktail,$Recettes){
        echo '
        <div id="sectionPanier'.$cocktail.'" class="sectionPanier">
        <h1>'.$Recettes[$cocktail]["titre"].'</h1><br> 
        <a href="index.php?choix='.$cocktail.'"><button>Voir cette recette en détail</button></a><button class="btn_sup" value='.$cocktail.'>Supprimer cette recette</button>
        </div>';
        echo '<div style="display:none" id="deleteCocktail'.$cocktail.'" class="sectionPanier deleteCocktail"> Recette Supprimée !
        </div>';
    }
?>