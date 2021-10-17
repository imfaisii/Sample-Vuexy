$(document).ready(function () {
    // $(window).on("beforeunload", function() {
    //    endchat();
    //      return 'Please press the Logout button to logout.';
    // });
    document.onkeydown = function () {
        switch (event.keyCode) {
            case 116: //F5 button
                event.returnValue = false;
                event.keyCode = 0;
                return false;
            case 82: //R button
                if (event.ctrlKey) {
                    event.returnValue = false;
                    event.keyCode = 0;
                    return false;
                }
        }
    };
});


$("#chat_form").submit(function (e) {
    e.preventDefault();

    $("#btn-chat").trigger("click");
});

$("#search").on("click", function () {
    var name = document.getElementById("input_field").value;
    ajaxcall(name);
});
function endchat() {
    $.ajax({
        type: "post",
        url: agent_available,
        async: false,
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
            toastr["success"](
                "Channel Closed Successfully.. Thanks for contacting us",
                "Good Bye",
                {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true,
                    // rtl: isRtl,
                }
            );
        },
        complete: function (result) {
            console.log(result);

            setTimeout("window.close()", 3000);
        },
    });
}

$("#btn-chat").on("click", function () {
    has_errors = false;
    const message_el = document.getElementById("message");

    const message_input = document.getElementById("message_input");

    if (message_input.value == "") {
        has_errors = true;
        toastr["info"]("Message cannot be Empty", "Alert", {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
            // rtl: isRtl,
        });
    }
    if (has_errors) {
        return;
    }

    $.ajax({
        url: send_event,
        type: "post",
        data: {
            user_name: current_user_id,
            message: message_input.value,
            receiver: agly_user_ki_id,
            room: room_id,
        },
        dataType: "json",
        success: function (result) {
            console.log("gia");
        },
        error: function (result) {
            console.log("error" + JSON.stringify(result));
        },
    });
});
