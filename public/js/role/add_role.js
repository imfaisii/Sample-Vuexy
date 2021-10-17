$("#addRoleForm").submit(function (e) {
    e.preventDefault();
    var action = $(this).attr("action");
    var method = $(this).attr("method");
    var formData = new FormData();
    var name=$("#modalRoleName").val();
    formData.append("name", name);

    var array = [];
    $("input:checkbox[name=checkBox]").each(function () {
        if($(this).prop("checked") == true)
      array.push($(this).val());
    });
    formData.append("optionsArr", array);
    // console.log(formData)
    // return;
    if(dynamicAjax(action, method, formData)==true){
      $("#cards").load(" #cards");
      reload_add_component();
      Swal.fire({
        icon: 'success',
        title: 'Added!',
        text: 'Role Created Successfully.',
        customClass: {
          confirmButton: 'btn btn-success'
        }
      });
    
    }
    $('#addRoleModal').modal('hide');
});
