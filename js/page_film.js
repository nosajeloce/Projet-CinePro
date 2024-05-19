$(document).ready(function() {
    $(".horaires").hide(); 

    $("form > div > a").click(function(event){
        event.preventDefault(); //Pour rendre lien non fonctionnel (pour que la page ne se rafraîchit pas)
        $("#id-cinema").val(this.id); //Remplir formulaire avec l'ID du cinéma cliqué
        $(".horaires").hide();
        $("#"+this.id+"-horaire").slideToggle();
    });
});