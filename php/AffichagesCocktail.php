<?php
    // --- Affiche les informations d'un cocktail --- //
    function afficherCocktail($choix,$Hierarchie,$Recettes)
    {
        if(isset($Recettes[$choix]))
        {
            
            echo "<div class =\"recette\"><h3>".$Recettes[$choix]['titre']."</h3>";
            echo afficherBoutonAjoutSupp($choix);
            if(file_exists(normaliseTitreImage($Recettes[$choix]['titre'])))
            {
                echo "<img src='".normaliseTitreImage($Recettes[$choix]['titre'])."'></img>";
            }
            $composition = explode("|",$Recettes[$choix]['ingredients']);
            echo "<ul>";
            foreach($composition as $i)
            {
                echo "<li>".$i."</li>";
            }
            
            echo "</ul>";
            echo "<p>Preparation : ".$Recettes[$choix]['preparation']."</p><br>";  
            echo"<div class=\"div_btn_ingre\">";
            foreach($Recettes[$choix]['index'] as $ingredient)
            {
                echo "<a href='index.php?choix=".changerChoix($ingredient)."'><button class=\"btn_ingre\">".mb_strimwidth($ingredient, 0, 20, "...")."</button></a>";
            }
            echo"</div>";
            echo '</div>';
        } 
    }

    function cocktailDejaDansPanier($numeroCocktail){
        foreach($_SESSION["InfoMembre"]["panier"] as $numeroCocktailPanier){
            if($numeroCocktailPanier == $numeroCocktail)
                return true;
        }
        return false;
    }

    // --- Fonction qui affiche le bouton 'ajouter au panier' --- //
    function afficherBoutonAjoutSupp($numeroCocktail){
        if(!cocktailDejaDansPanier($numeroCocktail)){
            return '<button id="ajoutPanier" value='.$numeroCocktail.'>Ajouter au panier </button>
                    <button style="display:none" id="suppPanier" value='.$numeroCocktail.'>Supprimer du panier </button>';
            
        }
        else{
            return '<button style="display:none" id="ajoutPanier" value='.$numeroCocktail.'>Ajouter au panier </button>
                    <button id="suppPanier" value='.$numeroCocktail.'>Supprimer du panier </button>';
        }
    }
?>