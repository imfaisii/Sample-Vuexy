function tableload(){
    $.ajax({
        url: route_get_permission,
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
        },
        success: function (result) {
        console.log(result);
            $(".datatables-basic1").dataTable().fnClearTable();
            var t = $('.datatables-basic1').DataTable();
            var link = "";
            var quote = "'";
            $.each(result.permissions, function (key, name) {
             
                    link =
                        "<tr><td></td>" +
                        " <td>" +
                        name.name +
                        "</td>" +
                        " <td>" +
                        name.guard_name +
                        "</td>" +
                        "</td>" +
                        '<td >' +
                        '<button type="button" onclick="DelPermission(' +
                        quote +
                        name.id +
                        quote +
                        ')" class="btn btn-relief-danger">Delete</button>' +
                        "  </td> " +
                        " </tr>";
                        console.log(link);
                    t.rows.add($(link)).draw();
               
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