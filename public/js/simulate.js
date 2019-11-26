$( document ).ready(function() {
  $( "#simulateButton" ).click(function() {
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "simulate",
      type: "post",
      success: function (response) {
        $( "#message" ).empty();
        $( "#message" ).append( "<p>Simulation is done!</p>" );
      },

      error: function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  });
})