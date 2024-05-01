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
        var datatable_report = $(this).DataTable({
            dom: "Bfrtip",
            buttons: [
                {
                    extend: "print",
                    text: "Print",
                    title: "RESERVATION REPORT",
                    exportOptions: {
                        columns: ":not(.exclude-print)",
                    },
                    customize: function (win) {
                        $(win.document.body)
                            .find("table")
                            .addClass("display")
                            .css("font-size", "16px");
                        $(win.document.body)
                            .find("tr:nth-child(odd) td")
                            .each(function () {
                                $(this).css("background-color", "#D0D0D0");
                            });
                        $(win.document.body)
                            .find("h1")
                            .css("text-align", "center")
                            .css("font-size", "16px");
                        $(win.document.body).find("h1").text("TOTAL");
                        $(win.document.body).find("h1").after("<hr>");
                        $(win.document.body)
                            .find("thead")
                            .after(
                                '<tfoot><tr><th colspan="5"></th></tr></tfoot>'
                            );
                        $(win.document.body)
                            .find("tfoot th")
                            .css("text-align", "left");

                        var totalRegistered = table
                            .rows({ search: "applied" })
                            .count();
                        $(win.document.body)
                            .find("tfoot th")
                            .text("TOTAL: " + totalRegistered)
                            .css("font-weight", "bold");
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

        var table = datatable_report;
        var filterDepart = $("#hhdepartment");

        var monthFilter = $("#hhmonth");
        var yrFilter = $("#hhyear");

        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {

            var filterDepartValue = filterDepart.val().toLowerCase();
            var monthFilterValue = monthFilter.val();
            var yrFilterValue = yrFilter.val().toLowerCase();

            var rowData = table.row(dataIndex).data();
            var rowDepart = rowData[5];

            var rowDate = rowData[4];

            if (
                (filterDepartValue === "all" || rowDepart.toLowerCase() === filterDepartValue) &&

                (monthFilterValue === "all" || rowDate.toLowerCase().includes(monthFilterValue.toLowerCase())) &&
                (yrFilterValue === "all" || rowDate.toLowerCase().includes(yrFilterValue.toLowerCase()))
            ) {
                return true; // Row matches the filter criteria
            }

            return false;
        });

        filterDepart.on("change", function () {
            table.draw();
        });

        monthFilter.on("change", function () {
            table.draw();
        });

        yrFilter.on("change", function () {
            table.draw();
        });

        table.draw();
    });
});
