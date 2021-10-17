// This is the cusom ajax call that works for all cases
// settings csrf for POST reqs

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function dynamicAjax(url, method, data) {
    $.ajax({
        url: url,
        method: method,
        contentType: false,
        processData: false,
        data: data,
        dataType: "json",
        beforeSend: function () {},
        success: function (data) {
            console.log("success");
            console.log(data);
        },
        error: function (response) {
            console.log("error");
            console.log(response);
        },
        complete: function () {
            console.log("complete");
        },
    });
}
