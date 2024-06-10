var truncateText = function (text, maxLength) {
    if (text.length > maxLength) {
        return text.substring(0, maxLength) + "...";
    } else {
        return text;
    }
};

$(document).ready(function () {
    function fetchJudgements(
        url,
        tableId,
        noDataMessage,
        paginationId,
        filters,
        headers,
        rowBuilder
    ) {
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (response) {
                $(`#${tableId} tbody`).empty();
                $(`#${tableId} thead`).empty();

                // Remove any existing record count display
                $(".record-count").remove();

                if (response.data.length === 0) {
                    var noDataRow = `<tr><td colspan="5" class="text-center text-primary fw-bold">${noDataMessage}</td></tr>`;
                    $(`#${tableId} tbody`).append(noDataRow);
                } else {
                    var head = '<tr class="text-center">';
                    headers.forEach((header) => {
                        head += `<th class="header-cell">${header}</th>`;
                    });
                    head += "</tr>";
                    $(`#${tableId} thead`).append(head);

                    $.each(response.data, function (index, item) {
                        var row = "<tr>";
                        row += `<td class="index-cell">${
                            response.from + index
                        }</td>`;
                        row += rowBuilder(item);
                        row += "</tr>";
                        $(`#${tableId} tbody`).append(row);
                    });

                    // Display the count of filtered records
                    var recordCount = `<p class="record-count">Showing ${response.from} to ${response.to} of ${response.total} records</p>`;
                    $(`#${paginationId}`).before(recordCount);

                    // Generate and display pagination links
                    var paginationLinks = "";
                    $.each(response.links, function (index, link) {
                        if (link.url === null) {
                            paginationLinks +=
                                '<li class="page-item disabled"><span class="page-link">' +
                                link.label +
                                "</span></li>";
                        } else {
                            var filteredUrl = new URL(
                                link.url,
                                window.location.origin
                            );
                            Object.keys(filters).forEach((key) => {
                                if (filters[key]) {
                                    filteredUrl.searchParams.set(
                                        key,
                                        filters[key]
                                    );
                                }
                            });
                            paginationLinks +=
                                '<li class="page-item' +
                                (link.active ? " active" : "") +
                                '"><a class="page-link" href="' +
                                filteredUrl.href +
                                '">' +
                                link.label +
                                "</a></li>";
                        }
                    });
                    $(`#${paginationId}`).html(paginationLinks);

                    $(".page-link").click(function (event) {
                        event.preventDefault();
                        if ($(this).attr("href") !== undefined) {
                            fetchJudgements(
                                $(this).attr("href"),
                                tableId,
                                noDataMessage,
                                paginationId,
                                filters,
                                headers,
                                rowBuilder
                            );
                        }
                    });

                    // Attach click event handler for modalData buttons
                    $(".modalData").click(handleModalDataClick);
                    $(".modalDataPDF").click(handleModalDataPDFClick);
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    }

    function handleModalDataClick() {
        var id = $(this).data("id");

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
                    '<a href="' +
                    detailData.pdfUrl +
                    '" target="_blank">View PDF</a>';
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

    function handleModalDataPDFClick() {
        var id = $(this).data("id");

        // Perform AJAX request to fetch data for the specific ID
        $.ajax({
            url: "/judgements/search/show/" + id, // Adjust this URL according to your route
            type: "GET",
            dataType: "json",
            success: function (detailData) {
                var modalTitle = "Case PDF"; // Set modal title
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
    }

    function getFilters() {
        return {
            fileno: $("#fileno").val(),
            year: $("#year").val(),
            partyname: $("#partyname").val(),
            advocate: $("#advocate").val(),
            casetype: $("#casetype").val(),
            casedate: $("#casedate").val(),
            subject: $("#subject").val(),
        };
    }

    $("#filterButtonFileNumber").click(function () {
        var filters = getFilters();
        var url = `/judgements/search/all?fileno=${filters.fileno}&year=${filters.year}`;
        var headers = ["S No", "Reg No", "Year", "Petitioner", "Action"];
        var rowBuilder = function (item) {
            return `
                <td class="regno-cell">${item.regno}</td>
                <td class="year-cell">${item.year}</td>
                <td class="petitioner-cell">${truncateText(
                    item.petitioner,
                    30
                )}</td>
                <td><button class="btn btn-primary btn-sm modalData" data-id="${
                    item.id
                }">View</button>
                    <button class="btn btn-secondary btn-sm modalDataPDF" data-id="${
                        item.id
                    }">PDF</button></td>
            `;
        };
        fetchJudgements(
            url,
            "dataTableFileNumber",
            "No data available for given search.",
            "paginationLinksFileNumber",
            filters,
            headers,
            rowBuilder
        );
    });

    $("#filterButtonPartyName").click(function () {
        var filters = getFilters();
        var url = `/judgements/search/all?partyname=${filters.partyname}`;
        var headers = ["S No", "Reg No", "Applicant", "Action"];
        var rowBuilder = function (item) {
            return `
                <td class="regno-cell">${item.regno}</td>
                <td class="applicant-cell">${truncateText(
                    item.petitioner,
                    30
                )}</td>
                <td><button class="btn btn-primary btn-sm modalData" data-id="${
                    item.id
                }">View</button>
                    <button class="btn btn-secondary btn-sm modalDataPDF" data-id="${
                        item.id
                    }">PDF</button></td>
            `;
        };
        fetchJudgements(
            url,
            "dataTablePartyName",
            "No data available for given search.",
            "paginationLinksPartyName",
            filters,
            headers,
            rowBuilder
        );
    });

    $("#filterButtonAdvocate").click(function () {
        var filters = getFilters();
        var url = `/judgements/search/all?advocate=${filters.advocate}`;
        var headers = [
            "S No",
            "Reg No",
            "Petitioner Advocate",
            "Respondent Advocate",
            "Action",
        ];
        var rowBuilder = function (item) {
            return `
                <td class="regno-cell">${item.regno}</td>
                <td class="petitioner-advocate-cell">${truncateText(
                    item.padvocate,
                    30
                )}</td>
                <td class="respondent-advocate-cell">${truncateText(
                    item.radvocate,
                    30
                )}</td>
                <td><button class="btn btn-primary btn-sm modalData" data-id="${
                    item.id
                }">View</button>
                    <button class="btn btn-secondary btn-sm modalDataPDF" data-id="${
                        item.id
                    }">PDF</button></td>
            `;
        };
        fetchJudgements(
            url,
            "dataTableAdvocate",
            "No data available for given search.",
            "paginationLinksAdvocate",
            filters,
            headers,
            rowBuilder
        );
    });

    $("#filterButtonCaseType").click(function () {
        var filters = getFilters();
        var url = `/judgements/search/all?casetype=${filters.casetype}`;
        var headers = ["S No", "Reg No", "Case Type", "Petitioner", "Action"];
        var rowBuilder = function (item) {
            return `
                <td class="regno-cell">${item.regno}</td>
                <td class="case-type-cell">${item.case_type}</td>
                <td class="petitioner-cell">${truncateText(
                    item.petitioner,
                    30
                )}</td>
                <td><button class="btn btn-primary btn-sm modalData" data-id="${
                    item.id
                }">View</button>
                    <button class="btn btn-secondary btn-sm modalDataPDF" data-id="${
                        item.id
                    }">PDF</button></td>
            `;
        };
        fetchJudgements(
            url,
            "dataTableCaseType",
            "No data available for given search.",
            "paginationLinksCaseType",
            filters,
            headers,
            rowBuilder
        );
    });

    $("#filterButtonDate").click(function () {
        var filters = getFilters();

        function formatInputDate(dateString) {
            if (typeof dateString !== "string") {
                return dateString;
            }
            var date = dateString.split("-");
            return date[2] + "-" + date[1] + "-" + date[0];
        }

        filters.casedate = formatInputDate(filters.casedate);
        var url = `/judgements/search/all?casedate=${filters.casedate}`;
        var headers = [
            "S No",
            "Reg No",
            "Date Decision",
            "Petitioner",
            "Action",
        ];
        var rowBuilder = function (item) {
            return `
                <td class="regno-cell">${item.regno}</td>
                <td class="case-type-cell">${item.dod}</td>
                <td class="petitioner-cell">${truncateText(
                    item.petitioner,
                    30
                )}</td>
                <td><button class="btn btn-primary btn-sm modalData" data-id="${
                    item.id
                }">View</button>
                    <button class="btn btn-secondary btn-sm modalDataPDF" data-id="${
                        item.id
                    }">PDF</button></td>
            `;
        };
        fetchJudgements(
            url,
            "dataTableDate",
            "No data available for given search.",
            "paginationLinksDate",
            filters,
            headers,
            rowBuilder
        );
    });

    $("#filterButtonSubject").click(function () {
        var filters = getFilters();
        var url = `/judgements/search/all?subject=${filters.subject}`;
        var headers = ["S No", "Reg No", "Subject", "Petitioner", "Action"];
        var rowBuilder = function (item) {
            return `
                <td class="regno-cell">${item.regno}</td>
                 <td class="petitioner-cell">${truncateText(
                     item.subject,
                     30
                 )}</td>
                <td class="petitioner-cell">${truncateText(
                    item.petitioner,
                    20
                )}</td>
                <td><button class="btn btn-primary btn-sm modalData" data-id="${
                    item.id
                }">View</button>
                    <button class="btn btn-secondary btn-sm modalDataPDF" data-id="${
                        item.id
                    }">PDF</button></td>
            `;
        };
        fetchJudgements(
            url,
            "dataTableSubject",
            "No data available for given search.",
            "paginationLinksSubject",
            filters,
            headers,
            rowBuilder
        );
    });

    $(".modalDataPDF").click(handleModalDataPDFClick);
});
