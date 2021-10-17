
$("#addPermissionForm").submit(function (e) {
    e.preventDefault();
    var action = $(this).attr("action");
    var method = $(this).attr("method");
    var formData = new FormData();
    var name=$("#permission_name").val();
    formData.append("name", name);

  
    // return;
   
    if(dynamicAjax(action, method, formData)==true){
      $("#cards").load(" #cards");
      tableload();
      reload_add_component();
    
      Swal.fire({
        icon: 'success',
        title: 'Added!',
        text: 'Permission Created Successfully.',
        customClass: {
          confirmButton: 'btn btn-success'
        }
      });
      
    }
    $('#addPermissionModal').modal('hide');
});
