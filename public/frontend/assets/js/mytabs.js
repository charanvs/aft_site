<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>;

$(document).ready(function () {
    $("#filterButtonFile").click(function () {
        var fileno = $("#fileno").val();
        var year = $("#year").val();

        $.ajax({
            url: "{{ route('judgements.search') }}",
            type: "GET",
            data: {
                fileno,
                year,
            },
            dataType: "json",
            success: function (data) {
                $("#dataTable tbody").empty();

                if (data.length === 0) {
                    var noDataRow =
                        '<tr><td colspan="4" class="text-center h6">No data available for given search.</td></tr>';
                    $("#dataTable tbody").append(noDataRow);
                } else {
                    var head =
                        '<tr class="text-center">' +
                        '<th class="header-cell">S No</th>' +
                        '<th class="header-cell">Reg No</th>' +
                        '<th class="header-cell">Year</th>' +
                        '<th class="header-cell">Petitioner</th>' +
                        '<th class="header-cell">Action</th>' +
                        "</tr>";
                    $("#dataTable thead").append(head);
                    $.each(data, function (index, item) {
                        var row =
                            "<tr>" +
                            '<td class="index-cell">' +
                            (index + 1) +
                            "</td>" +
                            '<td class="regno-cell">' +
                            item.regno +
                            "</td>" +
                            '<td class="padvocate-cell">' +
                            item.year +
                            "</td>" +
                            '<td class="radvocate-cell">' +
                            item.petitioner +
                            "</td>" +
                            "<td>" +
                            '<button class="btn btn-primary btn-sm modalData" data-id="' +
                            item.id +
                            '">View</button>' +
                            "</td>" +
                            "<td>" +
                            '<button class="btn btn-secondary btn-sm modalData" data-id="' +
                            item.id +
                            '">PDF</button>' +
                            "</td>" +
                            "</tr>";

                        $("#dataTable tbody").append(row);
                    });
                    // Attach click event handler for modalData buttons
                    $(".modalData").click(function () {
                        var id = $(this).data("id");

                        // Perform AJAX request to fetch data for the specific ID
                        $.ajax({
                            url: "{{ route('judgements.show', '') }}/" + id, // Adjust this URL according to your route
                            type: "GET",
                            dataType: "json",
                            success: function (detailData) {
                                var modalTitle = "Case Details"; // Set modal title
                                var modalFooter = "Click away to close this.";
                                var modalBody = '<div class="container">';
                                modalBody += '<div class="row">';
                                modalBody += '<div class="col-md-6">';
                                modalBody += "<h5>Basic Information</h5>";
                                modalBody +=
                                    "<p><strong>Reg No:</strong> " +
                                    detailData.regno +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Year:</strong> " +
                                    detailData.year +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Department:</strong> " +
                                    detailData.deptt +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Associated:</strong> " +
                                    detailData.associated +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>DOR:</strong> " +
                                    detailData.dor +
                                    "</p>";
                                // Add more basic information fields as needed
                                modalBody += "</div>";
                                modalBody += '<div class="col-md-6">';
                                modalBody += "<h5>Advocates</h5>";
                                modalBody +=
                                    "<p><strong>Petitioner Advocate:</strong> " +
                                    detailData.padvocate +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Respondent Advocate:</strong> " +
                                    detailData.radvocate +
                                    "</p>";
                                // Add more advocate-related fields as needed
                                modalBody += "</div>";
                                modalBody += "</div>"; // End of row
                                // Add more sections as needed
                                modalBody += '<div class="row">';
                                modalBody += '<div class="col-md-12">';
                                modalBody +=
                                    "<p><strong>Subject:</strong> " +
                                    detailData.subject +
                                    "</p>";
                                modalBody += "</div>";
                                modalBody += "</div>";
                                //second row section
                                modalBody += '<div class="row">';
                                modalBody += '<div class="col-md-6">';
                                modalBody += "<h5>Case Information</h5>";
                                modalBody +=
                                    "<p><strong>Petitioner:</strong> " +
                                    detailData.petitioner +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Respondent:</strong> " +
                                    detailData.associated +
                                    "</p>";

                                // Add more basic information fields as needed
                                modalBody += "</div>";
                                modalBody += '<div class="col-md-6">';
                                modalBody += "<h5>Court Information</h5>";
                                modalBody +=
                                    "<p><strong>Court No:</strong> " +
                                    detailData.court_no +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Remarks:</strong> " +
                                    detailData.remarks +
                                    "</p>";
                                // Add more advocate-related fields as needed
                                modalBody += "</div>";
                                modalBody += "</div>"; // End of row
                                // Add more sections as needed
                                modalBody += "</div>"; // End of container

                                $(".modal-body").html(modalBody); // Adjust fields according to your data structure

                                // Populate modal with data
                                $("#myModalLabel").text(modalTitle);

                                $("#modal_footer").text(modalFooter);
                                $(".modal-body").html(modalBody);

                                // Open modal
                                $("#myModal").modal("show");
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                            },
                        });
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    });
    $("#filterButtonParty").click(function () {
        var partyname = $("#partyname").val();

        $.ajax({
            url: "{{ route('judgements.search') }}",
            type: "GET",
            data: {
                partyname,
            },
            dataType: "json",
            success: function (data) {
                $("#dataTable tbody").empty();

                if (data.length === 0) {
                    var noDataRow =
                        '<tr><td colspan="4" class="text-center h6">No data available for given search.</td></tr>';
                    $("#dataTable tbody").append(noDataRow);
                } else {
                    $.each(data, function (index, item) {
                        var row =
                            "<tr>" +
                            '<td class="index-cell">' +
                            (index + 1) +
                            "</td>" +
                            '<td class="regno-cell">' +
                            item.regno +
                            "</td>" +
                            '<td class="padvocate-cell">' +
                            item.petitioner +
                            "</td>" +
                            "<td>" +
                            '<button class="btn btn-primary btn-sm modalData" data-id="' +
                            item.id +
                            '">View</button>' +
                            "</td>" +
                            "<td>" +
                            '<button class="btn btn-secondary btn-sm modalData" data-id="' +
                            item.id +
                            '">PDF</button>' +
                            "</td>" +
                            "</tr>";
                        $("#dataTable tbody").append(row);
                    });

                    // Attach click event handler for modalData buttons
                    $(".modalData").click(function () {
                        var id = $(this).data("id");

                        // Perform AJAX request to fetch data for the specific ID
                        $.ajax({
                            url: "{{ route('judgements.show', '') }}/" + id, // Adjust this URL according to your route
                            type: "GET",
                            dataType: "json",
                            success: function (detailData) {
                                var modalTitle = "Case Details"; // Set modal title
                                var modalFooter = "Click away to close this.";
                                var modalBody = '<div class="container">';
                                modalBody += '<div class="row">';
                                modalBody += '<div class="col-md-6">';
                                modalBody += "<h5>Basic Information</h5>";
                                modalBody +=
                                    "<p><strong>Reg No:</strong> " +
                                    detailData.regno +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Year:</strong> " +
                                    detailData.year +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Department:</strong> " +
                                    detailData.deptt +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Associated:</strong> " +
                                    detailData.associated +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>DOR:</strong> " +
                                    detailData.dor +
                                    "</p>";
                                // Add more basic information fields as needed
                                modalBody += "</div>";
                                modalBody += '<div class="col-md-6">';
                                modalBody += "<h5>Advocates</h5>";
                                modalBody +=
                                    "<p><strong>Petitioner Advocate:</strong> " +
                                    detailData.padvocate +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Respondent Advocate:</strong> " +
                                    detailData.radvocate +
                                    "</p>";
                                // Add more advocate-related fields as needed
                                modalBody += "</div>";
                                modalBody += "</div>"; // End of row
                                // Add more sections as needed
                                modalBody += '<div class="row">';
                                modalBody += '<div class="col-md-12">';
                                modalBody +=
                                    "<p><strong>Subject:</strong> " +
                                    detailData.subject +
                                    "</p>";
                                modalBody += "</div>";
                                modalBody += "</div>";
                                //second row section
                                modalBody += '<div class="row">';
                                modalBody += '<div class="col-md-6">';
                                modalBody += "<h5>Case Information</h5>";
                                modalBody +=
                                    "<p><strong>Petitioner:</strong> " +
                                    detailData.petitioner +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Respondent:</strong> " +
                                    detailData.associated +
                                    "</p>";

                                // Add more basic information fields as needed
                                modalBody += "</div>";
                                modalBody += '<div class="col-md-6">';
                                modalBody += "<h5>Court Information</h5>";
                                modalBody +=
                                    "<p><strong>Court No:</strong> " +
                                    detailData.court_no +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Remarks:</strong> " +
                                    detailData.remarks +
                                    "</p>";
                                // Add more advocate-related fields as needed
                                modalBody += "</div>";
                                modalBody += "</div>"; // End of row
                                // Add more sections as needed
                                modalBody += "</div>"; // End of container

                                $(".modal-body").html(modalBody); // Adjust fields according to your data structure

                                // Populate modal with data
                                $("#myModalLabel").text(modalTitle);

                                $("#modal_footer").text(modalFooter);
                                $(".modal-body").html(modalBody);

                                // Open modal
                                $("#myModal").modal("show");
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                            },
                        });
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    });
    $("#filterButtonAdvocate").click(function () {
        var padvocatename = $("#padvocatename").val();
        var radvocatename = $("#radvocatename").val();

        $.ajax({
            url: "{{ route('judgements.search') }}",
            type: "GET",
            data: {
                padvocatename,
                radvocatename,
            },
            dataType: "json",
            success: function (data) {
                $("#dataTable tbody").empty();

                if (data.length === 0) {
                    var noDataRow =
                        '<tr><td colspan="4" class="text-center h6">No data available for given search.</td></tr>';
                    $("#dataTable tbody").append(noDataRow);
                } else {
                    $.each(data, function (index, item) {
                        var row =
                            "<tr>" +
                            '<td class="index-cell">' +
                            (index + 1) +
                            "</td>" +
                            '<td class="regno-cell">' +
                            item.regno +
                            "</td>" +
                            '<td class="padvocate-cell">' +
                            item.padvocate +
                            "</td>" +
                            '<td class="radvocate-cell">' +
                            item.radvocate +
                            "</td>" +
                            "<td>" +
                            '<button class="btn btn-primary btn-sm modalData" data-id="' +
                            item.id +
                            '">View</button>' +
                            "</td>" +
                            "<td>" +
                            '<button class="btn btn-secondary btn-sm modalData" data-id="' +
                            item.id +
                            '">PDF</button>' +
                            "</td>" +
                            "</tr>";

                        $("#dataTable tbody").append(row);
                    });

                    // Attach click event handler for modalData buttons
                    $(".modalData").click(function () {
                        var id = $(this).data("id");

                        // Perform AJAX request to fetch data for the specific ID
                        $.ajax({
                            url: "{{ route('judgements.show', '') }}/" + id, // Adjust this URL according to your route
                            type: "GET",
                            dataType: "json",
                            success: function (detailData) {
                                var modalTitle = "Case Details"; // Set modal title
                                var modalFooter = "Click away to close this.";
                                var modalBody = '<div class="container">';
                                modalBody += '<div class="row">';
                                modalBody += '<div class="col-md-6">';
                                modalBody += "<h5>Basic Information</h5>";
                                modalBody +=
                                    "<p><strong>Reg No:</strong> " +
                                    detailData.regno +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Year:</strong> " +
                                    detailData.year +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Department:</strong> " +
                                    detailData.deptt +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Associated:</strong> " +
                                    detailData.associated +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>DOR:</strong> " +
                                    detailData.dor +
                                    "</p>";
                                // Add more basic information fields as needed
                                modalBody += "</div>";
                                modalBody += '<div class="col-md-6">';
                                modalBody += "<h5>Advocates</h5>";
                                modalBody +=
                                    "<p><strong>Petitioner Advocate:</strong> " +
                                    detailData.padvocate +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Respondent Advocate:</strong> " +
                                    detailData.radvocate +
                                    "</p>";
                                // Add more advocate-related fields as needed
                                modalBody += "</div>";
                                modalBody += "</div>"; // End of row
                                // Add more sections as needed
                                modalBody += '<div class="row">';
                                modalBody += '<div class="col-md-12">';
                                modalBody +=
                                    "<p><strong>Subject:</strong> " +
                                    detailData.subject +
                                    "</p>";
                                modalBody += "</div>";
                                modalBody += "</div>";
                                //second row section
                                modalBody += '<div class="row">';
                                modalBody += '<div class="col-md-6">';
                                modalBody += "<h5>Case Information</h5>";
                                modalBody +=
                                    "<p><strong>Petitioner:</strong> " +
                                    detailData.petitioner +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Respondent:</strong> " +
                                    detailData.associated +
                                    "</p>";

                                // Add more basic information fields as needed
                                modalBody += "</div>";
                                modalBody += '<div class="col-md-6">';
                                modalBody += "<h5>Court Information</h5>";
                                modalBody +=
                                    "<p><strong>Court No:</strong> " +
                                    detailData.court_no +
                                    "</p>";
                                modalBody +=
                                    "<p><strong>Remarks:</strong> " +
                                    detailData.remarks +
                                    "</p>";
                                // Add more advocate-related fields as needed
                                modalBody += "</div>";
                                modalBody += "</div>"; // End of row
                                // Add more sections as needed
                                modalBody += "</div>"; // End of container

                                $(".modal-body").html(modalBody); // Adjust fields according to your data structure

                                // Populate modal with data
                                $("#myModalLabel").text(modalTitle);

                                $("#modal_footer").text(modalFooter);
                                $(".modal-body").html(modalBody);

                                // Open modal
                                $("#myModal").modal("show");
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                            },
                        });
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    });
});
