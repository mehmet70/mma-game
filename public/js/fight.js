$( document ).ready(function() {
    $( "#accept" ).click(function() {
        status='accepted';
        fight_id=$( this ).attr( "data");
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "updateStatus",
            type: "post",
            data: {
                status: status,
                fight_id:fight_id
            },
            success: function (response) {
                console.log(response);
                if(response == 'declined'){
                    window.location.href = "offerdeclined";
                }else{
                    window.location.href = "offeraccept";
                }
            },

            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
    $( "#decline" ).click(function() {
        status='declined'
        fight_id=$( this ).attr( "data");
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "updateStatus",
            type: "post",
            data: {
                status: status,
                fight_id:fight_id
            },
            success: function (response) {
                console.log(response);
                // window.location.href = "offerdecline";
            },

            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});