
function dynamicAjax(url, method, data) {
        val=true;
    $.ajax({
        url: url,
        method: method,
        contentType: false,
        processData: false,
        async:false,
        data: data,
        dataType: "json",
        beforeSend: function () {
            $.blockUI({
                message:
                  '<div class="d-flex justify-content-center align-items-center"><p class="me-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
                timeout: 500,
                css: {
                  backgroundColor: 'transparent',
                  color: '#fff',
                  border: '0',
                  zIndex:'9999'
                },
                overlayCSS: {
                  opacity: 0.5
                }
              });
        },
        success: function (result) {
            console.log(result);
            if (result.operation == 1){
                toastr["success"](result.message, 'success', {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true,
                    // rtl: isRtl,
                });
                val=true;
            }
            else {
                toastr["error"](result.message, 'error', {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true,
                    // rtl: isRtl,
                });
            val=false;
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
            val=false;
        },
        complete: function () {
            // console.log("complete");

        },
    });

    return val;
}
