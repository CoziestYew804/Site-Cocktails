<?php include("php/GestionConnexion.php");?>
<!DOCTYPE html>
<html>

<head>
      <title>Vos données</title>
	  <meta charset="utf-8" />
</head>

<style>
	.erreur{
		background-color : red;
	}
</style>

<body>

<h1 class="titre">Connexion</h1>
<?php 
	//Affiche les champs à remplir correctement
    if(isset($submit)&&$erreurs!="")
	{
		echo '<div class="affErreur">Merci de remplir correctement les champs ci-dessous :</div><ul class="affErreurUL">'.$erreurs.'</ul>';
	}
?>
<form method="post" action="#" >
<fieldset>
	<input type="text" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo;}  if(!$zonePseudo){echo '"class="erreur';} ?>" required="required" placeholder="Votre Pseudo" />
        
    <input id="mdpConnexion" type="password" name="mdp"  placeholder="Votre mot de passe" required="required" />
    
</fieldset>


	<br />
<input type="submit" name="submit" value="Valider" />
         
</form>

</body>
</html>