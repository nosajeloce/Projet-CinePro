$(document).ready(function() {
    //Mettre en forme la barre de progrès
    $("#billets").removeClass();
    $("#billets").addClass("bg-secondary text-light p-1 rounded fw-bold fs-3 border border-dark border-3");

    //Boutons de saisie d'incrémentation 
    $(".plus").click(function(){
        var valeur_objet_input=Number($(".saisie-billet-texte").val());
        $(".saisie-billet-texte").val(valeur_objet_input+1);
    }); 
    
    $(".moins").click(function(){
        var valeur_objet_input=Number($(".saisie-billet-texte").val());
        if (valeur_objet_input > 0){
            $(".saisie-billet-texte").val(valeur_objet_input-1);
        }
    }); 
});