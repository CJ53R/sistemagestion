$(document).ready(function(){

    $(document).on("click", ".btnclose", function(e){
      let btn_id2 = $(this).attr('id');
      let n =btn_id2.substr(4);
        $('#'+btn_id2).on('click', function() {
          $("#element"+n).hide();
          $('#show'+n).show();
        return false;
        });
      });

    $(document).on("click", ".btnmore", function(e){
        let btn_id = $(this).attr('id');
        let n2 = btn_id.substr(4);
        $('#'+btn_id).on('click', function() {
        $("#element"+n2).show();
        $('#'+btn_id).hide();
        return false;
        });
      });

});
