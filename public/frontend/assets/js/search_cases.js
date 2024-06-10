$(document).ready(function () {
    function handleModalDataClick() {
        var id = $(this).data("id");
        var baseUrl = "/cases/search/show";
        var fullUrl = baseUrl + "/" + id;

        $.ajax({
            url: fullUrl,
            type: "GET",
            dataType: "json",
            success: function (detailData) {
                console.log(detailData);
                var statusValue = parseInt(detailData.status, 10);
                var statusText = statusValue === 1 ? "Pending" : "Disposed";

                var modalTitle = "Case Details";
                var modalFooter =
                    '<button id="printButton" class="btn btn-primary">Print</button> Click away to close this.';
                var modalBody = '<div class="container">';
                modalBody +=
                    '<div class="row"><div class="col-md-6"><h5>Basic Information</h5>';
                modalBody +=
                    "<p><strong>Reg No:</strong> " +
                    detailData.registration_no +
                    "</p>";
                modalBody +=
                    "<p><strong>Year:</strong> " + detailData.year + "</p>";
                modalBody +=
                    "<p><strong>Department:</strong> " +
                    detailData.diaryno +
                    "</p>";
                modalBody +=
                    "<p><strong>Associated:</strong> " +
                    detailData.case_type +
                    "</p>";
                modalBody +=
                    "<p><strong>DOR:</strong> " + detailData.dor + "</p></div>";
                modalBody += '<div class="col-md-6"><h5>Advocates</h5>';
                modalBody +=
                    "<p><strong>Petitioner Advocate:</strong> " +
                    detailData.padvocate +
                    "</p>";
                modalBody +=
                    "<p><strong>Respondent Advocate:</strong> " +
                    detailData.radvocate +
                    "</p></div></div>";
                modalBody +=
                    '<div class="row"><div class="col-md-12"><p><strong>Subject:</strong> ' +
                    detailData.location +
                    "</p></div></div>";
                modalBody +=
                    '<div class="row"><div class="col-md-6"><h5>Case Information</h5>';
                modalBody +=
                    "<p><strong>Petitioner:</strong> " +
                    detailData.applicant +
                    "</p>";
                modalBody +=
                    "<p><strong>Respondent:</strong> " +
                    detailData.respondent +
                    "</p></div>";
                modalBody += '<div class="col-md-6"><h5>Court Information</h5>';

                detailData.case_dependencies.forEach(function (dependency) {
                    var dateParts = dependency.dol.split("-");
                    var dolDate = new Date(
                        parseInt(dateParts[2], 10),
                        parseInt(dateParts[1], 10) - 1,
                        parseInt(dateParts[0], 10)
                    );
                    modalBody +=
                        "<p><strong>Date Hearing:</strong> " +
                        dolDate.toLocaleDateString() +
                        "</p>";
                });

                modalBody +=
                    "<p><strong>Status:</strong> " + statusText + "</p>";
                modalBody +=
                    "<p><strong>Remarks:</strong> " +
                    detailData.reopened +
                    "</p></div></div>";

                $(".modal-body").html(modalBody);
                $("#modal_footer").html(modalFooter);
                $("#myModalLabel").text(modalTitle);
                $("#myModal").modal("show");

                $("#printButton").click(function () {
                    var printWindow = window.open("", "_blank");
                    printWindow.document.write(
                        "<html><head><title>Print</title><style>body { text-align: center; } .container { margin: 0 auto; width: 80%; }</style></head><body>"
                    );
                    printWindow.document.write("<h1>" + modalTitle + "</h1>");
                    printWindow.document.write(
                        document.querySelector("#myModal .modal-body").innerHTML
                    );
                    printWindow.document.write("</body></html>");
                    printWindow.document.close();
                    printWindow.print();
                });

                $("#closeModalButton").click(function () {
                    $("#myModal").modal("hide");
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    }

    function fetchJudgements(url, tableId, truncateLength = 30) {
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (response) {
                $(tableId + " tbody").empty();
                $(tableId + " thead").empty();

                if (response.data.length === 0) {
                    var noDataRow =
                        '<tr><td colspan="5" class="text-center text-primary">No data available for given search.</td></tr>';
                    $(tableId + " tbody").append(noDataRow);
                } else {
                    var head =
                        '<tr class="text-center"><th class="header-cell">S No</th><th class="header-cell">Reg No</th><th class="header-cell">Case Type</th><th class="header-cell">Petitioner</th><th class="header-cell">Action</th></tr>';
                    $(tableId + " thead").append(head);

                    $.each(response.data, function (index, item) {
                        var row =
                            "<tr><td class='index-cell'>" +
                            (response.from + index) +
                            "</td>";
                        row +=
                            "<td class='regno-cell'>" +
                            item.registration_no +
                            "</td>";
                        row +=
                            "<td class='padvocate-cell'>" +
                            item.case_type +
                            "</td>";
                        row +=
                            "<td class='padvocate-cell'>" +
                            (item.applicant.length > truncateLength
                                ? item.applicant.substring(0, truncateLength) +
                                  "..."
                                : item.applicant) +
                            "</td>";
                        row +=
                            "<td><button class='btn btn-primary btn-sm modalData' data-id='" +
                            item.id +
                            "'>View Details</button>";
                        $(tableId + " tbody").append(row);
                    });

                    var paginationLinks = response.links;
                    $("#paginationLinks").html(paginationLinks);

                    $("#paginationLinks .page-link").click(function (event) {
                        event.preventDefault();
                        if ($(this).attr("href") !== undefined) {
                            fetchJudgements(
                                $(this).attr("href"),
                                tableId,
                                truncateLength
                            );
                        }
                    });

                    $(".modalData").click(handleModalDataClick);
                    $(".modalDataPDF").click(handleModalDataPDFClick);
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    }

    $("#filterButtonFile").click(function () {
        var fileno = $("#fileno").val();
        var year = $("#year").val();
        fetchJudgements(
            casesSearchUrl + "?fileno=" + fileno + "&year=" + year,
            "#dataTableFile",
            30
        );
    });

    $("#filterButtonParty").click(function () {
        var partyname = $("#partyname").val();
        fetchJudgements(
            casesSearchUrl + "?partyname=" + partyname,
            "#dataTableParty",
            40
        );
    });

    $("#filterButtonAdvocate").click(function () {
        var advocate = $("#advocate").val();
        fetchJudgements(
            casesSearchUrl + "?advocate=" + advocate,
            "#dataTableAdvocate",
            15
        );
    });

    $("#filterButtonCasetype").click(function () {
        var casetype = $("#casetype").val();
        fetchJudgements(
            casesSearchUrl + "?casetype=" + casetype,
            "#dataTableCasetype",
            30
        );
    });

    $("#filterButtonCaseDate").click(function () {
        var casedate = $("#casedate").val();
        var formattedDate = casedate.split("-").reverse().join("-");
        fetchJudgements(
            casesSearchUrl + "?casedate=" + formattedDate,
            "#dataTableCaseDate",
            30
        );
    });

    $("#filterButtonSubject").click(function () {
        var subject = $("#subject").val();
        fetchJudgements(
            casesSearchUrl + "?subject=" + subject,
            "#dataTableSubject",
            30
        );
    });

    $(document).on("click", ".data-click", handleModalDataClick);
});
