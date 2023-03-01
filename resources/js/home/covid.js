$(document).ready(function(){

    $(document).on("click", ".btnclose", function(e){
        $('#hide').on('click', function() {
          $("#element").hide();
          $('#show').show();
        return false;
        });

        $('#hide2').on('click', function() {
          $("#element2").hide();
          $('#show2').show();
        return false;
        });

        $('#hide3').on('click', function() {
          $("#element3").hide();
          $('#show3').show();
        return false;
        });

        $('#hide4').on('click', function() {
          $("#element4").hide();
          $('#show4').show();
        return false;
        });
      });

      

    $(document).on("click", ".btnmore", function(e){
        $('#show').on('click', function() {
        $("#element").show();
        $('#show').hide();
        return false;
        });

        $('#show2').on('click', function() {
          $("#element2").show();
          $('#show2').hide();
          return false;
          });

          $('#show3').on('click', function() {
            $("#element3").show();
            $('#show3').hide();
            return false;
            });

            $('#show4').on('click', function() {
              $("#element4").show();
              $('#show4').hide();
              return false;
              });
      });

});
