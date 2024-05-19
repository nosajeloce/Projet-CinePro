$(document).ready(function() {
    //Mettre en forme la barre de progrès
    $("#siege").removeClass();
    $("#siege").addClass("bg-secondary text-light p-1 rounded fw-bold fs-3 border border-dark border-3");

    //Un siège devient bleu quand on passe notre souris dessus
    $("label").hover(
        function(){
            $(this).find("i.bi-square").addClass("text-primary");
        },
        function(){
            $(this).find("i").removeClass("text-primary");
        }
    );

    //Un siège disponible reste bleu quand cliqué
    $("label:has('i.bi-square')").click(function(){
        $("label > i").removeClass("clic-bleu border border-primary border-1");
        $(this).find("i").addClass("clic-bleu border border-primary border-1");
    });

    //Modifier l'attribut action du formulaire à ajout-panier quand le bouton correspondant a été cliqué
    $("#ajout-panier").click(function(){
        $(".formulaire-siege").attr("action","?action=ajouterPanier");
        $(".formulaire-siege").submit();
    });

    //Modifier l'attribut action du formulaire à echangerPoints quand le bouton correspondant a été cliqué
    $("#proceder-paiement").click(function(){
        $(".formulaire-siege").attr("action","?action=echangerPoints");
        $(".formulaire-siege").submit();
    });

});