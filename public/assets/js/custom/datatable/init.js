// Advanced Search Functions Starts
// --------------------------------------------------------------------

// Filter column wise function
function filterColumn(i, val, type) {
    if (type == "date") {
        var startDate = $(".start_date").val(),
            endDate = $(".end_date").val();
        if (startDate !== "" && endDate !== "") {
            filterByDate(i, startDate, endDate); // We call our filter function
        }
        $(".datatables-conf").dataTable().fnDraw();
    } else {
        $(".datatables-conf")
            .DataTable()
            .column(i)
            .search(val, false, true)
            .draw();
    }
}

// Datepicker for advanced filter
var separator = " - ",
    rangePickr = $(".flatpickr-range"),
    dateFormat = "MM/DD/YYYY";
var options = {
    autoUpdateInput: false,
    autoApply: true,
    locale: {
        format: dateFormat,
        separator: separator,
    },
    opens: $("html").attr("data-textdirection") === "rtl" ? "left" : "right",
};

//
if (rangePickr.length) {
    rangePickr.flatpickr({
        mode: "range",
        dateFormat: "m/d/Y",
        onClose: function (selectedDates, dateStr, instance) {
            var startDate = "",
                endDate = new Date();
            if (selectedDates[0] != undefined) {
                startDate =
                    selectedDates[0].getMonth() +
                    1 +
                    "/" +
                    selectedDates[0].getDate() +
                    "/" +
                    selectedDates[0].getFullYear();
                $(".start_date").val(startDate);
            }
            if (selectedDates[1] != undefined) {
                endDate =
                    selectedDates[1].getMonth() +
                    1 +
                    "/" +
                    selectedDates[1].getDate() +
                    "/" +
                    selectedDates[1].getFullYear();
                $(".end_date").val(endDate);
            }
            $(rangePickr).trigger("change").trigger("keyup");
        },
    });
}

// Advance filter function
// We pass the column location, the start date, and the end date
var filterByDate = function (column, startDate, endDate) {
    // Custom filter syntax requires pushing the new filter to the global filter array
    $.fn.dataTableExt.afnFiltering.push(function (
        oSettings,
        aData,
        iDataIndex
    ) {
        var rowDate = normalizeDate(aData[column]),
            start = normalizeDate(startDate),
            end = normalizeDate(endDate);

        // If our date from the row is between the start and end
        if (start <= rowDate && rowDate <= end) {
            return true;
        } else if (rowDate >= start && end === "" && start !== "") {
            return true;
        } else if (rowDate <= end && start === "" && end !== "") {
            return true;
        } else {
            return false;
        }
    });
};

// converts date strings to a Date object, then normalized into a YYYYMMMDD format (ex: 20131220). Makes comparing dates easier. ex: 20131220 > 20121220
var normalizeDate = function (dateString) {
    var date = new Date(dateString);
    var normalized =
        date.getFullYear() +
        "" +
        ("0" + (date.getMonth() + 1)).slice(-2) +
        "" +
        ("0" + date.getDate()).slice(-2);
    return normalized;
};
// Advanced Search Functions Ends
function makeAdvDT(classNme, cols_arr) {
    $("." + classNme).DataTable({
        processing: true,
        columnDefs: [
            {
                className: "control",
                orderable: false,
                targets: 0,
            },
        ],
        dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        displayLength: 10,
        lengthMenu: [10, 25, 50, 75, 100],
        buttons: [
            {
                extend: "collection",
                className: "btn btn-outline-secondary dropdown-toggle me-2",
                text:
                    feather.icons["share"].toSvg({
                        class: "font-small-4 me-50",
                    }) + "Export",
                buttons: [
                    {
                        extend: "print",
                        text:
                            feather.icons["printer"].toSvg({
                                class: "font-small-4 me-50",
                            }) + "Print",
                        className: "dropdown-item",
                        exportOptions: { columns: cols_arr },
                    },
                    {
                        extend: "csv",
                        text:
                            feather.icons["file-text"].toSvg({
                                class: "font-small-4 me-50",
                            }) + "Csv",
                        className: "dropdown-item",
                        exportOptions: { columns: cols_arr },
                    },
                    {
                        extend: "excel",
                        text:
                            feather.icons["file"].toSvg({
                                class: "font-small-4 me-50",
                            }) + "Excel",
                        className: "dropdown-item",
                        exportOptions: { columns: cols_arr },
                    },
                    {
                        extend: "pdf",
                        text:
                            feather.icons["clipboard"].toSvg({
                                class: "font-small-4 me-50",
                            }) + "Pdf",
                        className: "dropdown-item",
                        exportOptions: { columns: cols_arr },
                    },
                    {
                        extend: "copy",
                        text:
                            feather.icons["copy"].toSvg({
                                class: "font-small-4 me-50",
                            }) + "Copy",
                        className: "dropdown-item",
                        exportOptions: { columns: cols_arr },
                    },
                ],
            },
        ],
        orderCellsTop: true,
        responsive: {
            details: {
                type: "column",
                renderer: function (api, rowIdx, columns) {
                    var data = $.map(columns, function (col, i) {
                        return col.title !== "" // ? Do not show row in modal popup if title is blank (for check box)
                            ? '<tr data-dt-row="' +
                                  col.rowIndex +
                                  '" data-dt-column="' +
                                  col.columnIndex +
                                  '">' +
                                  "<td>" +
                                  col.title +
                                  ":" +
                                  "</td> " +
                                  "<td>" +
                                  col.data +
                                  "</td>" +
                                  "</tr>"
                            : "";
                    }).join("");

                    return data
                        ? $('<table class="table"/><tbody />').append(data)
                        : false;
                },
            },
        },
        language: {
            paginate: {
                // remove previous & next text from pagination
                previous: "&nbsp;",
                next: "&nbsp;",
            },
        },
    });
}
// on key up from input field
$("input.dt-input").on("keyup", function () {
    filterColumn(
        $(this).attr("data-column"),
        $(this).val(),
        $(this).attr("type")
    );
});
