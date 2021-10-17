$(function () {
    "use strict";

    // form repeater jquery
    $(".invoice-repeater, .repeater-default").repeater({
        show: function () {
            $(this).slideDown();
            // Feather Icons
            if (feather) {
                feather.replace({ width: 14, height: 14 });
            }
        },
        hide: function (deleteElement) {
            var obj = $(this);
            Swal.fire({
                title: "Are you sure to remove the previous entry ?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-outline-danger ms-1",
                },
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    obj.slideUp(deleteElement);
                    Swal.fire({
                        icon: "success",
                        title: "Deleted ! ",
                        text: "Removed and entry!",
                        customClass: {
                            confirmButton: "btn btn-success",
                        },
                    });
                }
            });
        },
    });
});
