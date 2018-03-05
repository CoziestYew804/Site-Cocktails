<?php
    extract($_POST);
	$erreurs = "";
	$zoneSexe = TRUE;
	$zoneNom = TRUE;
	$zonePrenom = TRUE;
	$zoneDate = TRUE;
	$zoneEmail = TRUE;
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
            file_put_contents('Membres.data', serialize(""));
        }
        $membres = unserialize(file_get_contents('Membres.data'));
        
        
        if(isset($sexe))
        {
            if($sexe!='h'&&$sexe!='f')
            {
			     $erreurs = $erreurs."<li>Sexe non choisis</li>";
			     $zoneSexe = FALSE;
            }  
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
		if(strlen(trim($email))<=2 && strlen(trim($email))>0){
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $erreurs = $erreurs."<li>E-mail non valide</li>";
                $zoneEmail = FALSE;
            }
		}
        if((strlen(trim($mdp1))<=6) && strlen(trim($mdp1))>0){
			$erreurs = $erreurs."<li>Mot de passe non conforme</li>";
			$zoneMdp1 = FALSE;
		}
        
        if(isset($mdp1)){
            if(!(isset($mdp2))||(trim($mdp1)!=trim($mdp2)))
            {
                $erreurs = $erreurs."<li>Les mots de passe ne sont pas identiques</li>";
                $zoneMdp2 = FALSE;
                $zoneMdp1 = FALSE;
            }
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
        
        $membres = unserialize(file_get_contents('Membres.data'));
		
		if($erreurs==""){
            if(isset($mdp) && md5($mdp1) != md5($_SESSION["InfoMembre"]["password"]))
                $_SESSION["InfoMembre"]["password"] = md5($mdp1);
            
            if(isset($nom) && $_SESSION["InfoMembre"]["nom"] != $nom)
                $_SESSION["InfoMembre"]["nom"] = $nom;
            
            if(isset($prenom) && $_SESSION["InfoMembre"]["prenom"] != $prenom)
                $_SESSION["InfoMembre"]["prenom"] = $prenom;
            
            if(isset($email) && $_SESSION["InfoMembre"]["email"] != $email)
                $_SESSION["InfoMembre"]["email"] = $email;
            
            if(isset($naissance) && $_SESSION["InfoMembre"]["naissance"] != $naissance)
                $_SESSION["InfoMembre"]["naissance"] = $naissance;
            
            if(isset($sexe) && $_SESSION["InfoMembre"]["sexe"] != $sexe)
                $_SESSION["InfoMembre"]["sexe"] = $sexe;
        
            if(isset($phone) && $_SESSION["InfoMembre"]["tel"] != $phone)
                $_SESSION["InfoMembre"]["tel"] = $phone;
            
            if(isset($adresse) && $_SESSION["InfoMembre"]["adresse"] != $adresse)
                $_SESSION["InfoMembre"]["adresse"] = $adresse;
            
            if(isset($ville) && $_SESSION["InfoMembre"]["ville"] != $ville)
                $_SESSION["InfoMembre"]["ville"] = $ville;
            
            if(isset($code) && $_SESSION["InfoMembre"]["code"] != $code)
                $_SESSION["InfoMembre"]["code"] = $code;
            
        
            $membres[$_SESSION["InfoMembre"]["id"]] = $_SESSION["InfoMembre"];
            file_put_contents('Membres.data', serialize($membres));        
            
            echo '<script> window.location.href="index.php?page=compte" </script>';
        }
    }
?>