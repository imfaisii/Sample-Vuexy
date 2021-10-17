function edit_role(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Edit it!',
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
         if(ajax_show_edit_role_modal(id)==true){
          $("#editRoleModal").modal('show');

        // if (result.value) {
        //   Swal.fire({
        //     icon: 'success',
        //     title: 'Edited!',
        //     text: 'Your Role has been Edited.',
        //     customClass: {
        //       confirmButton: 'btn btn-success'
        //     }
        //   });
        // }
      }
    } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Cancelled',
            text: 'Your Role is not changed :)',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
}

function ajax_show_edit_role_modal(id){
  var link = "";
  let val=true;
  $.ajax({
    url: route_get_role_of_a_permission,
    method: 'POST',
    data: {
        id:id,
    },
    dataType: "json",
    beforeSend: function () {
      $("#edit_role_heading").html('');
      $("#editRoleName").val('');
      $("#old_id").val('');
      $("#edit_role_table").html('');
      
      link="";
    
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
      // console.log(result);
        if (result.operation == 1){
            $("#edit_role_heading").html(result.data[0].name)
            $("#editRoleName").val(result.data[0].name)
            $("#old_id").val(result.data[0].id);

           

            $.each(result.data[0].permissions, function (key, name) {
                link =
                '<tr><td></td>'+
                '<td class="text-nowrap fw-bolder">'+name.name+'</td>'+
                '<td>'+
                    '<div class="d-flex">'+
                        '<div class="form-check me-3 me-lg-5">'+
                            '<input class="form-check-input" type="checkbox" id="Per'+name.name+'" name="checkBox" value="'+name.name+'" checked/>'+
                           
                        '</div>'+
                        
                    '</div>'+
                '</td>'+
            '</tr>';

                $("#edit_role_table").append(link);
            });
            $.each(result.rest_permissions, function (key, name) {
              link =
              '<tr><td></td>'+
              '<td class="text-nowrap fw-bolder">'+name.name+'</td>'+
              '<td>'+
                  '<div class="d-flex">'+
                      '<div class="form-check me-3 me-lg-5">'+
                          '<input class="form-check-input" type="checkbox" id="Per'+name.name+'" name="checkBox" value="'+name.name+'" />'+
                         
                      '</div>'+
                      
                  '</div>'+
              '</td>'+
          '</tr>';

              $("#edit_role_table").append(link);
          });

          // console.log(link);
            
            val=true;
          }
        else if (result.operation == 0){
          $("#edit_role_heading").html("No Role Found")
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


$("#edit_role_form").submit(function (e) {
  e.preventDefault();
  var action = $(this).attr("action");
  var method = $(this).attr("method");
  var formData = new FormData();
  var name=$("#editRoleName").val();
  var old_id=$("#old_id").val();
  formData.append("name", name);
  formData.append("old_id", old_id);

  var array = [];
  $("#edit_role_form input:checkbox[name=checkBox]").each(function () {     
      if($(this).prop("checked") == true)
    array.push($(this).val());
  });
  formData.append("permissions", array);
  // console.log(formData)
  
  
  if(dynamicAjax(action, method, formData)==true){
    $("#cards").load(" #cards");
    reload_add_component();
    Swal.fire({
          icon: 'success',
          title: 'Edited!',
          text: 'Update Successfull.',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
     
  }else{
    Swal.fire({
      title: 'Failed',
      text: 'Update Failed :)',
      icon: 'error',
      customClass: {
        confirmButton: 'btn btn-success'
      }
    });
  }
  $('#editRoleModal').modal('hide');
});
