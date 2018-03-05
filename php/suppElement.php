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
    
    // --- Supprime un element du panier --- //
    if(isset($_GET["recette"])){
        if(($key = array_search($_GET["recette"], $_SESSION["InfoMembre"]["panier"])) !== false) {
            unset($_SESSION["InfoMembre"]["panier"][$key]);
        }
        if(file_exists("Membres.data")){
            if(estConnecte()){
                $membres = unserialize(file_get_contents('Membres.data'));
                $membres[$_SESSION["InfoMembre"]["id"]]["panier"] =  $_SESSION["InfoMembre"]["panier"];
                file_put_contents('../Membres.data', serialize($membres));
            }
        }
        echo "0";
    }
    else{
        echo "1";
    }

?>