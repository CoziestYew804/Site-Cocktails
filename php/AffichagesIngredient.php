<?php
    // --- Affiche les super-catégorie d'un ingredient --- //
    function afficherSuperCategorie($choix,$Hierarchie)
    {
        echo"<div>";
        if(isset($Hierarchie[$choix]['super-categorie']))
        {
            foreach($Hierarchie[$choix]['super-categorie'] as $ingredient)
            {
                echo "<a href='index.php?choix=".changerChoix($ingredient)."'><button class=\"btn_ingre\">".$ingredient."</button></a>";
            }
        }
        echo"</div>";
    }

    // --- Affiche les sous-catégorie d'un ingredient --- //
    function afficherSousCategorie($choix,$Hierarchie)
    {
        echo"<div>";
        if(isset($Hierarchie[$choix]['sous-categorie']))
        {
            foreach($Hierarchie[$choix]['sous-categorie'] as $ingredient)
            {
                echo "<a href='index.php?choix=".changerChoix($ingredient)."'><button class=\"btn_ingre\">".$ingredient."</button></a>";
            }
        }
        echo"</div>";
    }

    // --- Affiche les informations d'un ingrédient --- //
    function afficherIngredients($choix,$Hierarchie,$Recettes)
    {
        afficherSuperCategorie($choix,$Hierarchie);
        afficherSousCategorie($choix,$Hierarchie);
        foreach(afficherRecettes($choix,$Hierarchie,$Recettes) as $cle=>$recette)
        {
            echo '<a href="index.php?choix='.$cle.'"><div class="afficherRecette hoverRecette">';
            if(!file_exists(normaliseTitreImage($recette)))
            {
                echo "<img src='Images/default_cocktail.jpg'>";
            }
            else {
                echo '<img src="'.normaliseTitreImage($recette).'">';
            }
            echo '</img><p>'.$recette.'</p>';
            echo '</div></a>';
        }
        
    }

    // --- Retourne le tableau des recettes d'un ingrédient et ses sous-catégories --- //
    function afficherRecettes($choix,$Hierarchie,$Recettes)
    {
        $resultat = array();
        if(isset($Hierarchie[$choix]['sous-categorie']))
        {
            foreach($Hierarchie[$choix]['sous-categorie'] as $ingredient)
            {
                $resultat=array_replace($resultat,afficherRecettes($ingredient,$Hierarchie,$Recettes,$resultat));
            }
        }
        foreach($Recettes as $cle=>$recette)
        {
            if(array_search($choix,$recette['index'])!==false)
            {
                $resultat[$cle]=$recette['titre'];
            }
        }
        return $resultat;
    }

    function afficherBoutonSuperCategoriePrincipal($choix,$Hierarchie)
    {
        echo"<div class=\"div_btn_ingre\">";
        $i=0;
        if(isset($Hierarchie[$choix]['sous-categorie']))
        {
            foreach($Hierarchie[$choix]['sous-categorie'] as $ingredient)
            {
                $i++;
                echo "<a href='index.php?choix=".changerChoix($ingredient)."'><button class=\"btn_ingre\">".$ingredient."</button></a>  ";
                if($i==4){echo "";}
            }
        }
        echo"</div>";
    }
?>