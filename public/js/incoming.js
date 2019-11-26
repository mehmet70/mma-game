$( document ).ready(function() {
    $( ".fight" ).click(function() {
        var fight_id=$(this).attr('id');
        window.location.href = fight_id ;
    });
});