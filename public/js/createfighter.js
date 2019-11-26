$( document ).ready(function() {
    var fightingbackground;
    var characterurl;
        console.log( "ready!" );
    $( ".backgroundRadio" ).change(function() {
        fightingbackground = $(this).val();
        console.log(fightingbackground);
        if(fightingbackground == "boxing"){

            $('.grapling').attr('style','width: 30%');
            $('.striking').attr('style','width: 70%');
            $('.health').attr('style','width: 65%');
            $('.stamina').attr('style','width: 55%');

            $('.grapling').html("40");
            $('.striking').html("70");
            $('.health').html("65");
            $('.stamina').html("55");

        }else{
            $('.grapling').attr('style','width: 60%');
            $('.striking').attr('style','width: 45%');
            $('.health').attr('style','width: 55%');
            $('.stamina').attr('style','width: 65%');

            $('.grapling').html("60");
            $('.striking').html("45");
            $('.health').html("55");
            $('.stamina').html("65");

        }
    });
    $( ".character" ).change(function() {
        characterurl = $(this).val();
        console.log(characterurl);
    });
    $( "#createButton" ).click(function() {
       firstname = $("#firstname").val();
       lastname = $("#lastname").val();
       fightingbackgrounds=fightingbackground;

        if (firstname == "" || lastname == "" || fightingbackground == undefined || characterurl == ""){
            console.log("ola");
        }else{
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "saveData",
                type: "post",
                data: {
                    firstname: firstname,
                    lastname: lastname,
                    fightingbackgrounds: fightingbackgrounds,
                    characterurl: characterurl
                },
                success: function (response) {
                    window.location.href = "myfighter";
                },

                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    });
});