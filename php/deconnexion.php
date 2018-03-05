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
    
    if(file_exists("../Membres.data") && estConnecte()){
        $membres = unserialize(file_get_contents('../Membres.data'));
        
        $membres[$_SESSION["InfoMembre"]["id"]]["panier"] =  $_SESSION["InfoMembre"]["panier"];
        
        $_SESSION["InfoMembre"]["panier"] = array();
        
        file_put_contents('../Membres.data', serialize($membres));
        
        session_destroy();
    }
    echo '<script> window.location.href="../index.php"</script>' ;
?>