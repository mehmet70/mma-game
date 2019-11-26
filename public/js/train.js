$( document ).ready(function() {
    $( "#trainButton" ).click(function() {
        trainSelect = $("#trainSelect").val();
        var x = Math.floor((Math.random() * 100) + 1);
        if (x >= 0 && x <= 50  ){
            trainPoints = 1;
        }
        if (x >= 51 && x <= 80  ){
            trainPoints = 2;
        }
        if (x >= 81 && x <= 94  ){
            trainPoints = 3;
        }
        if (x >= 95 && x <= 100  ){
            trainPoints = 4;
        }
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "train",
            type: "post",
            data: {
                trainSelect: trainSelect,
                trainPoints: trainPoints
            },
            success: function (response) {
                console.log(response);
                window.location.href = "train";
            },

            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});