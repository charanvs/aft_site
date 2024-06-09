var truncateText = function (text, maxLength) {
    if (text.length > maxLength) {
        return text.substring(0, maxLength) + "...";
    } else {
        return text;
    }
};
$("#dataTableCasetype").on("click", ".modalDataPDF", function () {
    var id = $(this).data("id");

    // Construct the URL for the PDF
    var pdfUrl = "{{ route('judgements.pdf', '') }}/" + id;

    // Open the PDF in a new tab
    window.open(pdfUrl, "_blank");
});
$(document).ready(function () {
    $("#filterButtonFile").click(function () {
        var fileno = $("#fileno").val();
        var year = $("#year").val();

        $.ajax({
            url: "/judgements/search/all",
            type: "GET",
            data: { fileno, year },
            dataType: "json",
            success: function (data) {
                $("#dataTableFile tbody").empty();
                $("#dataTableFile thead").empty();
                $("#dataTableAdvocate tbody").empty();
                $("#dataTableParty tbody").empty();

                if (data.length === 0) {
                    var noDataRow =
                        '<tr><td colspan="4" class="text-center h6">No data available for given search.</td></tr>';
                    $("#dataTableFile tbody").append(noDataRow);
                } else {
                    var head =
                        '<tr class="text-center">' +
                        '<th class="header-cell">S No</th>' +
                        '<th class="header-cell">Reg No</th>' +
                        '<th class="header-cell">Year</th>' +
                        '<th class="header-cell">Petitioner</th>' +
                        '<th class="header-cell">Action</th>' +
                        "</tr>";
                    $("#dataTableFile thead").append(head);

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
                            truncateText(item.petitioner, 40) +
                            "</td>" +
                            '<td><button class="btn btn-primary btn-sm modalData" data-id="' +
                            item.id +
                            '">View</button></td>' +
                            '<td><button class="btn btn-secondary btn-sm modalDataPDF" data-id="' +
                            item.id +
                            '">PDF</button></td>' +
                            "</tr>";
                        $("#dataTableFile tbody").append(row);
                    });

                    // Attach click event handler for modalData buttons
                    $(".modalData").click(handleModalDataClick);
                    // Attach click event handler for modalDataPDF buttons
                    $(".modalDataPDF").click(handleModalDataPDFClick);
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
            url: "/judgements/search/all",
            type: "GET",
            data: { partyname },
            dataType: "json",
            success: function (data) {
                $("#dataTableParty tbody").empty();

                if (data.length === 0) {
                    var noDataRow =
                        '<tr><td colspan="4" class="text-center h6">No data available for given search.</td></tr>';
                    $("#dataTable tbody").append(noDataRow);
                } else {
                    var head =
                        '<tr class="text-center">' +
                        '<th class="header-cell">S No</th>' +
                        '<th class="header-cell">Reg No</th>' +
                        '<th class="header-cell">Petitioner</th>' +
                        "</tr>";
                    $("#dataTableParty thead").append(head);

                    $.each(data, function (index, item) {
                        var row =
                            "<tr>" +
                            '<td class="index-cell">' +
                            (index + 1) +
                            "</td>" +
                            '<td class="regno-cell">' +
                            item.regno +
                            "</td>" +
                            '<td class="radvocate-cell">' +
                            truncateText(item.petitioner, 40) +
                            "</td>" +
                            '<td><button class="btn btn-primary btn-sm modalData" data-id="' +
                            item.id +
                            '">View</button></td>' +
                            '<td><button class="btn btn-secondary btn-sm modalDataPDF" data-id="' +
                            item.id +
                            '">PDF</button></td>' +
                            "</tr>";
                        $("#dataTableParty tbody").append(row);
                    });

                    // Attach click event handler for modalData buttons
                    $(".modalData").click(handleModalDataClick);
                    // Attach click event handler for modalDataPDF buttons
                    $(".modalDataPDF").click(handleModalDataPDFClick);
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    });

    function handleModalDataClick() {
        var id = $(this).data("id");
        var pdfUrl =
            "https://aftdelhi.nic.in/assets/judgement/2012/OA/OA-226-2012-%20Ex.%20Sigmn%20Kalyan%20Sharma%20Vs%20Union%20Of%20India%20%20Ors.pdf";

        // Perform AJAX request to fetch data for the specific ID
        $.ajax({
            url: "/judgements/search/show/" + id, // Adjust this URL according to your route
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
                    "<p><strong>Reg No:</strong> " + detailData.regno + "</p>";
                modalBody +=
                    "<p><strong>Year:</strong> " + detailData.year + "</p>";
                modalBody +=
                    "<p><strong>Department:</strong> " +
                    detailData.deptt +
                    "</p>";
                modalBody +=
                    "<p><strong>Associated:</strong> " +
                    detailData.associated +
                    "</p>";
                modalBody +=
                    "<p><strong>DOR:</strong> " + detailData.dor + "</p>";
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
                modalBody += "</div>";
                modalBody += "</div>"; // End of row
                modalBody += '<div class="row">';
                modalBody += '<div class="col-md-12">';
                modalBody +=
                    "<p><strong>Subject:</strong> " +
                    detailData.subject +
                    "</p>";
                modalBody += "</div>";
                modalBody += "</div>";
                // Second row section
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

                modalBody += "</div>";

                modalBody += "</div>"; // End of row
                modalBody += "<div>";
                modalBody +=
                    '<a href="' + pdfUrl + '" target="_blank">View PDF</a>';
                modalBody += "</div>";
                modalBody += "</div>"; // End of container

                $(".modal-body").html(modalBody); // Adjust fields according to your data structure

                // Populate modal with data
                $("#myModalLabel").text(modalTitle);
                $("#modal_footer").text(modalFooter);
                $(".modal-body").html(modalBody);

                // Open modal
                $("#myModal").modal("show");

                // Close Modal
                $("#closeModalButton").click(function () {
                    $("#myModal").modal("hide");
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    }
});

// Advocate Search
$(document).ready(function () {
    function fetchJudgements(url) {
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#dataTableAdvocate tbody").empty();
                $("#dataTableAdvocate thead").empty();

                if (response.data.length === 0) {
                    var noDataRow =
                        '<tr><td colspan="5" class="text-center text-primary">No data available for given search.</td></tr>';
                    $("#dataTableAdvocate tbody").append(noDataRow);
                } else {
                    var head =
                        "<tr>" +
                        '<th class="header-cell">S No</th>' +
                        '<th class="header-cell">Reg No</th>' +
                        '<th class="header-cell">P. Advocate</th>' +
                        '<th class="header-cell">R. Advocate</th>' +
                        '<th class="header-cell">Action</th>' +
                        "</tr>";
                    $("#dataTableAdvocate thead").append(head);

                    $.each(response.data, function (index, item) {
                        var row =
                            "<tr>" +
                            '<td class="index-cell">' +
                            (response.from + index) +
                            "</td>" +
                            '<td class="regno-cell">' +
                            item.regno +
                            "</td>" +
                            '<td class="padvocate-cell">' +
                            (item.padvocate.length > 15
                                ? item.padvocate.substring(0, 15) + "..."
                                : item.padvocate.replace(/^\s+|\s+$/g, "")) +
                            "</td>" +
                            '<td class="padvocate-cell">' +
                            (item.radvocate.length > 15
                                ? item.radvocate.substring(0, 15) + "..."
                                : item.radvocate.replace(/^\s+|\s+$/g, "")) +
                            "</td>" +
                            "<td>" +
                            '<button class="btn btn-primary btn-sm modalData pr-1" data-id="' +
                            item.id +
                            '">View</button>' +
                            '<button class="btn btn-secondary btn-sm modalDataPDF" data-id="' +
                            item.id +
                            '">PDF</button>' +
                            "</td>" +
                            "</tr>";
                        $("#dataTableAdvocate tbody").append(row);
                    });

                    // Generate and display pagination links
                    var paginationLinks = "";
                    $.each(response.links, function (index, link) {
                        if (link.url === null) {
                            paginationLinks +=
                                '<li class="page-item disabled"><span class="page-link">' +
                                link.label +
                                "</span></li>";
                        } else {
                            paginationLinks +=
                                '<li class="page-item' +
                                (link.active ? " active" : "") +
                                '"><a class="page-link" href="' +
                                link.url +
                                '">' +
                                link.label +
                                "</a></li>";
                        }
                    });
                    $("#paginationLinks").html(paginationLinks);

                    $(".page-link").click(function (event) {
                        event.preventDefault();
                        if ($(this).attr("href") !== undefined) {
                            fetchJudgements($(this).attr("href"));
                        }
                    });

                    // Attach click event handler for modalData buttons
                    $(".modalData").click(function () {
                        var id = $(this).data("id");

                        // Perform AJAX request to fetch data for the specific ID
                        $.ajax({
                            url: "/judgements/search/show/" + id,
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
                                // Second row section
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

                                // Populate modal with data
                                $("#myModalLabel").text(modalTitle);
                                $("#modal_footer").text(modalFooter);
                                $(".modal-body").html(modalBody);

                                // Open modal
                                $("#myModal").modal("show");
                                // Close Modal
                                $("#closeModalButton").click(function () {
                                    $("#myModal").modal("hide");
                                });
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
    }

    $("#filterButtonAdvocate").click(function () {
        var advocate = $("#advocate").val();

        var url = "/judgements/search/advocate/" + advocate;
        fetchJudgements(url);
    });
});

// Case Type Search

$(document).ready(function () {
    function fetchJudgements(url) {
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#dataTableCasetype tbody").empty();
                $("#dataTableCasetype thead").empty();

                if (response.data.length === 0) {
                    var noDataRow =
                        '<tr><td colspan="5" class="text-center text-primary">No data available for given search.</td></tr>';
                    $("#dataTableCasetype tbody").append(noDataRow);
                } else {
                    var head =
                        '<tr class="text-center">' +
                        '<th class="header-cell">S No</th>' +
                        '<th class="header-cell">Reg No</th>' +
                        '<th class="header-cell">Case Type</th>' +
                        '<th class="header-cell">Petitioner</th>' +
                        '<th class="header-cell">Action</th>' +
                        "</tr>";
                    $("#dataTableCasetype thead").append(head);

                    $.each(response.data, function (index, item) {
                        var row =
                            "<tr>" +
                            '<td class="index-cell">' +
                            (response.from + index) +
                            "</td>" +
                            '<td class="regno-cell">' +
                            item.regno +
                            "</td>" +
                            '<td class="padvocate-cell">' +
                            item.case_type +
                            "</td>" +
                            '<td class="padvocate-cell">' +
                            (item.petitioner.length > 30
                                ? item.petitioner.substring(0, 30) + "..."
                                : item.petitioner) +
                            "</td>" +
                            "<td>" +
                            '<button class="btn btn-primary btn-sm modalData" data-id="' +
                            item.id +
                            '">View</button>' +
                            '<button class="btn btn-secondary btn-sm modalData" data-id="' +
                            item.id +
                            '">PDF</button>' +
                            "</td>" +
                            "</tr>";
                        $("#dataTableCasetype tbody").append(row);
                    });

                    // Generate and display pagination links
                    var paginationLinksCasetype = "";
                    $.each(response.links, function (index, link) {
                        if (link.url === null) {
                            paginationLinksCasetype +=
                                '<li class="page-item disabled"><span class="page-link">' +
                                link.label +
                                "</span></li>";
                        } else {
                            paginationLinksCasetype +=
                                '<li class="page-item' +
                                (link.active ? " active" : "") +
                                '"><a class="page-link" href="' +
                                link.url +
                                '">' +
                                link.label +
                                "</a></li>";
                        }
                    });
                    $("#paginationLinksCasetype").html(paginationLinksCasetype);

                    $(".page-link").click(function (event) {
                        event.preventDefault();
                        if ($(this).attr("href") !== undefined) {
                            fetchJudgements($(this).attr("href"));
                        }
                    });

                    // Attach click event handler for modalData buttons
                    $(".modalData").click(function () {
                        var id = $(this).data("id");

                        // Perform AJAX request to fetch data for the specific ID
                        $.ajax({
                            url: "/judgements/search/show/" + id,
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
                                // Second row section
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

                                // Populate modal with data
                                $("#myModalLabel").text(modalTitle);
                                $("#modal_footer").text(modalFooter);
                                $(".modal-body").html(modalBody);

                                // Open modal
                                $("#myModal").modal("show");

                                // Close Modal
                                $("#closeModalButton").click(function () {
                                    $("#myModal").modal("hide");
                                });
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
    }

    $("#filterButtonCasetype").click(function () {
        var casetype = $("#casetype").val();

        var url = "/judgements/search/type/" + casetype;
        fetchJudgements(url);
    });
});

// Date Search
$(document).ready(function () {
    function fetchJudgements(url) {
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#dataTableCaseDate tbody").empty();
                $("#dataTableCaseDate thead").empty();

                if (response.data.length === 0) {
                    var noDataRow =
                        '<tr><td colspan="5" class="text-center text-primary fw-bold">No data available for date.</td></tr>';
                    $("#dataTableCaseDate tbody").append(noDataRow);
                } else {
                    var head =
                        '<tr class="text-center">' +
                        '<th class="header-cell">S No</th>' +
                        '<th class="header-cell">Reg No</th>' +
                        '<th class="header-cell">Date of Decision</th>' +
                        '<th class="header-cell">Decision</th>' +
                        '<th class="header-cell">Action</th>' +
                        "</tr>";
                    $("#dataTableCaseDate thead").append(head);

                    $.each(response.data, function (index, item) {
                        var row =
                            "<tr>" +
                            '<td class="index-cell">' +
                            (response.from + index) +
                            "</td>" +
                            '<td class="regno-cell">' +
                            item.regno +
                            "</td>" +
                            '<td class="padvocate-cell">' +
                            item.dod +
                            "</td>" +
                            '<td class="padvocate-cell">' +
                            (item.mod.length > 30
                                ? item.mod.substring(0, 30) + "..."
                                : item.mod) +
                            "</td>" +
                            "<td>" +
                            '<button class="btn btn-primary btn-sm modalData" data-id="' +
                            item.id +
                            '">View</button>' +
                            '<button class="btn btn-secondary btn-sm modalData" data-id="' +
                            item.id +
                            '">PDF</button>' +
                            "</td>" +
                            "</tr>";
                        $("#dataTableCaseDate tbody").append(row);
                    });

                    // Generate and display pagination links
                    var paginationLinksCaseDate = "";
                    $.each(response.links, function (index, link) {
                        if (link.url === null) {
                            paginationLinksCaseDate +=
                                '<li class="page-item disabled"><span class="page-link">' +
                                link.label +
                                "</span></li>";
                        } else {
                            paginationLinksCaseDate +=
                                '<li class="page-item' +
                                (link.active ? " active" : "") +
                                '"><a class="page-link" href="' +
                                link.url +
                                '">' +
                                link.label +
                                "</a></li>";
                        }
                    });
                    $("#paginationLinksCaseDate").html(paginationLinksCaseDate);

                    $(".page-link").click(function (event) {
                        event.preventDefault();
                        if ($(this).attr("href") !== undefined) {
                            fetchJudgements($(this).attr("href"));
                        }
                    });

                    // Attach click event handler for modalData buttons
                    $(".modalData").click(function () {
                        var id = $(this).data("id");

                        // Perform AJAX request to fetch data for the specific ID
                        $.ajax({
                            url: "/judgements/search/show/" + id,
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
                                // Second row section
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

                                // Populate modal with data
                                $("#myModalLabel").text(modalTitle);
                                $("#modal_footer").text(modalFooter);
                                $(".modal-body").html(modalBody);

                                // Open modal
                                $("#myModal").modal("show");

                                // Close Modal
                                $("#closeModalButton").click(function () {
                                    $("#myModal").modal("hide");
                                });
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
    }

    $("#filterButtonCaseDate").click(function () {
        var casedate = $("#casedate").val();

        function formatInputDate(dateString) {
            var date = dateString.split("-");
            return date[2] + "-" + date[1] + "-" + date[0];
        }
        casedate = formatInputDate(casedate);

        var url = "/judgements/search/casedate/" + casedate;

        fetchJudgements(url);
    });
});

// Subject Search
$(document).ready(function () {
    function fetchJudgements(url) {
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#dataTableSubject tbody").empty();
                $("#dataTableSubject thead").empty();

                if (response.data.length === 0) {
                    var noDataRow =
                        '<tr><td colspan="5" class="text-center text-primary fw-bold">No data available for date.</td></tr>';
                    $("#dataTableSubject tbody").append(noDataRow);
                } else {
                    var head =
                        '<tr class="text-center">' +
                        '<th class="header-cell">S No</th>' +
                        '<th class="header-cell">Reg No</th>' +
                        '<th class="header-cell">Subject</th>' +
                        '<th class="header-cell">Action</th>' +
                        "</tr>";
                    $("#dataTableSubject thead").append(head);

                    $.each(response.data, function (index, item) {
                        var row =
                            "<tr>" +
                            '<td class="index-cell">' +
                            (response.from + index) +
                            "</td>" +
                            '<td class="regno-cell">' +
                            item.regno +
                            "</td>" +
                            '<td class="padvocate-cell">' +
                            (item.subject.length > 30
                                ? item.subject.substring(0, 30) + "..."
                                : item.subject) +
                            "</td>" +
                            "<td>" +
                            '<button class="btn btn-primary btn-sm modalData" data-id="' +
                            item.id +
                            '">View</button>' +
                            '<button class="btn btn-secondary btn-sm modalData" data-id="' +
                            item.id +
                            '">PDF</button>' +
                            "</td>" +
                            "</tr>";
                        $("#dataTableSubject tbody").append(row);
                    });

                    // Generate and display pagination links
                    var paginationLinksSubject = "";
                    $.each(response.links, function (index, link) {
                        if (link.url === null) {
                            paginationLinksSubject +=
                                '<li class="page-item disabled"><span class="page-link">' +
                                link.label +
                                "</span></li>";
                        } else {
                            paginationLinksSubject +=
                                '<li class="page-item' +
                                (link.active ? " active" : "") +
                                '"><a class="page-link" href="' +
                                link.url +
                                '">' +
                                link.label +
                                "</a></li>";
                        }
                    });
                    $("#paginationLinksSubject").html(paginationLinksSubject);

                    $(".page-link").click(function (event) {
                        event.preventDefault();
                        if ($(this).attr("href") !== undefined) {
                            fetchJudgements($(this).attr("href"));
                        }
                    });

                    // Attach click event handler for modalData buttons
                    $(".modalData").click(function () {
                        var id = $(this).data("id");

                        // Perform AJAX request to fetch data for the specific ID
                        $.ajax({
                            url: "/judgements/search/show/" + id,
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
                                // Second row section
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

                                // Populate modal with data
                                $("#myModalLabel").text(modalTitle);
                                $("#modal_footer").text(modalFooter);
                                $(".modal-body").html(modalBody);

                                // Open modal
                                $("#myModal").modal("show");

                                // Close Modal
                                $("#closeModalButton").click(function () {
                                    $("#myModal").modal("hide");
                                });
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
    }

    $("#filterButtonSubject").click(function () {
        var subject = $("#subject").val();

        var url = "/judgements/search/subject/" + subject;

        fetchJudgements(url);
    });
});
$(document).ready(function () {
    $(".modalDataPDF").click(function () {
        var id = $(this).data("id");

        // Perform AJAX request to fetch data for the specific ID
        $.ajax({
            url: "{{ route('judgements.pdf', '') }}/" + id, // Adjust this URL according to your route
            type: "GET",
            dataType: "json",
            success: function (detailData) {
                var modalTitle = "Case Details"; // Set modal title
                var modalFooter = "Click away to close this.";
                var pdfUrl = "{{ url('pdfs') }}/" + detailData.pdfFilename; // Adjust according to your data structure
                var modalBody = '<div class="container">';
                modalBody += '<div class="row">';
                modalBody +=
                    '<a href="' + pdfUrl + '" target="_blank">View PDF</a>';
                modalBody += "</div>";
                modalBody += "</div>";

                // Populate modal with data
                $("#myModalLabel").text(modalTitle);
                $("#modal_footer").text(modalFooter);
                $(".modal-body").html(modalBody);

                // Open modal
                $("#myModalPDF").modal("show");

                // Close Modal
                $("#closeModalButton").click(function () {
                    $("#myModalPDF").modal("hide");
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    });
});
