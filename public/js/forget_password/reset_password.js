$('#reset-password-form').submit(function (e) { 
    e.preventDefault();

    var data = new FormData($('#reset-password-form')[0]);
    var url = $(this).attr('action');
    var method = $(this).attr('method');
    if(user!=$('#email').val()){
        toastr["info"](
            "Don't try to act smart with me  ",
            "👋 Don't Change Email ...",
            {
                closeButton: true,
                tapToDismiss: false,
                progressBar: true,
            }
        );
        return;
    }
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
            

            val=true;

         if(dynamicAjax(url, method, data)==true){
            $("#resetPassword").prop("disabled", true);
            $("#resetPassword").html("Updated ...");
            $("").hide();
            
         }else{
            $("#resetPassword").prop("disabled", false);
            $("#resetPassword").html("Re Do...");
        
         }
       
   
   
     

    }


    
});