$(document).ready(function () {
    $("#datatable_stock").DataTable({
        dom: "frtip",

        responsive: {
            details: true,
            breakpoints: [
                { name: "desktop", width: Infinity },
                { name: "tablet", width: 1024 },
                { name: "fablet", width: 768 },
                { name: "phone", width: 480 },
            ],
        },
        language: {
            paginate: {
                first: "First",
                previous: "Previous",
                next: "Next",
                last: "Last",
            },
        },
        select: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50, 100],
        columnDefs: [{ orderable: false, targets: "_all" }],
    });

    $("#datatable_stock_modal").DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50, 100],
    });

    var table = $("#datatable").DataTable({
        dom: "l<br>Bfrtip",
        buttons: [
            {
                extend: "print",
                text: "Print",
                autoPrint: true,
                exportOptions: {
                    columns: ":visible",
                    rows: function (idx, data, node) {
                        var dt = new $.fn.dataTable.Api("#example");
                        var selected = dt
                            .rows({ selected: true })
                            .indexes()
                            .toArray();
                        if (
                            selected.length === 0 ||
                            $.inArray(idx, selected) !== -1
                        ) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                },

                customize: function (win) {
                    $(win.document.body)
                        .find("table")
                        .addClass("display")
                        .css("font-size", "9px");
                    $(win.document.body)
                        .find("tr:nth-child(odd) td")
                        .each(function (index) {
                            $(this).css("background-color", "#D0D0D0");
                        });
                    $(win.document.body).find("h1").css("text-align", "center");
                },
            },

            "excel",
            "pdf",
            "colvis",
        ],
        responsive: {
            details: true,
            breakpoints: [
                { name: "desktop", width: Infinity },
                { name: "tablet", width: 1024 },
                { name: "fablet", width: 768 },
                { name: "phone", width: 480 },
            ],
        },
        language: {
            paginate: {
                first: "First",
                previous: "Previous",
                next: "Next",
                last: "Last",
            },
        },
        select: true,
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50, 100],
        columnDefs: [{ orderable: false, targets: "_all" }],
    });

    $("#datatable tfoot th").each(function (i) {
        if ($(this).text() !== "") {
            var isStatusColumn = $(this).text() == "Status" ? true : false;
            var select = $('<select><option value=""></option></select>')
                .appendTo($(this).empty())
                .on("change", function () {
                    var val = $(this).val();

                    table
                        .column(i)
                        .search(
                            val ? "^" + $(this).val() + "$" : val,
                            true,
                            false
                        )
                        .draw();
                });

            // Get the Status values a specific way since the status is a anchor/image
            if (isStatusColumn) {
                var statusItems = [];

                /* ### IS THERE A BETTER/SIMPLER WAY TO GET A UNIQUE ARRAY OF <TD> data-filter ATTRIBUTES? ### */
                table
                    .column(i)
                    .nodes()
                    .to$()
                    .each(function (d, j) {
                        var thisStatus = $(j).attr("data-filter");
                        if ($.inArray(thisStatus, statusItems) === -1)
                            statusItems.push(thisStatus);
                    });

                statusItems.sort();

                $.each(statusItems, function (i, item) {
                    select.append(
                        '<option value="' + item + '">' + item + "</option>"
                    );
                });
            }
            // All other non-Status columns (like the example)
            else {
                table
                    .column(i)
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                        select.append(
                            '<option value="' + d + '">' + d + "</option>"
                        );
                    });
            }
        }
    });

    $("#datatable_report").each(function () {
        var datatable_doctor = $(this).DataTable({
            dom: "Bfrtip",
            buttons: [
                {
                    extend: "print",
                    text: "Print",
                    title: "RESERVATION REPORT",
                    exportOptions: {
                        columns: ":not(.exclude-print)",
                    },
                },
            ],
            searching: true,
            lengthChange: true,
            info: false,

            pageLength: 5,
            lengthMenu: [5, 10, 25, 50, 100],
            responsive: {
                details: true,
                breakpoints: [
                    { name: "desktop", width: Infinity },
                    { name: "tablet", width: 1024 },
                    { name: "fablet", width: 768 },
                    { name: "phone", width: 480 },
                ],
            },
        });

        var table = datatable_doctor;
        var filterType = $("#hhfilter-option");
        var semesterFilter = $("#hhsemester");
        var yrFilter = $("#hhmonth");

        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var typefilterValue = filterType.val().toLowerCase();
            var semesterFilterValue = semesterFilter.val();
            var yrFilterValue = yrFilter.val().toLowerCase();

            var rowData = table.row(dataIndex).data();
            var rowOption = rowData[1];
            var rowSemester = rowData[2];
            var rowYr = rowData[6];
            let convertedMonth = convertDateToMonthName(rowYr).toLowerCase();

            if (
                typefilterValue === "all" &&
                semesterFilterValue === "all" &&
                yrFilterValue === "all"
            ) {
                return true;
            } else if (
                typefilterValue !== "all" &&
                rowOption.toLowerCase().includes(typefilterValue)
            ) {
                if (semesterFilterValue === "all" && yrFilterValue === "all") {
                    return true;
                } else if (semesterFilterValue === "all") {
                    return convertedMonth === yrFilterValue;
                } else if (yrFilterValue === "all") {
                    return rowSemester === semesterFilterValue;
                } else {
                    return (
                        rowSemester === semesterFilterValue &&
                        convertedMonth === yrFilterValue
                    );
                }
            } else if (
                typefilterValue === "all" &&
                semesterFilterValue !== "all"
            ) {
                return rowSemester === semesterFilterValue;
            } else if (
                semesterFilterValue === "all" &&
                yrFilterValue !== "all"
            ) {
                return convertedMonth === yrFilterValue;
            }

            return false;
        });

        function convertDateToMonthName(dateString) {
            var date = new Date(dateString);
            var options = { month: "long" };
            var monthName = date.toLocaleString("en-US", options);
            return monthName;
        }

        filterType.on("change", function () {
            table.draw();
        });

        semesterFilter.on("change", function () {
            table.draw();
        });

        yrFilter.on("change", function () {
            table.draw();
        });

        table.draw();
    });
});
