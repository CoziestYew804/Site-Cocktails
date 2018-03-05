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
<h1 class="titre">Votre compte</h1>
    <ul>
        <?php 
            if(strlen($_SESSION["InfoMembre"]["pseudo"])>1)echo "<li>Pseudo : ".$_SESSION["InfoMembre"]["pseudo"]."</li>";
            if(strlen($_SESSION["InfoMembre"]["nom"])>1)echo "<li>Nom : ".$_SESSION["InfoMembre"]["nom"]."</li>";
            if(strlen($_SESSION["InfoMembre"]["prenom"])>1)echo "<li>Prenom : ".$_SESSION["InfoMembre"]["prenom"]."</li>";
            if(strlen($_SESSION["InfoMembre"]["tel"])>1)echo "<li>Téléphone : ".$_SESSION["InfoMembre"]["tel"]."</li>";
            if(strlen($_SESSION["InfoMembre"]["adresse"])>1)echo "<li>Adresse : ".$_SESSION["InfoMembre"]["adresse"]."</li>";
            if(strlen($_SESSION["InfoMembre"]["ville"])>1)echo "<li>Ville : ".$_SESSION["InfoMembre"]["ville"]."</li>";
            if(strlen($_SESSION["InfoMembre"]["code"])>1)echo "<li>Code postal : ".$_SESSION["InfoMembre"]["code"]."</li>";
            if(strlen($_SESSION["InfoMembre"]["email"])>1)echo "<li>E-mail : ".$_SESSION["InfoMembre"]["email"]."</li>";
            if(strlen($_SESSION["InfoMembre"]["naissance"])>1)echo "<li>Date de naissance : ".$_SESSION["InfoMembre"]["naissance"]."</li>";
        ?>
    </ul>
    <button id="modifCompte" href="index.php?page=Modifier">Modifier</button>
<a href="php/deconnexion.php"><button>Déconnexion</button></a>
    
<div id="modif" style="display:none"><?php include("php/Membre.php")?></div>
<script>
    $('#modifCompte').click(function(){
        $('#modif').slideToggle("slow");
    });
</script>
<noscript>
    <?php include("php/Membre.php")?>
</noscript>
</body>
</html>