$(document).ready(function() {
    $("form > a").click(function(){
        $("#id-film").val(this.id);
        $("#choix-film").submit();
    });
});