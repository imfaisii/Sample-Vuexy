function DelUserhasRol(id, name) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Take it!",
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: "btn btn-outline-danger ms-1",
        },
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            if (DelUserRole(id, name) == true) {
             

                
                  Swal.fire({
                    icon: 'success',
                    title: 'Role!',
                    text: 'Role is taken from user successfully',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    }
                  });
                  $("#cards").load(" #cards");
                
            }
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                title: "Cancelled",
                text: "Role is not taken from User)",
                icon: "error",
                customClass: {
                    confirmButton: "btn btn-success",
                },
            });
        }
    });
}

function DelUserRole(id, name) {

    let val = true;
    $.ajax({
        url: route_del_role_permission,
        type: "post",
        data: {
            user_id: id,
            role_name: name,
        },
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
            if (result.operation == 1) {
                toastr["success"](result.message, "success", {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true,
                    // rtl: isRtl,
                });
                val = true;
                $(".datatables-basic1").dataTable().fnClearTable();
                var t = $('.datatables-basic1').DataTable();
                var link = "";
                var quote = "'";
                $.each(result.access_role, function (key, name) {
                    $.each(name.users, function (key, name1) {
                        link =
                            "<tr><td></td>" +
                            " <td>" +
                            name.name +
                            "</td>" +
                            " <td>" +
                            name1.name +' : '+name1.email+
                            "</td>" +
                            "</td>" +
                            '<td >' +
                            '<button type="button" onclick="DelUserhasRol(' +
                            quote +
                            name1.id +
                            quote +
                            "," +
                            quote +
                            name.name +
                            quote +
                            ')" class="btn btn-relief-danger">Delete</button>' +
                            "  </td> " +
                            " </tr>";
                        t.rows.add($(link)).draw();
                    });
                });




            } else if (result.operation == 0) {
                toastr["error"](name, key, {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true,
                    // rtl: isRtl,
                });
                val = false;
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
        complete: function () {},
    });
    return val;
}
