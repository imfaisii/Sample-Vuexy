$("#AgencyRegistrationForm").submit(function (e) {
    e.preventDefault();
    if ($(this).valid()) {
        $(".register-btn").prop("disabled", true);
        $(".register-btn-inner").html("Registering Agency ...");
        $(".register-spinner").show();
        toastr["info"]("We are creating your account !", "👋 Please wait ...", {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
        });
        this.submit();
    }
});
