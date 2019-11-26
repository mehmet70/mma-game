$( document ).ready(function() {
    $("tr").click(function(){
        $(this).addClass("selected").siblings().removeClass("selected");
        receiver_id = $(this).attr('id');
    });
    $( "#challengeBoy" ).click(function() {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "getAuthId",
            type: "post",
            data: {
                receiver_id: receiver_id
            },
            success: function (response) {
                sender_id=response['sender'][0]['user_id'];
                receiver_id=response['receiver'][0]['user_id'];

                sender_grapling=response['sender'][0]['grapling'];
                sender_striking=response['sender'][0]['striking'];
                sender_stamina=response['sender'][0]['stamina'];
                sender_health=response['sender'][0]['health'];

                receiver_grapling=response['receiver'][0]['grapling'];
                receiver_striking=response['receiver'][0]['striking'];
                receiver_stamina=response['receiver'][0]['stamina'];
                receiver_health=response['receiver'][0]['health'];

                sender_score= (sender_grapling *1.1) + sender_striking + sender_stamina + sender_health;
                receiver_score= (receiver_grapling *1.1) + receiver_striking + receiver_stamina + receiver_health;
                percentage=sender_score/(receiver_score + sender_score)*100;



                if(sender_score >=   receiver_score){

                    difference= sender_score - receiver_score;

                    if(difference >= 100 ){
                        percentage=percentage + 30;
                    }
                    if(difference >= 50 && difference < 100 ){
                        percentage=percentage + 20;
                    }
                    if(difference >= 20 && difference < 50 ){
                        percentage=percentage + 10;
                    }
                    if(difference > 0 && difference < 20 ){
                        percentage=percentage + 5;
                    }
                    if(difference == 0){
                        percentage=percentage + 0;
                    }


                }else{
                    difference= receiver_score - sender_score;
                    if(difference >= 100 ){
                        percentage=percentage - 30;
                    }
                    if(difference >= 50 && difference < 100 ){
                        percentage=percentage - 20;
                    }
                    if(difference >= 20 && difference < 50 ){
                        percentage=percentage - 10;
                    }
                    if(difference >= 0 && difference < 20 ){
                        percentage=percentage - 5;
                    }
                    if(difference == 0){
                        percentage=percentage + 0;
                    }
                }
                var x = Math.floor((Math.random() * 100) + 1);


                if( x >=0 && x <= percentage ){
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "addFightWin",
                        type: "post",
                        data: {
                            sender_id: sender_id,
                            receiver_id: receiver_id
                        },
                        success: function (response) {
                            console.log(response);
                            if(response == "This fighter is already fighting tonight or you might be already fighting tonight!"){
                                window.location.href = "offerdeclined";
                            }else{
                                window.location.href = "offersend";
                            }
                        },

                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                }else{
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "addFightLoss",
                        type: "post",
                        data: {
                            sender_id: sender_id,
                            receiver_id: receiver_id
                        },
                        success: function (response) {
                            console.log(response);
                            if(response == "This fighter is already fighting tonight or you might be already fighting tonight!"){
                                window.location.href = "offerdeclined";
                            }else{
                                window.location.href = "offersend";
                            }                        },

                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                }

            },

            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});