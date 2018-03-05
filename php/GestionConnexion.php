<?php
    extract($_POST);
	$erreurs = "";
    $zonePseudo = TRUE;
    $zoneMdp = TRUE;
    
    if(!file_exists("Membres.data"))
    {
        file_put_contents('Membres.data', serialize(""));
    }
    $membres = unserialize(file_get_contents('Membres.data'));
    
	if(isset($submit)){
        $trouverMembre = false;
        if(empty($membres)){
            $membresVide = true;
        }
        else{
            $membresVide = false;
        }
        $id=-1;
        if(!$membresVide){
            while(!$trouverMembre && $id<count($membres)-1){
                $id++;
                if($membres[$id]["pseudo"] == $pseudo){
                    $trouverMembre = true;
                }
            }
        }
        
        if(!$trouverMembre){
            $erreurs = $erreurs."<li>Pseudo inconnu</li>";
            $zonePseudo = FALSE;
        }
        else{
            if(!($membres[$id]["password"] == md5($mdp))){
                $erreurs = $erreurs."<li>Mot de passe</li>";
                $zoneMdp = FALSE;
            }
        }
		if($erreurs==""){
            $_SESSION["InfoMembre"]["panier"] = array_unique(array_merge($_SESSION["InfoMembre"]["panier"],$membres[$id]["panier"]));
            $membres[$id]["panier"] = $_SESSION["InfoMembre"]["panier"];
            $_SESSION["estConnecte"]=true;
            $_SESSION["InfoMembre"] = $membres[$id];
            
            file_put_contents('Membres.data', serialize($membres));
            echo '<script> window.location.href="index.php" </script>';
        }

	}
?>