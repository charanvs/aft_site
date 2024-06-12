var truncateText = function (text, maxLength) {
    if (text.length > maxLength) {
        return text.substring(0, maxLength) + "...";
    } else {
        return text;
    }
};
function getCaseType(caseType) {
    switch (caseType) {
        case 1:
            return "OA";
        case 2:
            return "TA";
        case 3:
            return "AT";
        case 4:
            return "CA";
        case 5:
            return "RA";
        case 7:
            return "MA";
        default:
            return "Unknown";
    }
}

$(document).ready(function () {
    function clearTableContents() {
        $(".table tbody").empty();
        $(".table thead").empty();
        $(".table tfoot nav").empty();
        $(".record-count").remove();
    }

    // Add event listeners to tab buttons
    $(".tab ul.tabs li a").click(function (event) {
        clearTableContents();
    });

    // Event listener for search buttons
    $(".default-btn.btn-bg-three.border-radius-5").click(function (event) {
        clearTableContents();
    });
    function fetchJudgements(
        baseUrl,
        tableId,
        noDataMessage,
        paginationId,
        filters,
        headers,
        rowBuilder
    ) {
        var url = new URL(baseUrl, window.location.origin);
        Object.keys(filters).forEach((key) => {
            if (filters[key]) {
                url.searchParams.set(key, filters[key]);
            }
        });

        $.ajax({
            url: url.href,
            type: "GET",
            dataType: "json",
            success: function (response) {
                $(`#${tableId} tbody`).empty();
                $(`#${tableId} thead`).empty();
                $(`#${tableId} tfoot`).empty();

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

    function displayModal(detailData) {
        const statusValue = parseInt(detailData.status, 10);
        const statusText = statusValue === 1 ? "Pending" : "Disposed";
        const modalTitle = "Case Details";

        let modalBody = `
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Basic Information</h5>
                        <p><strong>Reg No:</strong> ${
                            detailData.registration_no
                        }</p>
                        <p><strong>Year:</strong> ${detailData.year}</p>
                        <p><strong>Department:</strong> ${
                            detailData.diaryno
                        }</p>
                        <p><strong>Associated:</strong> ${
                            detailData.case_type
                        }</p>
                        <p><strong>DOR:</strong> ${detailData.dor}</p>
                    </div>
                    <div class="col-md-6">
                        <h5>Advocates</h5>
                        <p><strong>Petitioner Advocate:</strong> ${
                            detailData.padvocate
                        }</p>
                        <p><strong>Respondent Advocate:</strong> ${
                            detailData.radvocate
                        }</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>Subject:</strong> ${detailData.location}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Case Information</h5>
                        <p><strong>Petitioner:</strong> ${
                            detailData.applicant
                        }</p>
                        <p><strong>Respondent:</strong> ${
                            detailData.respondent
                        }</p>
                    </div>
                    <div class="col-md-6">
                        <h5>Court Information</h5>
                        ${detailData.case_dependencies
                            .map((dependency) => {
                                const dolDate = new Date(
                                    dependency.dol
                                        .split("-")
                                        .reverse()
                                        .join("-")
                                );
                                return `<p><strong>Date Hearing:</strong> ${dolDate.toLocaleDateString()}</p>`;
                            })
                            .join("")}
                        <p><strong>Status:</strong> ${statusText}</p>
                        <p><strong>Remarks:</strong> ${detailData.reopened}</p>
                    </div>
                </div>
            </div>`;

        const modalFooter =
            '<button id="printButton" class="btn btn-primary">Print</button> Click away to close this.';
        $(".modal-body").html(modalBody);
        $("#modal_footer").html(modalFooter);
        $("#myModalLabel").text(modalTitle);
        $("#myModal").modal("show");

        $("#printButton").click(printModalContent);
        $("#closeModalButton").click(closeModal);
    }

    function handleModalDataClick() {
        var id = $(this).data("id");

        // Perform AJAX request to fetch data for the specific ID
        $.ajax({
            url: "/cases/search/show/" + id, // Adjust this URL according to your route
            type: "GET",
            dataType: "json",
            success: function (detailData) {
                displayModal(detailData);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    }

    function printModalContent() {
        const printWindow = window.open("", "_blank");
        printWindow.document.write(`
            <html>
            <head>
                <title>Print</title>
                <style>body { text-align: center; } .container { margin: 0 auto; width: 80%; }</style>
            </head>
            <body>
                <h1>${$("#myModalLabel").text()}</h1>
                ${document.querySelector("#myModal .modal-body").innerHTML}
            </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.print();
    }

    function handleModalDataPDFClick() {
        var id = $(this).data("id");

        // Perform AJAX request to fetch data for the specific ID
        $.ajax({
            url: "/cases/search/show/" + id, // Adjust this URL according to your route
            type: "GET",
            dataType: "json",
            success: function (detailData) {
                var modalTitle = "Case PDF"; // Set modal title
                var modalFooter = "Click away to close this.";
                var baseUrl =
                    "https://aftdelhi.nic.in/assets/judgement/" +
                    detailData.year +
                    "/OA/";
                var pdfUrl =
                    baseUrl + encodeURIComponent(detailData.dpdf.trim());

                // Open PDF in a new tab
                //----------- comment if folder pdf is on your site ------**

                // Try to open PDF in a new tab
                var newWindow = window.open(pdfUrl, "_blank");
                if (
                    !newWindow ||
                    newWindow.closed ||
                    typeof newWindow.closed == "undefined"
                ) {
                    alert(
                        "The PDF could not be opened. Please check your browser settings."
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert(
                    "An error occurred while trying to open the PDF. Please try again later."
                );
            },

            //----------- Uncomment if folder pdf is on your site ------**
            // var pdfUrl = "/pdf/" + detailData.dpdf; // Adjust according to your data structure
            // alert(pdfUrl);
            // var modalBody = '<div class="container">';
            // modalBody += '<div class="row">';
            // modalBody +=
            //     '<iframe src="' +
            //     pdfUrl +
            //     '" width="100%" height="600px"></iframe>';
            // modalBody += "</div>";
            // modalBody += "</div>";

            // // Populate modal with data
            // $("#myModalLabel").text(modalTitle);
            // $("#modal_footer").text(modalFooter);
            // $(".modal-body").html(modalBody);

            // // Open modal
            // $("#myModalPDF").modal("show");

            // // Close Modal
            // $("#closeModalButton").click(function () {
            //     $("#myModalPDF").modal("hide");
            // });
            // },
            // error: function (xhr, status, error) {
            //     console.error(xhr.responseText);
            // },
        });
    }

    // Make sure to attach the event handler to the PDF buttons
    $(document).on("click", ".modalDataPDF", handleModalDataPDFClick);

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
        var filters = {};
        filters.fileno = $("#fileno").val();
        filters.year = $("#year").val();
        var url = `/cases/search/all?fileno=${filters.fileno}&year=${filters.year}`;
        var headers = ["S No", "Reg No", "Year", "Petitioner", "Action"];
        var rowBuilder = function (item) {
            return `
                <td class="regno-cell">${item.registration_no}</td>
                <td class="year-cell">${item.year}</td>
                <td class="petitioner-cell">${truncateText(
                    item.applicant,
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
        var filters = {};
        filters.partyname = $("#partyname").val();
        var url = `/cases/search/all?partyname=${filters.partyname}`;
        var headers = ["S No", "Reg No", "Applicant", "Action"];
        var rowBuilder = function (item) {
            return `
                <td class="regno-cell">${item.registration_no}</td>
                <td class="applicant-cell">${truncateText(
                    item.applicant,
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
        var filters = {};
        filters.advocate = $("#advocate").val();
        var url = `/cases/search/all?advocate=${filters.advocate}`;
        var headers = [
            "S No",
            "Reg No",
            "Petitioner Advocate",
            "Respondent Advocate",
            "Action",
        ];
        var rowBuilder = function (item) {
            return `
                <td class="regno-cell">${item.registration_no}</td>
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
        var filters = {};
        filters.casetype = $("#casetype").val();
        var url = `/cases/search/all?casetype=${filters.casetype}`;
        var headers = ["S No", "Reg No", "Case Type", "Petitioner", "Action"];
        var rowBuilder = function (item) {
            return `
                <td class="regno-cell">${item.registration_no}</td>
                <td class="case-type-cell">${getCaseType(item.case_type)}</td>
                <td class="petitioner-cell">${truncateText(
                    item.applicant,
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
        var filters = {};
        filters.casedate = $("#casedate").val();

        function formatInputDate(dateString) {
            if (typeof dateString !== "string") {
                return dateString;
            }
            var date = dateString.split("-");
            return date[2] + "-" + date[1] + "-" + date[0];
        }

        filters.casedate = formatInputDate(filters.casedate);
        var url = `/cases/search/all?casedate=${filters.casedate}`;
        var headers = [
            "S No",
            "Reg No",
            "Date Decision",
            "Petitioner",
            "Action",
        ];
        var rowBuilder = function (item) {
            return `
                <td class="regno-cell">${item.registration_no}</td>
                <td class="case-type-cell">${item.dol}</td>
                <td class="petitioner-cell">${truncateText(
                    item.applicant,
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
        var filters = {};
        filters.subject = $("#subject").val();
        var url = `/cases/search/all?subject=${filters.subject}`;
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
