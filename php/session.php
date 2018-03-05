<?php
    session_start();
    //Si le panier n'existe pas, on le cree
    if(!isset($_SESSION["InfoMembre"]["panier"])){
        $_SESSION["InfoMembre"]["panier"] = array();
    }
    
?>