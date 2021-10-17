function delete_role(id){
 
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
         
            if(ajax_delete_role(id)==true){
              $("#cards").load(" #cards");
              reload_add_component();

          Swal.fire({
            icon: 'success',
            title: 'Deleted!',
            text: 'Your Role has been deleted.',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });

         
        }
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Cancelled',
            text: 'Your Role  is safe :)',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
}

function ajax_delete_role(id){
  let val=true;
    $.ajax({
        url: route_delete_role,
        method: 'POST',
        data: {
            id:id,
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
        },
        success: function (result) {
            if (result.operation == 1){
                toastr["success"](result.message, 'success', {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true,
                    // rtl: isRtl,
                });
                val=true;
              }
            else if (result.operation == 0){
                toastr["error"](name, key, {
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
        },
        complete: function () {
            // console.log("complete");
        },
    });
    return val;
}