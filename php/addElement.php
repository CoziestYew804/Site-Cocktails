<?php
    session_start();
    function estConnecte(){
        if(isset($_SESSION["estConnecte"])){
            return  $_SESSION["estConnecte"];
        }
        else{
            return false;
        }
        return false;
    }
    
    // --- Fonction qui verifie si un cocktail est dans le panier --- //
    // $numeroCocktail numero du cocktail qu'on cherche
    function cocktailDejaDansPanier($numeroCocktail){
        foreach($_SESSION["InfoMembre"]["panier"] as $numeroCocktailPanier){
            if($numeroCocktailPanier == $numeroCocktail)
                return true;
        }
        return false;
    }
    
    // ---  Ajoute un element dans le panier --- //
    if(isset($_GET["recette"]) && !cocktailDejaDansPanier($_GET["recette"])){
        $_SESSION["InfoMembre"]["panier"][] = $_GET["recette"];
        echo $_GET["recette"];
        if(file_exists("../Membres.data")){
            if(estConnecte()){
                $membres = unserialize(file_get_contents('../Membres.data'));
                $membres[$_SESSION["InfoMembre"]["id"]]["panier"] =  $_SESSION["InfoMembre"]["panier"];
                file_put_contents('../Membres.data', serialize($membres));
            }
        }
    }
    else{
        echo "1";
    }
?>