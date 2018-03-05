<?php
	include("php/GestionMembre.php")
?>
<!DOCTYPE html>
<html>

<head>
      <title>Vos données</title>
	  <meta charset="utf-8" />
</head>
<body>

<h1 class="titre">Modifier vos informations</h1>

<?php 
	// --- Affiche les erreurs (si elles existent) --- //
    if(isset($submit)&&$erreurs!="")
	{
		echo '<div class="affErreur">Merci de remplir correctement les champs ci-dessous :</div><ul class="affErreurUL">'.$erreurs.'</ul>';
	}
?>
    
<form method="post" action="#" >
<fieldset>
		    
        <input class ="nom" type="text" name="nom" value="<?php if(isset($_SESSION["InfoMembre"]["nom"])){echo $_SESSION["InfoMembre"]["nom"];} if(!$zoneNom){echo '"class="erreur';} ?>" placeholder="Nom"/>
   
    
	    <input class="prenom" type="text" name="prenom" value="<?php if(isset($_SESSION["InfoMembre"]["prenom"])){echo $_SESSION["InfoMembre"]["prenom"];}  if(!$zonePrenom){echo '"class="erreur';} ?>" placeholder="Prénom" />
    
        <input type="password" id="mdp1" name="mdp1" value="<?php if(isset($mdp1)){echo $mdp1;}  if(!$zoneMdp1){echo '"class="erreur';} ?>"  placeholder="Nouveau mot de passe"/>
   
        <input type="password" id="mdp2" name="mdp2" value="<?php if(isset($mdp2)){echo $mdp2;}  if(!$zoneMdp2){echo '"class="erreur';} ?>" placeholder="Confirmer nouveau mot de passe"/>
        
        <input type="text" name="phone" value="<?php if(isset($_SESSION["InfoMembre"]["tel"])){echo $_SESSION["InfoMembre"]["tel"];}  if(!$zonePhone){echo '"class="erreur';} ?>" placeholder="Numéro de téléphone"/>
        
        <input type="text" name="adresse" value="<?php if(isset($_SESSION["InfoMembre"]["adresse"])){echo $_SESSION["InfoMembre"]["adresse"];}  if(!$zoneAdresse){echo '"class="erreur';} ?>" placeholder="Adresse"/>
    
        <input type="text" name="ville" value="<?php if(isset($_SESSION["InfoMembre"]["ville"])){echo $_SESSION["InfoMembre"]["ville"];}  if(!$zoneVille){echo '"class="erreur';} ?>" placeholder="Ville"/>

        <input type="text" name="code" value="<?php if(isset($_SESSION["InfoMembre"]["code"])){echo $_SESSION["InfoMembre"]["code"];}  if(!$zoneCode){echo '"class="erreur';} ?>" placeholder="Code Postal"/>

        <input type="email" name="email" value="<?php if(isset($_SESSION["InfoMembre"]["email"])){echo $_SESSION["InfoMembre"]["email"];}  if(!$zoneEmail){echo '"class="erreur';} ?>" placeholder="E-mail"/>
    
        <input type="text" name="naissance" value="<?php if(isset($_SESSION["InfoMembre"]["naissance"])){echo $_SESSION["InfoMembre"]["naissance"];}  if(!$zoneDate){echo '"class="erreur';}?>" placeholder="Date de naissance (jj/mm/aaaa)"/>

        <br>
		<input class="check" type="radio" name="sexe" value="f" <?php if((isset($sexe))&&($sexe=='f')){echo "checked";} ?>/><label class="<?php if(!$zoneSexe){echo "erreurCheck";} ?>">femme</label>
		<input class="check <?php if(!$zoneSexe){echo "erreurCheck";} ?>" type="radio" name="sexe" value="h" <?php if((isset($sexe))&&($sexe=='h')){echo "checked";} ?>/><label class="<?php if(!$zoneSexe){echo "erreurCheck";} ?>">homme</label>

</fieldset>
<input type="submit" name="submit" value="Valider" />
         
</form>

</body>
</html>