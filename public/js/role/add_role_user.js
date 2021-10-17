$("#roleuserForm").submit(function (e) {
    
    e.preventDefault();
    var action = $(this).attr("action");
    var method = $(this).attr("method");
    var formData = new FormData();
    var user=$("#select2-nested").val();
    formData.append("user", user);
    var role=$("#select2-basic").val();
    formData.append("role", role);

    if (dynamicAjax(action, method, formData) == true) {
        $("#cards").load(" #cards");
       
        Swal.fire({
            icon: "success",
            title: "Added!",
            text: "Role Assigned to User Successfully.",
            customClass: {
                confirmButton: "btn btn-success",
            },
        });
      

        $.ajax({
            url: route_get_user_role,
            method: "POST",
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
                $(".datatables-basic1").dataTable().fnClearTable();
                var t = $(".datatables-basic1").DataTable();
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
                            "<td >" +
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
    } else {
        Swal.fire({
            icon: "error",
            title: "Failed!",
            text: "Failed to Assign, Role to User ",
            customClass: {
                confirmButton: "btn btn-success",
            },
        });
    }
    $("#addRoleUserModal").modal("hide");
});
