$(document).ready(function () {
    $(".country-dropdown").on("change", function () {
        var country_id = this.value;
        $.ajax({
            url: GET_STATES_ENDPOINT,
            type: "GET",
            beforeSend: function () {
                $(".state-dropdown").html(
                    '<option value="">Please wait...</option>'
                );
            },
            data: {
                country_id: country_id,
            },
            dataType: "json",
            success: function (result) {
                $(".state-dropdown").html("");
                $.each(result.states, function (key, value) {
                    $(".state-dropdown").append(
                        '<option value="' +
                            value.id +
                            '">' +
                            value.name +
                            "</option>"
                    );
                });
                $(".city-dropdown").html(
                    '<option value="">Select State First</option>'
                );
            },
        });
    });
    $(".state-dropdown").on("change", function () {
        var state_id = this.value;
        $.ajax({
            url: GET_CITIES_ENDPOINT,
            type: "GET",
            beforeSend: function () {
                $(".city-dropdown").html(
                    '<option value="">Please wait...</option>'
                );
            },
            data: {
                state_id: state_id,
            },
            dataType: "json",
            success: function (result) {
                $(".city-dropdown").html("");
                $.each(result.cities, function (key, value) {
                    $(".city-dropdown").append(
                        '<option value="' +
                            value.id +
                            '">' +
                            value.name +
                            "</option>"
                    );
                });
            },
        });
    });
});
