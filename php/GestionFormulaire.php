<?php
    extract($_POST);
	$erreurs = "";
	$zoneSexe = TRUE;
	$zoneNom = TRUE;
	$zonePrenom = TRUE;
	$zoneDate = TRUE;
	$zoneEmail = TRUE;
    $zonePseudo = TRUE;
    $zoneMdp1 = TRUE;
    $zoneMdp2 = TRUE;
    $zonePhone = TRUE;
    $zoneAdresse = TRUE;
    $zoneVille = TRUE;
    $zoneCode = TRUE;
	$affichage ="";

	if(isset($submit)){
        if(!file_exists("Membres.data"))
        {
            file_put_contents('Membres.data', serialize(array()));
            chmod("Membres.data", 0755);
        }
        
        if(isset($sexe))
        {
            if($sexe!='h'&&$sexe!='f')
            {
			     $erreurs = $erreurs."<li>Sexe non choisis</li>";
			     $zoneSexe = FALSE;
            }  
        }
        else{
            $sexe = 'h';
        }
		
		if(!(isset($pseudo))||(strlen(trim($pseudo))<=2)){
			$erreurs = $erreurs."<li>Pseudo non valide</li>";
			$zonePseudo = FALSE;
		}

        if(strlen(trim($nom))<=2&&strlen(trim($nom))>0){
			 $erreurs = $erreurs."<li>Nom non valide</li>";
			 $zoneNom = FALSE;
        }
        
		if(strlen(trim($prenom))<=2&&strlen(trim($prenom))>0){
            if(!(ctype_alpha(trim($prenom))))
            {
                $erreurs = $erreurs."<li>Prenom non valide</li>";
                $zonePrenom = FALSE;
            }
		}
		if(strlen(trim($email))<=2&&strlen(trim($email))>0){
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $erreurs = $erreurs."<li>E-mail non valide</li>";
                $zoneEmail = FALSE;
            }
		}
        if((isset($mdp1)) && (strlen(trim($mdp1))<=6)){
			$erreurs = $erreurs."<li>Mot de passe non conforme</li>";
			$zoneMdp1 = FALSE;
		}
        
        if(!(isset($mdp2))||(trim($mdp1)!=trim($mdp2)))
        {
            $erreurs = $erreurs."<li>Les mots de passe ne sont pas identiques</li>";
			$zoneMdp2 = FALSE;
        }
        
        if(!(isset($adresse)))
        {
            $erreurs = $erreurs."<li>Adresse non valide</li>";
			$zoneAdresse = FALSE;
        }
        if(strlen(trim($ville))<=2&&strlen(trim($ville))>0)
        {
            $erreurs = $erreurs."<li>Ville non valide</li>";
			$zoneVille = FALSE;
        }
        if(strlen(trim($code))>0){
            if((strlen(trim($code))!=5)||!ctype_digit($code))
            {
                $erreurs = $erreurs."<li>Code postal non valide</li>";
                $zoneCode = FALSE;
            }
        }
        if(strlen(trim($phone))>0){
            if(strlen(trim($phone))!=10||!ctype_digit($phone))
            {
                $erreurs = $erreurs."<li>Numéro de téléphone non valide</li>";
                $zonePhone = FALSE;
            }
        }
        if(strlen(trim($naissance))>0)
        {
            if(preg_match("/^([0-9]{2}[\/][0-1][0-9][\/][0-9]{2,4})$/",$naissance)){
                list($day,$month,$year)=explode('/',$naissance);
                if(!checkdate($month,$day,$year)) 
                { 
                    $erreurs = $erreurs."<li>Date non valide</li>";
                    $zoneDate = FALSE;
                }
            }
            else
            {
                $erreurs = $erreurs."<li>Format de Date non valide (format correct : jj/mm/aaaa)</li>";
                $zoneDate = FALSE;    
            }
        }
        

        $buffer = file_get_contents('Membres.data');
        $membres = unserialize($buffer);
        foreach($membres as $IDmembre => $InfoMembre){
            if ($InfoMembre["pseudo"] == $pseudo){
                $erreurs = $erreurs."<li>Pseudo déja utilisé.</li>";
                $zonePseudo = FALSE;
            } 
        }
		
		if($erreurs==""){
            $mdp = md5($mdp1);
    
            $NouveauMembre = array(
                "id" => count($membres), //nb de membres déja inscrit
                "pseudo" => $pseudo,
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "password" => $mdp,
                "naissance" => $naissance,
                "sexe" => $sexe,
                "tel" => $phone,
                "adresse" => $adresse,
                "ville" => $ville,
                "code" => $code,
                "panier" => $_SESSION["InfoMembre"]["panier"]
            );
        
            $membres[] = $NouveauMembre;
            file_put_contents('Membres.data', serialize($membres));
                    
            $_SESSION["estConnecte"]=true;
            $_SESSION["InfoMembre"] = $NouveauMembre;           
            
            echo '<script> window.location.href="index.php" </script>';
        }
    }
?>