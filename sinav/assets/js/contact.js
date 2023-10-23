$(document).ready(function(){ 

  $("#bildirimFormu").submit(function(event){

    $.ajax({

      type: "POST",
      url: "bildiriKaydet.php",
      cache:false,
      data: $('form#bildirimFormu').serialize(),
  
      success: function(response){
        $("#contact").html(response)
        $("#bildiriModal").modal('hide');
      },
      error: function(){
        alert("Error");
      }

    });

  return false;

 });
});
