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
    
    // --- Vide le panier --- //
    if(file_exists("../Membres.data")){
        if(estConnecte()){
            $membres = unserialize(file_get_contents('../Membres.data'));
            $membres[$_SESSION["InfoMembre"]["id"]]["panier"] = array();
            file_put_contents('../Membres.data', serialize($membres));
        }
        $_SESSION["InfoMembre"]["panier"] = array();
    }
    if(empty($_SESSION["InfoMembre"]["panier"]))
        echo "0";
    else
        echo "1";
    
?>