$("#AgentRegistrationForm").submit(function (e) {
    e.preventDefault();
    $(this).validate({
        rules: {
            agentFirstName: {
                noSpace: true,
            },
            agentLastName: {
                noSpace: true,
            },
        },
    });
    if ($(this).valid()) {
        $(".register-btn").prop("disabled", true);
        $(".register-btn-inner").html("Registring User ...");
        $(".register-spinner").show();
        toastr["info"]("We are creating your account !", "👋 Please wait ...", {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
        });
        this.submit();
    }
});
