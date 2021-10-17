function reload_add_component(){
    $.ajax({
        url: route_get_data_for_permissions,
        method: 'POST',
        data: {
            
        },
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
              $('#select2-nested').html('');
              $('#select2-basic').html('');
        },
        success: function (result) {
        console.log(result);
            
        $.each(result.users, function (key, name) {
            link='<option value="'+name.id+'">'+name.name+':'+name.email+'</option>';
            $('#select2-nested').append(link);
        });

        $.each(result.permissions, function (key, name) {
          link='<option value="'+name.name+'">'+name.name+'</option>';
          $('#select2-basic').append(link);
        });
          
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
            console.log("complete");
        },
    });    

}