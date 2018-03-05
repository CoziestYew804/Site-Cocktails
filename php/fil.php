<?php
    // --- Gere l'ajout d'élément au fil d'arianne  --- //
    function nav($nav,$Recettes)
    {
        if(!ctype_digit($nav)) {
            $nom="<span>".$nav."</span> > ";
            $_SESSION['nav']=$_SESSION['nav'].$nom;
            list($fil,$trop) = explode($nom, $_SESSION['nav'],2);
            $_SESSION['nav']=$fil.$nom;
        }
    }
    
    // --- Fonction qui affiche le fild'arianne --- //
    function afficherFil()
    {
        if(strlen($_SESSION['nav'])>23){
            gestionFil();
        }
    }

    // --- Gere la taille du fille d'arianne --- //
    function gestionFil()
    {
        if(strlen($_SESSION['nav'])>250)
        {
            $res = substr($_SESSION['nav'],strlen($_SESSION['nav'])-250);
            list($partie1,$partie2)=explode("</span>",$res,2);
            echo "...".$partie2;
        }
        else echo $_SESSION['nav'];
        echo"<br>";
    }
?>