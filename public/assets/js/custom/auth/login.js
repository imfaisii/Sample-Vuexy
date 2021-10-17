// JS for Login

$("#LoginForm").submit(function (e) {
    e.preventDefault();
    if ($(this).valid()) {
        $(".login-btn").prop("disabled", true);
        $(".login-btn-inner").html("Logging In...");
        $(".login-spinner").show();
        toastr["info"](
            "We are trying to log you into the system !",
            "👋 Please wait ...",
            {
                closeButton: true,
                tapToDismiss: false,
                progressBar: true,
            }
        );
        this.submit();
    }
});
