$(window).on("load", function () {
    if (check == true)
        setTimeout(function () {
            toastr["success"](
                "You have successfully logged in to " +
                    APP_NAME +
                    ". Now you can start to explore!",
                "👋 Welcome " + SOME_NAME,
                {
                    closeButton: true,
                    tapToDismiss: false,
                    progressBar: true,
                }
            );
        }, 500);
});
