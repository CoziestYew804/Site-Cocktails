<?php
	include("php/GestionFormulaire.php")
?>
<!DOCTYPE html>
<html>

<head>
      <title>Vos données</title>
	  <meta charset="utf-8" />
</head>
<body>

<h1 class="titre">Inscription</h1>

<?php 
	// --- Affiche les erreurs (si elles existent) --- //
    if(isset($submit)&&$erreurs!="")
	{
		echo '<div class="affErreur">Merci de remplir correctement les champs ci-dessous :</div><ul class="affErreurUL">'.$erreurs.'</ul>';
	}
?>
    
<form method="post" action="#" >
<fieldset>
		
        <p>Rentrez vos informations ci-desous :</p>
        <input type="text" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo;}  if(!$zonePseudo){echo '"class="erreur';} ?>" required="required" placeholder="Pseudo" />
    
        <input class ="nom" type="text" name="nom" value="<?php if(isset($nom)){echo $nom;} if(!$zoneNom){echo '"class="erreur';} ?>" placeholder="Nom"/>
   
    
	    <input class="prenom" type="text" name="prenom" value="<?php if(isset($prenom)){echo $prenom;}  if(!$zonePrenom){echo '"class="erreur';} ?>" placeholder="Prénom" />
    
        <input type="password" id="mdp1" name="mdp1" value="<?php if(isset($mdp1)){echo $mdp1;}  if(!$zoneMdp1){echo '"class="erreur';} ?>" required="required" placeholder="Mot de passe"/>
   
        <input type="password" id="mdp2" name="mdp2" value="<?php if(isset($mdp2)){echo $mdp2;}  if(!$zoneMdp2){echo '"class="erreur';} ?>" required="required" placeholder="Confirmer mot de passe" required="required"/>
        
        <input type="text" name="phone" value="<?php if(isset($phone)){echo $phone;}  if(!$zonePhone){echo '"class="erreur';} ?>" placeholder="Numéro de téléphone"/>
        
        <input type="text" name="adresse" value="<?php if(isset($adresse)){echo $adresse;}  if(!$zoneAdresse){echo '"class="erreur';} ?>" placeholder="Adresse"/>
    
        <input type="text" name="ville" value="<?php if(isset($ville)){echo $ville;}  if(!$zoneVille){echo '"class="erreur';} ?>" placeholder="Ville"/>

        <input type="text" name="code" value="<?php if(isset($code)){echo $code;}  if(!$zoneCode){echo '"class="erreur';} ?>" placeholder="Code Postal"/>

        <input type="email" name="email" value="<?php if(isset($email)){echo $email;}  if(!$zoneEmail){echo '"class="erreur';} ?>" placeholder="E-mail"/>
    
        <input type="text" name="naissance" value="<?php if(isset($naissance)){echo $naissance;}  if(!$zoneDate){echo '"class="erreur';}?>" placeholder="Date de naissance (jj/mm/aaaa)"/>

        <br>
		<input class="check" type="radio" name="sexe" value="f" <?php if((isset($sexe))&&($sexe=='f')){echo "checked";} ?>/><label class="<?php if(!$zoneSexe){echo "erreurCheck";} ?>">femme</label>
		<input class="check <?php if(!$zoneSexe){echo "erreurCheck";} ?>" type="radio" name="sexe" value="h" <?php if((isset($sexe))&&($sexe=='h')){echo "checked";} ?>/><label class="<?php if(!$zoneSexe){echo "erreurCheck";} ?>">homme</label>

</fieldset>
<input type="submit" name="submit" value="Valider" />
         
</form>

</body>
</html>