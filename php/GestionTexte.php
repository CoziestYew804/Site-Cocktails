<?php    
    // --- Change la variable choix pour qu'elle soit compitible avec l'url --- /
    function changerChoix($choix)
    {
        $problemes = array(" ", "'", "\"");
        $solutions   = array("%20", "%27", "%22");
        return str_replace($problemes,$solutions,$choix);

    }

    // --- Change la variable choix à sa valeur avant le passage dans l'url --- /
    function remettreChoix($choix)
    {
        $problemes = array(" ", "'", "\"");
        $solutions   = array("%20", "%27", "%22");
        return str_replace($solutions,$problemes,$choix);
    }

    // --- Transforme le nom d'un cocktail en le nom de sa photo --- /
    function normaliseTitreImage($titre){
	   return "Photos/".strtr(ucfirst(strtolower($titre)),' ÁÀÂÄÃÅÇÉÈÊËÍÏÎÌÑÓÒÔÖÕÚÙÛÜÝáàâäãåçéèêëíìîïñóòôöõúùûüýÿ','_AAAAAACEEEEEIIIINOOOOOUUUUYaaaaaaceeeeiiiinooooouuuuyy').".jpg";
    }
?>