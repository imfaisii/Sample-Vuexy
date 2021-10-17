$('#forget-password-form').submit(function (e) { 
    e.preventDefault();
   
    var data = new FormData($('#forget-password-form')[0]);
    var url = $(this).attr('action');
    var method = $(this).attr('method');

  
    if ($(this).valid()) {
        // toastr["info"](
        //     "We are trying to Send a Reset Password mail to you ",
        //     "👋 Please wait ...",
        //     {
        //         closeButton: true,
        //         tapToDismiss: false,
        //         progressBar: true,
        //     }
        // );
        $(".forget-btn").prop("disabled", true);
        $(".forget-btn-inner").html("Sending...");
        $(".forget-spinner").show();
     
            val=true;

         if(dynamicAjax(url, method, data)==true){
            $(".forget-btn").prop("disabled", false);
            $(".forget-btn-inner").html("Sent...");
            $(".forget-spinner").hide();
            
         }else{
            $(".forget-btn").prop("disabled", false);
            $(".forget-btn-inner").html("Re Send...");
            $(".forget-spinner").hide();
         }
       
   
   
     

    }


    
});