//
$(document).ready(function(){
   $('span').click(function(){
       var valeur = $(this).text();
       window.location.href='index.php?choix='+valeur;
   });
});

//Cache le bandeau nav si le fil d'arianne n'a qu'un élément
window.onload=function(){
    var nav = document.getElementById("nav").innerHTML;
    nav = nav.trim();
    if(nav=="")
    {
        document.getElementById("nav").style.display = "none";
    }
}