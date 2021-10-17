$("#agent_support_button").click(function (e) {
    e.preventDefault();


    $.ajax({
        type: "post",
        url: route_make_room,
        dataType: "json",
        beforeSend: function () {
            $.blockUI({
                message:
                    '<div class="d-flex justify-content-center align-items-center"><p class="me-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
                timeout: 500,
                css: {
                    backgroundColor: "transparent",
                    color: "#fff",
                    border: "0",
                    zIndex: "9999",
                },
                overlayCSS: {
                    opacity: 0.5,
                },
            });
        },
        success: function (result) {
       
            if(result.operation==1){
                toastr["success"](result.message, 'Room Creation', {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true,
                    // rtl: isRtl,
                });

                window.open('support_chat','My_window',"toolbar=no, menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no");
            }else{
                toastr["error"](result.message, 'Room Creation', {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true,
                    // rtl: isRtl,
                });
            }
            
        },
        error: function (result) {
            $.each(result.responseJSON.errors, function (key, name) {
                toastr["error"](name, key, {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true,
                    // rtl: isRtl,
                });
            });
        },
        complete: function () {
            // console.log("complete");
        },
    });
});
