$(document).ready(function(){
   $('#ajoutPanier').click(function(){
       $.get("php/addElement.php", { 'recette' : $('#ajoutPanier').val()}, function(data){
           switch(data){
               case "1" : alert("Echec de l'ajout");break;
               default: 
                   $('#suppPanier').show();
                   $('#ajoutPanier').hide();
                   var nombrePanier = parseInt($('#nbpanier').html()) + 1;
                   if(isNaN(nombrePanier)){
                       $('#parenthesePanier').html("(<span id='nbpanier'>1</span>)");
                   }
                   else{
                       $('#nbpanier').html(nombrePanier);
                   }
                   break;
           };
       });
   });
    
    $('#suppPanier').click(function(){
        $.get("php/suppElement.php", { 'recette' : $('#suppPanier').val()}, function(data){
            switch(data){
                case "1" : alert("Echec de la suppression");break;
                default: 
                    $('#suppPanier').hide();
                    $('#ajoutPanier').show();
                    var nombrePanier = parseInt($('#nbpanier').html()) - 1;
                    if(nombrePanier == 0){
                       $('#parenthesePanier').html("");
                   }
                   else{
                       $('#nbpanier').html(nombrePanier);
                   }
                break;
            };
        });
    }); 
    
    $('.btn_sup').click(function(){
        var numRecette = $(this).val();
        $.get("php/suppElement.php", { 'recette' : numRecette}, function(data){
            switch(data){
                case "1" : alert("Echec de la suppression");break;
                default: 
                    var nombrePanier = parseInt($('#nbpanier').html()) - 1;
                    if(nombrePanier == 0){
                       $('#parenthesePanier').html("");
                   }
                   else{
                       $('#nbpanier').html(nombrePanier);
                   }
                     $("#sectionPanier"+numRecette).slideUp("slow");
         
                     $("#deleteCocktail"+numRecette).delay(500).slideDown("slow");
                break;
            };
        });
    });
    
    $('.viderPanier').click(function(){
        $.get("php/videPanier.php",function(data){
            switch(data){
                case "1" : alert("Echec :( ");break;
                default:
                    $('#parenthesePanier').html("");
                    $('#panier').html("Votre panier est vide :( ");
                    break;
            };
        });
    }); 
    
    $('.deleteCocktail').click(function(){
        $('.deleteCocktail').fadeOut("slow");
    });
});