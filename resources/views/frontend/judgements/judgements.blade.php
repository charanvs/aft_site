@extends('frontend.main_master')
@section('main')
@section('title')
  AFT-PB | Judgements
@endsection
@include('frontend.body.header')
<style>
  /* Custom CSS for spacing between buttons */
  .btn-spacing {
    margin-right: 10px;
    /* Adjust this value to your desired spacing */
  }

  .index-cell,
  .regno-cell,
  .padvocate-cell,
  .radvocate-cell {
    padding: 8px;
    text-align: center;
  }

  .index-cell {
    font-weight: bold;
  }

  .header-cell {
    font-weight: bold;
    font-size: 20px;
  }

  .regno-cell,
  .padvocate-cell,
  .radvocate-cell {
    font-size: 18px;
  }
</style>


<div class="reservation-widget-area pt-60 pb-70">
  <div class="container ml-5">
    <div class="tab reservation-tab ml-5">
      <ul class="tabs">
        <li>
          <a href="#" class="default-btn btn-bg-four border-radius-5 btn-spacing"><span class="text-white h6">File
              Number</span></a>
        </li>

        <li>
          <a href="#" class="default-btn btn-bg-four border-radius-5 btn-spacing"><span class="text-white h6">Party
              Name</span></a>

        </li>

        <li>
          <a href="#" class="default-btn btn-bg-four border-radius-5 btn-spacing"><span
              class="text-white h6">Advocate
              Name</span></a>

        </li>

        <li>
          <a href="#" class="default-btn btn-bg-four border-radius-5 btn-spacing"><span class="text-white h6">Case
              Type</span></a>

        </li>

        <li>
          <a href="#" class="default-btn btn-bg-four border-radius-5 btn-spacing"><span
              class="text-white h6">Date</span></a>

        </li>
        <li>
          <a href="#" class="default-btn btn-bg-four border-radius-5 btn-spacing"><span
              class="text-white h6">Subject</span></a>

        </li>

      </ul>

      <div class="tab_content current active pt-45">
        <div class="tabs_item current">
          <div class="reservation-tab-item">
            <div class="row">
              <div class="col-lg-4">
                <div class="side-bar-form">
                  <h3>Search By - File
                    Number </h3>
                  <form method="get" action="{{ route('judgements.page') }}">
                    <div class="row align-items-center">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>
                            <h5>Select Bench</h5>
                          </label>
                          <select class="form-control">
                            <option>
                              <h6>Principal Bench</h6>
                            </option>
                            <option>Chandigarh</option>
                            <option>Chennai</option>
                            <option>Guwhati</option>
                            <option>Kolkata</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="h5">File No</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="File No" id="fileno">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx bx-file-blank'></i>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="h5">Year</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Year of File No" id="year">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx bx-calendar-check'></i>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12">
                        <button id="filterButtonFile" type="button" class="default-btn btn-bg-three border-radius-5">
                          Search
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="reservation-widget-content">
                  <h2>Details of Judgements - File No</h2>
                  <hr>
                  <table id="dataTableFile" class="table">
                    <!-- Table headers -->
                    <thead>

                      <!-- Table Head where data will be displayed -->

                    </thead>
                    <!-- Table body where data will be displayed -->
                    <tbody>
                      <!-- Table rows will be populated dynamically -->
                    </tbody>

                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tabs_item">
          <div class="reservation-tab-item">
            <div class="row">
              <div class="col-lg-4">
                <div class="side-bar-form">
                  <h3>Search By - Party Name</h3>
                  <form method="get" action="#">
                    <div class="row align-items-center">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>
                            <h5>Select Bench</h5>
                          </label>
                          <select class="form-control">
                            <option>Principal Bench</option>
                            <option>Chandigarh</option>
                            <option>Chennai</option>
                            <option>Guwhati</option>
                            <option>Kolkata</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Party Name</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Party Name" id="partyname">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx box-file-search'></i>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12">
                        <button id="filterButtonParty" type="button" class="default-btn btn-bg-three border-radius-5">
                          Search
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="reservation-widget-content">
                  <h2>Details of Judgements - Party Name</h2>
                  <table id="dataTableParty" class="table">
                    <!-- Table headers -->
                    <thead>
                      <!-- Table Header from script will be displayed -->
                    </thead>
                    <!-- Table body where data will be displayed -->
                    <tbody>
                      <!-- Table rows will be populated dynamically -->
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tabs_item">
          <div class="reservation-tab-item">
            <div class="row">
              <div class="col-lg-3">
                <div class="side-bar-form">
                  <h3>Search By - Advocate </h3>
                  <form method="get" action="#">
                    <div class="row align-items-center">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Select Bench</label>
                          <select class="form-control">
                            <option>Principal Bench</option>
                            <option>Chandigarh</option>
                            <option>Chennai</option>
                            <option>Guwhati</option>
                            <option>Kolkata</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Advocate Name</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Advocate Name"
                              id="advocate">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx bx-user-pin'></i>
                        </div>
                      </div>


                      <div class="col-lg-12 col-md-12">
                        <button id="filterButtonAdvocate" type="button"
                          class="default-btn btn-bg-three border-radius-5">
                          Search
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-9">
                <div class="reservation-widget-content">
                  <h2>Cases - Advocate</h2>
                  <table id="dataTableAdvocate" class="table">
                    <!-- Table headers -->
                    <thead>
                      <!-- data from jquery -->
                    </thead>
                    <!-- Table body where data will be displayed -->
                    <tbody>
                      <!-- Table rows will be populated dynamically -->
                    </tbody>
                  </table>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination" id="paginationLinks"></ul>
                  </nav>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tabs_item">
          <div class="reservation-tab-item">
            <div class="row">
              <div class="col-lg-4">
                <div class="side-bar-form">
                  <h3>Search By - Case Type </h3>
                  <form method="get" action="">
                    <div class="row align-items-center">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Select Bench</label>
                          <select class="form-control">
                            <option>Principal Bench</option>
                            <option>Chandigarh</option>
                            <option>Chennai</option>
                            <option>Guwhati</option>
                            <option>Kolkata</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Select Case Type</label>
                          <select class="form-control" id="casetype">
                            <option value="OA">OA</option>
                            <option value="TA">TA</option>
                            <option value="CA">CA</option>
                            <option value="AT">AT</option>
                            <option value="MA">MA</option>
                            <option value="RA">RA</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12">
                        <button id="filterButtonCasetype" type="button"
                          class="default-btn btn-bg-three border-radius-5">
                          Search
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="reservation-widget-content">
                  <h2>Cases - Type</h2>
                  <table id="dataTableCasetype" class="table">
                    <!-- Table headers -->
                    <thead>

                    </thead>
                    <!-- Table body where data will be displayed -->
                    <tbody>
                      <!-- Table rows will be populated dynamically -->
                    </tbody>
                  </table>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination" id="paginationLinksCasetype"></ul>
                  </nav>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tabs_item">
          <div class="reservation-tab-item">
            <div class="row">
              <div class="col-lg-4">
                <div class="side-bar-form">
                  <h3>Search By - Date </h3>
                  <form method="get" action="{{ route('judgements.page') }}">
                    <div class="row align-items-center">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Select Bench</label>
                          <select class="form-control">
                            <option>Principal Bench</option>
                            <option>Chandigarh</option>
                            <option>Chennai</option>
                            <option>Guwhati</option>
                            <option>Kolkata</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Date</label>
                          <div class="input-group">
                            <input type="date" class="form-control" placeholder="Date" id="casedate">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx file-search'></i>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12">
                        <button id="filterButtonCaseDate" type="button"
                          class="default-btn btn-bg-three border-radius-5">
                          Search
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="reservation-widget-content">
                  <h2>Cases - Date</h2>
                  <table id="dataTableCaseDate" class="table">
                    <!-- Table headers -->
                    <thead>
                      <!-- Header data  -->
                    </thead>
                    <!-- Table body where data will be displayed -->
                    <tbody>
                      <!-- Table rows will be populated dynamically -->
                    </tbody>
                  </table>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination" id="paginationLinksCaseDate"></ul>
                  </nav>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="tabs_item">
          <div class="reservation-tab-item">
            <div class="row">
              <div class="col-lg-4">
                <div class="side-bar-form">
                  <h3>Search By - Subject </h3>
                  <form method="get" action="{{ route('judgements.page') }}">
                    <div class="row align-items-center">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Select Bench</label>
                          <select class="form-control">
                            <option>Principal Bench</option>
                            <option>Chandigarh</option>
                            <option>Chennai</option>
                            <option>Guwhati</option>
                            <option>Kolkata</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Subject</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Subject" id="subject">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx bx-book-content'></i>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12">
                        <button id="filterButtonSubject" type="button"
                          class="default-btn btn-bg-three border-radius-5">
                          Search Subject
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="reservation-widget-content">
                  <h2>Cases - Subject</h2>
                  <table id="dataTableSubject" class="table">
                    <!-- Table headers -->
                    <thead>
                      <!-- Header data  -->
                    </thead>
                    <!-- Table body where data will be displayed -->
                    <tbody>
                      <!-- Table rows will be populated dynamically -->
                    </tbody>
                  </table>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination" id="paginationLinksSubject"></ul>
                  </nav>

                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Modal Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModalButton">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Modal Body Content -->
        <p>Modal body content goes here.</p>
      </div>
      <div class="modal-footer" id="modal_footer">

      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  var truncateText = function(text, maxLength) {
    if (text.length > maxLength) {
      return text.substring(0, maxLength) + '...';
    } else {
      return text;
    }
  };
  $('#dataTableCasetype').on('click', '.modalDataPDF', function() {
    var id = $(this).data('id');

    // Construct the URL for the PDF
    var pdfUrl = "{{ route('judgements.pdf', '') }}/" + id;

    // Open the PDF in a new tab
    window.open(pdfUrl, '_blank');
  });
  $(document).ready(function() {
    $('#filterButtonFile').click(function() {
      var fileno = $('#fileno').val();
      var year = $('#year').val();

      $.ajax({
        url: "{{ route('judgements.search') }}",
        type: 'GET',
        data: {
          fileno,
          year,
        },
        dataType: 'json',
        success: function(data) {
          $('#dataTableFile tbody').empty();
          $('#dataTableAdvocate tbody').empty();
          $('#dataTableParty tbody').empty();

          if (data.length === 0) {
            var noDataRow =
              '<tr><td colspan="4" class="text-center h6">No data available for given search.</td></tr>';
            $('#dataTableFile tbody').append(noDataRow);
          } else {
            var head = '<tr class="text-center">' +
              '<th class="header-cell">S No</th>' +
              '<th class="header-cell">Reg No</th>' +
              '<th class="header-cell">Year</th>' +
              '<th class="header-cell">Petitioner</th>' +
              '<th class="header-cell">Action</th>' +
              '</tr>'
            $('#dataTableFile thead').append(head);
            $.each(data, function(index, item) {
              var row =
                '<tr>' +
                '<td class="index-cell">' + (index + 1) + '</td>' +
                '<td class="regno-cell">' + item.regno + '</td>' +
                '<td class="padvocate-cell">' + item.year + '</td>' +
                '<td class="radvocate-cell">' + truncateText(item.petitioner, 40) +
                '<td>' +
                '<button class="btn btn-primary btn-sm modalData" data-id="' + item.id +
                '">View</button>' +
                '</td>' +
                '<td>' +
                '<button class="btn btn-secondary btn-sm modalData" data-id="' + item.id +
                '">PDF</button>' +
                '</td>' +
                '</tr>';

              $('#dataTableFile tbody').append(row);
            });
            // Attach click event handler for modalData buttons
            $('.modalData').click(function() {
              var id = $(this).data('id');

              // Perform AJAX request to fetch data for the specific ID
              $.ajax({
                url: "{{ route('judgements.show', '') }}/" +
                  id, // Adjust this URL according to your route
                type: 'GET',
                dataType: 'json',
                success: function(detailData) {
                  var modalTitle = "Case Details"; // Set modal title
                  var modalFooter = "Click away to close this."
                  var modalBody = '<div class="container">';
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Basic Information</h5>';
                  modalBody += '<p><strong>Reg No:</strong> ' + detailData.regno + '</p>';
                  modalBody += '<p><strong>Year:</strong> ' + detailData.year + '</p>';
                  modalBody += '<p><strong>Department:</strong> ' + detailData.deptt + '</p>';
                  modalBody += '<p><strong>Associated:</strong> ' + detailData.associated +
                    '</p>';
                  modalBody += '<p><strong>DOR:</strong> ' + detailData.dor + '</p>';
                  // Add more basic information fields as needed
                  modalBody += '</div>';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Advocates</h5>';
                  modalBody += '<p><strong>Petitioner Advocate:</strong> ' + detailData
                    .padvocate + '</p>';
                  modalBody += '<p><strong>Respondent Advocate:</strong> ' + detailData
                    .radvocate + '</p>';
                  // Add more advocate-related fields as needed
                  modalBody += '</div>';
                  modalBody += '</div>'; // End of row
                  // Add more sections as needed
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-12">';
                  modalBody += '<p><strong>Subject:</strong> ' + detailData.subject + '</p>';
                  modalBody += '</div>';
                  modalBody += '</div>';
                  //second row section
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Case Information</h5>';
                  modalBody += '<p><strong>Petitioner:</strong> ' + detailData.petitioner +
                    '</p>';
                  modalBody += '<p><strong>Respondent:</strong> ' + detailData.associated +
                    '</p>';


                  // Add more basic information fields as needed
                  modalBody += '</div>';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Court Information</h5>';
                  modalBody += '<p><strong>Court No:</strong> ' + detailData
                    .court_no + '</p>';
                  modalBody += '<p><strong>Remarks:</strong> ' + detailData
                    .remarks + '</p>';
                  // Add more advocate-related fields as needed
                  modalBody += '</div>';
                  modalBody += '</div>'; // End of row
                  // Add more sections as needed
                  modalBody += '</div>'; // End of container

                  $('.modal-body').html(
                    modalBody); // Adjust fields according to your data structure

                  // Populate modal with data
                  $('#myModalLabel').text(modalTitle);

                  $('#modal_footer').text(modalFooter);
                  $('.modal-body').html(modalBody);

                  // Open modal
                  $('#myModal').modal('show');
                  // Close Modal
                  $('#closeModalButton').click(function() {
                    $('#myModal').modal('hide');
                  });
                },
                error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                }
              });
            });
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    });
    $('#filterButtonParty').click(function() {
      var partyname = $('#partyname').val();

      $.ajax({
        url: "{{ route('judgements.search') }}",
        type: 'GET',
        data: {
          partyname
        },
        dataType: 'json',
        success: function(data) {
          $('#dataTableParty tbody').empty();

          if (data.length === 0) {
            var noDataRow =
              '<tr><td colspan="4" class="text-center h6">No data available for given search.</td></tr>';
            $('#dataTable tbody').append(noDataRow);
          } else {
            var head = '<tr class="text-center">' +
              '<th class="header-cell">S No</th>' +
              '<th class="header-cell">Reg No</th>' +
              '<th class="header-cell">Petitioner</th>' +
              '</tr>'
            $('#dataTableParty thead').append(head);
            $.each(data, function(index, item) {

              var row = '<tr>' +
                '<td class="index-cell">' + (index + 1) + '</td>' +
                '<td class="regno-cell">' + item.regno + '</td>' +
                '<td class="radvocate-cell">' + truncateText(item.petitioner, 40) +
                '</td>' +
                '<td>' +
                '<button class="btn btn-primary btn-sm modalData" data-id="' + item.id +
                '">View</button>' +
                '</td>' +
                '<td>' +
                '<button class="btn btn-secondary btn-sm modalData" data-id="' + item.id +
                '">PDF</button>' +
                '</td>' +
                '</tr>';
              $('#dataTableParty tbody').append(row);
            });

            // Attach click event handler for modalData buttons
            $('.modalData').click(function() {
              var id = $(this).data('id');

              // Perform AJAX request to fetch data for the specific ID
              $.ajax({
                url: "{{ route('judgements.show', '') }}/" +
                  id, // Adjust this URL according to your route
                type: 'GET',
                dataType: 'json',
                success: function(detailData) {
                  var modalTitle = "Case Details"; // Set modal title
                  var modalFooter = "Click away to close this."
                  var modalBody = '<div class="container">';
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Basic Information</h5>';
                  modalBody += '<p><strong>Reg No:</strong> ' + detailData.regno + '</p>';
                  modalBody += '<p><strong>Year:</strong> ' + detailData.year + '</p>';
                  modalBody += '<p><strong>Department:</strong> ' + detailData.deptt + '</p>';
                  modalBody += '<p><strong>Associated:</strong> ' + detailData.associated +
                    '</p>';
                  modalBody += '<p><strong>DOR:</strong> ' + detailData.dor + '</p>';
                  // Add more basic information fields as needed
                  modalBody += '</div>';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Advocates</h5>';
                  modalBody += '<p><strong>Petitioner Advocate:</strong> ' + detailData
                    .padvocate + '</p>';
                  modalBody += '<p><strong>Respondent Advocate:</strong> ' + detailData
                    .radvocate + '</p>';
                  // Add more advocate-related fields as needed
                  modalBody += '</div>';
                  modalBody += '</div>'; // End of row
                  // Add more sections as needed
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-12">';
                  modalBody += '<p><strong>Subject:</strong> ' + detailData.subject + '</p>';
                  modalBody += '</div>';
                  modalBody += '</div>';
                  //second row section
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Case Information</h5>';
                  modalBody += '<p><strong>Petitioner:</strong> ' + detailData.petitioner +
                    '</p>';
                  modalBody += '<p><strong>Respondent:</strong> ' + detailData.associated +
                    '</p>';


                  // Add more basic information fields as needed
                  modalBody += '</div>';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Court Information</h5>';
                  modalBody += '<p><strong>Court No:</strong> ' + detailData
                    .court_no + '</p>';
                  modalBody += '<p><strong>Remarks:</strong> ' + detailData
                    .remarks + '</p>';
                  // Add more advocate-related fields as needed
                  modalBody += '</div>';
                  modalBody += '</div>'; // End of row
                  // Add more sections as needed
                  modalBody += '</div>'; // End of container

                  $('.modal-body').html(
                    modalBody); // Adjust fields according to your data structure

                  // Populate modal with data
                  $('#myModalLabel').text(modalTitle);

                  $('#modal_footer').text(modalFooter);
                  $('.modal-body').html(modalBody);

                  // Open modal
                  $('#myModal').modal('show');
                  // Close Modal
                  $('#closeModalButton').click(function() {
                    $('#myModal').modal('hide');
                  });
                },
                error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                }
              });
            });
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    });
  });
</script>
{{-- Advocate Search --}}
<script>
  $(document).ready(function() {
    function fetchJudgements(url) {
      $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          $('#dataTableAdvocate tbody').empty();
          $('#dataTableAdvocate thead').empty();

          if (response.data.length === 0) {
            var
              noDataRow =
              '<tr><td colspan="5" class="text-center text-primary">No data available for given search.</td></tr>';
            $('#dataTableAdvocate tbody').append(noDataRow);
          } else {
            var head = '<tr>' +
              '<th class="header-cell">S No</th>' +
              '<th class="header-cell">Reg No</th>' +
              '<th class="header-cell">P. Advocate</th>' +
              '<th class="header-cell">R. Advocate</th>' +
              '<th class="header-cell">Action</th>' +
              '</tr>';
            $('#dataTableAdvocate thead').append(head);

            $.each(response.data, function(index, item) {
              var row = '<tr>' +
                '<td class="index-cell">' + (response.from + index) + '</td>' +
                '<td class="regno-cell">' + item.regno + '</td>' +
                '<td class="padvocate-cell">' + (item.padvocate.length > 15 ? item.padvocate.substring(
                  0, 15) + '...' : item.padvocate.replace(/^\s+|\s+$/g, '')) + '</td>' +
                '<td class="padvocate-cell">' + (item.radvocate.length > 15 ? item.radvocate.substring(
                  0, 15) + '...' : item.radvocate.replace(/^\s+|\s+$/g, '')) + '</td>' +
                '<td>' +
                '<button class="btn btn-primary btn-sm modalData pr-1" data-id="' + item.id +
                '">View</button>' +
                '<button class="btn btn-secondary btn-sm modalDataPDF" data-id="' + item.id +
                '">PDF</button>' +
                '</td>' +
                '</tr>';
              $('#dataTableAdvocate tbody').append(row);
            });

            // Generate and display pagination links
            var paginationLinks = '';
            $.each(response.links, function(index, link) {
              if (link.url === null) {
                paginationLinks += '<li class="page-item disabled"><span class="page-link">' + link
                  .label + '</span></li>';
              } else {
                paginationLinks +=
                  '<li class="page-item' + (link.active ? ' active' : '') +
                  '"><a class="page-link" href="' + link.url + '">' +
                  link.label + '</a></li>';
              }
            });
            $('#paginationLinks').html(paginationLinks);

            $('.page-link').click(function(event) {
              event.preventDefault();
              if ($(this).attr('href') !== undefined) {
                fetchJudgements($(this).attr('href'));
              }
            });

            // Attach click event handler for modalData buttons
            $('.modalData').click(function() {
              var id = $(this).data('id');

              // Perform AJAX request to fetch data for the specific ID
              $.ajax({
                url: "{{ route('judgements.show', '') }}/" + id,
                type: 'GET',
                dataType: 'json',
                success: function(detailData) {
                  var modalTitle = "Case Details"; // Set modal title
                  var modalFooter = "Click away to close this.";
                  var modalBody = '<div class="container">';
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Basic Information</h5>';
                  modalBody += '<p><strong>Reg No:</strong> ' + detailData.regno + '</p>';
                  modalBody += '<p><strong>Year:</strong> ' + detailData.year + '</p>';
                  modalBody += '<p><strong>Department:</strong> ' + detailData.deptt + '</p>';
                  modalBody += '<p><strong>Associated:</strong> ' + detailData.associated + '</p>';
                  modalBody += '<p><strong>DOR:</strong> ' + detailData.dor + '</p>';
                  // Add more basic information fields as needed
                  modalBody += '</div>';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Advocates</h5>';
                  modalBody += '<p><strong>Petitioner Advocate:</strong> ' + detailData.padvocate +
                    '</p>';
                  modalBody += '<p><strong>Respondent Advocate:</strong> ' + detailData.radvocate +
                    '</p>';
                  // Add more advocate-related fields as needed
                  modalBody += '</div>';
                  modalBody += '</div>'; // End of row
                  // Add more sections as needed
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-12">';
                  modalBody += '<p><strong>Subject:</strong> ' + detailData.subject + '</p>';
                  modalBody += '</div>';
                  modalBody += '</div>';
                  // Second row section
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Case Information</h5>';
                  modalBody += '<p><strong>Petitioner:</strong> ' + detailData.petitioner + '</p>';
                  modalBody += '<p><strong>Respondent:</strong> ' + detailData.associated + '</p>';
                  // Add more basic information fields as needed
                  modalBody += '</div>';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Court Information</h5>';
                  modalBody += '<p><strong>Court No:</strong> ' + detailData.court_no + '</p>';
                  modalBody += '<p><strong>Remarks:</strong> ' + detailData.remarks + '</p>';
                  // Add more advocate-related fields as needed
                  modalBody += '</div>';
                  modalBody += '</div>'; // End of row
                  // Add more sections as needed
                  modalBody += '</div>'; // End of container

                  // Populate modal with data
                  $('#myModalLabel').text(modalTitle);
                  $('#modal_footer').text(modalFooter);
                  $('.modal-body').html(modalBody);

                  // Open modal
                  $('#myModal').modal('show');
                  // Close Modal
                  $('#closeModalButton').click(function() {
                    $('#myModal').modal('hide');
                  });
                },
                error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                }
              });
            });
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    }

    $('#filterButtonAdvocate').click(function() {
      var advocate = $('#advocate').val();

      var url = "/judgements/search/advocate/" + advocate;
      fetchJudgements(url);
    });
  });
</script>
{{-- Case Type Search --}}
<script>
  $(document).ready(function() {

    function fetchJudgements(url) {
      $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          $('#dataTableCasetype tbody').empty();
          $('#dataTableCasetype thead').empty();

          if (response.data.length === 0) {
            var
              noDataRow =
              '<tr><td colspan="5" class="text-center text-primary">No data available for given search.</td></tr>';
            $('#dataTableCasetype tbody').append(noDataRow);
          } else {
            var head = '<tr class="text-center">' +
              '<th class="header-cell">S No</th>' +
              '<th class="header-cell">Reg No</th>' +
              '<th class="header-cell">Case Type</th>' +
              '<th class="header-cell">Petitioner</th>' +
              '<th class="header-cell">Action</th>' +
              '</tr>';
            $('#dataTableCasetype thead').append(head);

            $.each(response.data, function(index, item) {
              var row = '<tr>' +
                '<td class="index-cell">' + (response.from + index) + '</td>' +
                '<td class="regno-cell">' + item.regno + '</td>' +
                '<td class="padvocate-cell">' + item.case_type + '</td>' +
                '<td class="padvocate-cell">' + (item.petitioner.length > 30 ? item.petitioner.substring(
                  0, 30) + '...' : item.petitioner) + '</td>' +
                '<td>' +
                '<button class="btn btn-primary btn-sm modalData" data-id="' + item.id +
                '">View</button>' +
                '<button class="btn btn-secondary btn-sm modalData" data-id="' + item.id +
                '">PDF</button>' +
                '</td>' +
                '</tr>';
              $('#dataTableCasetype tbody').append(row);
            });

            // Generate and display pagination links
            var paginationLinksCasetype = '';
            $.each(response.links, function(index, link) {
              if (link.url === null) {
                paginationLinksCasetype += '<li class="page-item disabled"><span class="page-link">' +
                  link
                  .label + '</span></li>';
              } else {
                paginationLinksCasetype +=
                  '<li class="page-item' + (link.active ? ' active' : '') +
                  '"><a class="page-link" href="' + link.url + '">' +
                  link.label + '</a></li>';
              }
            });
            $('#paginationLinksCasetype').html(paginationLinksCasetype);

            $('.page-link').click(function(event) {
              event.preventDefault();
              if ($(this).attr('href') !== undefined) {
                fetchJudgements($(this).attr('href'));
              }
            });

            // Attach click event handler for modalData buttons
            $('.modalData').click(function() {
              var id = $(this).data('id');

              // Perform AJAX request to fetch data for the specific ID
              $.ajax({
                url: "{{ route('judgements.show', '') }}/" + id,
                type: 'GET',
                dataType: 'json',
                success: function(detailData) {
                  var modalTitle = "Case Details"; // Set modal title
                  var modalFooter = "Click away to close this.";
                  var modalBody = '<div class="container">';
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Basic Information</h5>';
                  modalBody += '<p><strong>Reg No:</strong> ' + detailData.regno + '</p>';
                  modalBody += '<p><strong>Year:</strong> ' + detailData.year + '</p>';
                  modalBody += '<p><strong>Department:</strong> ' + detailData.deptt + '</p>';
                  modalBody += '<p><strong>Associated:</strong> ' + detailData.associated + '</p>';
                  modalBody += '<p><strong>DOR:</strong> ' + detailData.dor + '</p>';
                  // Add more basic information fields as needed
                  modalBody += '</div>';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Advocates</h5>';
                  modalBody += '<p><strong>Petitioner Advocate:</strong> ' + detailData.padvocate +
                    '</p>';
                  modalBody += '<p><strong>Respondent Advocate:</strong> ' + detailData.radvocate +
                    '</p>';
                  // Add more advocate-related fields as needed
                  modalBody += '</div>';
                  modalBody += '</div>'; // End of row
                  // Add more sections as needed
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-12">';
                  modalBody += '<p><strong>Subject:</strong> ' + detailData.subject + '</p>';
                  modalBody += '</div>';
                  modalBody += '</div>';
                  // Second row section
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Case Information</h5>';
                  modalBody += '<p><strong>Petitioner:</strong> ' + detailData.petitioner + '</p>';
                  modalBody += '<p><strong>Respondent:</strong> ' + detailData.associated + '</p>';
                  // Add more basic information fields as needed
                  modalBody += '</div>';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Court Information</h5>';
                  modalBody += '<p><strong>Court No:</strong> ' + detailData.court_no + '</p>';
                  modalBody += '<p><strong>Remarks:</strong> ' + detailData.remarks + '</p>';
                  // Add more advocate-related fields as needed
                  modalBody += '</div>';
                  modalBody += '</div>'; // End of row
                  // Add more sections as needed
                  modalBody += '</div>'; // End of container

                  // Populate modal with data
                  $('#myModalLabel').text(modalTitle);
                  $('#modal_footer').text(modalFooter);
                  $('.modal-body').html(modalBody);

                  // Open modal
                  $('#myModal').modal('show');

                  // Close Modal
                  $('#closeModalButton').click(function() {
                    $('#myModal').modal('hide');
                  });
                },
                error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                }
              });
            });
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    }

    $('#filterButtonCasetype').click(function() {
      var casetype = $('#casetype').val();

      var url = "/judgements/search/type/" + casetype;
      fetchJudgements(url);
    });
  });
</script>

{{-- Date Search --}}
<script>
  $(document).ready(function() {

    function fetchJudgements(url) {
      $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          $('#dataTableCaseDate tbody').empty();
          $('#dataTableCaseDate thead').empty();

          if (response.data.length === 0) {
            var
              noDataRow =
              '<tr><td colspan="5" class="text-center text-primary fw-bold">No data available for date.</td></tr>';
            $('#dataTableCaseDate tbody').append(noDataRow);
          } else {
            var head = '<tr class="text-center">' +
              '<th class="header-cell">S No</th>' +
              '<th class="header-cell">Reg No</th>' +
              '<th class="header-cell">Date of Decision</th>' +
              '<th class="header-cell">Decision</th>' +
              '<th class="header-cell">Action</th>' +
              '</tr>';
            $('#dataTableCaseDate thead').append(head);

            $.each(response.data, function(index, item) {
              var row = '<tr>' +
                '<td class="index-cell">' + (response.from + index) + '</td>' +
                '<td class="regno-cell">' + item.regno + '</td>' +
                '<td class="padvocate-cell">' + item.dod + '</td>' +
                '<td class="padvocate-cell">' + (item.mod.length > 30 ? item.mod.substring(
                  0, 30) + '...' : item.mod) + '</td>' +
                '<td>' +
                '<button class="btn btn-primary btn-sm modalData" data-id="' + item.id +
                '">View</button>' +
                '<button class="btn btn-secondary btn-sm modalData" data-id="' + item.id +
                '">PDF</button>' +
                '</td>' +
                '</tr>';
              $('#dataTableCaseDate tbody').append(row);
            });

            // Generate and display pagination links
            var paginationLinksCaseDate = '';
            $.each(response.links, function(index, link) {
              if (link.url === null) {
                paginationLinksCaseDate += '<li class="page-item disabled"><span class="page-link">' +
                  link
                  .label + '</span></li>';
              } else {
                paginationLinksCaseDate +=
                  '<li class="page-item' + (link.active ? ' active' : '') +
                  '"><a class="page-link" href="' + link.url + '">' +
                  link.label + '</a></li>';
              }
            });
            $('#paginationLinksCaseDate').html(paginationLinksCaseDate);

            $('.page-link').click(function(event) {
              event.preventDefault();
              if ($(this).attr('href') !== undefined) {
                fetchJudgements($(this).attr('href'));
              }
            });

            // Attach click event handler for modalData buttons
            $('.modalData').click(function() {
              var id = $(this).data('id');

              // Perform AJAX request to fetch data for the specific ID
              $.ajax({
                url: "{{ route('judgements.show', '') }}/" + id,
                type: 'GET',
                dataType: 'json',
                success: function(detailData) {
                  var modalTitle = "Case Details"; // Set modal title
                  var modalFooter = "Click away to close this.";
                  var modalBody = '<div class="container">';
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Basic Information</h5>';
                  modalBody += '<p><strong>Reg No:</strong> ' + detailData.regno + '</p>';
                  modalBody += '<p><strong>Year:</strong> ' + detailData.year + '</p>';
                  modalBody += '<p><strong>Department:</strong> ' + detailData.deptt + '</p>';
                  modalBody += '<p><strong>Associated:</strong> ' + detailData.associated + '</p>';
                  modalBody += '<p><strong>DOR:</strong> ' + detailData.dor + '</p>';
                  // Add more basic information fields as needed
                  modalBody += '</div>';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Advocates</h5>';
                  modalBody += '<p><strong>Petitioner Advocate:</strong> ' + detailData.padvocate +
                    '</p>';
                  modalBody += '<p><strong>Respondent Advocate:</strong> ' + detailData.radvocate +
                    '</p>';
                  // Add more advocate-related fields as needed
                  modalBody += '</div>';
                  modalBody += '</div>'; // End of row
                  // Add more sections as needed
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-12">';
                  modalBody += '<p><strong>Subject:</strong> ' + detailData.subject + '</p>';
                  modalBody += '</div>';
                  modalBody += '</div>';
                  // Second row section
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Case Information</h5>';
                  modalBody += '<p><strong>Petitioner:</strong> ' + detailData.petitioner + '</p>';
                  modalBody += '<p><strong>Respondent:</strong> ' + detailData.associated + '</p>';
                  // Add more basic information fields as needed
                  modalBody += '</div>';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Court Information</h5>';
                  modalBody += '<p><strong>Court No:</strong> ' + detailData.court_no + '</p>';
                  modalBody += '<p><strong>Remarks:</strong> ' + detailData.remarks + '</p>';
                  // Add more advocate-related fields as needed
                  modalBody += '</div>';
                  modalBody += '</div>'; // End of row
                  // Add more sections as needed
                  modalBody += '</div>'; // End of container

                  // Populate modal with data
                  $('#myModalLabel').text(modalTitle);
                  $('#modal_footer').text(modalFooter);
                  $('.modal-body').html(modalBody);

                  // Open modal
                  $('#myModal').modal('show');

                  // Close Modal
                  $('#closeModalButton').click(function() {
                    $('#myModal').modal('hide');
                  });
                },
                error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                }
              });
            });
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    }

    $('#filterButtonCaseDate').click(function() {
      var casedate = $('#casedate').val();

      function formatInputDate(dateString) {
        var date = dateString.split('-');
        return date[2] + '-' + date[1] + '-' + date[0];
      }
      casedate = formatInputDate(casedate);

      var url = "/judgements/search/casedate/" + casedate;
      alert(url);

      fetchJudgements(url);
    });
  });
</script>

{{-- Subject Search --}}
<script>
  $(document).ready(function() {

    function fetchJudgements(url) {
      $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          $('#dataTableSubject tbody').empty();
          $('#dataTableSubject thead').empty();

          if (response.data.length === 0) {
            var
              noDataRow =
              '<tr><td colspan="5" class="text-center text-primary fw-bold">No data available for date.</td></tr>';
            $('#dataTableSubject tbody').append(noDataRow);
          } else {
            var head = '<tr class="text-center">' +
              '<th class="header-cell">S No</th>' +
              '<th class="header-cell">Reg No</th>' +
              '<th class="header-cell">Subject</th>' +
              '<th class="header-cell">Action</th>' +
              '</tr>';
            $('#dataTableSubject thead').append(head);

            $.each(response.data, function(index, item) {
              var row = '<tr>' +
                '<td class="index-cell">' + (response.from + index) + '</td>' +
                '<td class="regno-cell">' + item.regno + '</td>' +
                '<td class="padvocate-cell">' + (item.subject.length > 30 ? item.subject.substring(
                  0, 30) + '...' : item.subject) + '</td>' +
                '<td>' +
                '<button class="btn btn-primary btn-sm modalData" data-id="' + item.id +
                '">View</button>' +
                '<button class="btn btn-secondary btn-sm modalData" data-id="' + item.id +
                '">PDF</button>' +
                '</td>' +
                '</tr>';
              $('#dataTableSubject tbody').append(row);
            });

            // Generate and display pagination links
            var paginationLinksSubject = '';
            $.each(response.links, function(index, link) {
              if (link.url === null) {
                paginationLinksSubject += '<li class="page-item disabled"><span class="page-link">' +
                  link
                  .label + '</span></li>';
              } else {
                paginationLinksSubject +=
                  '<li class="page-item' + (link.active ? ' active' : '') +
                  '"><a class="page-link" href="' + link.url + '">' +
                  link.label + '</a></li>';
              }
            });
            $('#paginationLinksSubject').html(paginationLinksSubject);

            $('.page-link').click(function(event) {
              event.preventDefault();
              if ($(this).attr('href') !== undefined) {
                fetchJudgements($(this).attr('href'));
              }
            });

            // Attach click event handler for modalData buttons
            $('.modalData').click(function() {
              var id = $(this).data('id');

              // Perform AJAX request to fetch data for the specific ID
              $.ajax({
                url: "{{ route('judgements.show', '') }}/" + id,
                type: 'GET',
                dataType: 'json',
                success: function(detailData) {
                  var modalTitle = "Case Details"; // Set modal title
                  var modalFooter = "Click away to close this.";
                  var modalBody = '<div class="container">';
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Basic Information</h5>';
                  modalBody += '<p><strong>Reg No:</strong> ' + detailData.regno + '</p>';
                  modalBody += '<p><strong>Year:</strong> ' + detailData.year + '</p>';
                  modalBody += '<p><strong>Department:</strong> ' + detailData.deptt + '</p>';
                  modalBody += '<p><strong>Associated:</strong> ' + detailData.associated + '</p>';
                  modalBody += '<p><strong>DOR:</strong> ' + detailData.dor + '</p>';
                  // Add more basic information fields as needed
                  modalBody += '</div>';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Advocates</h5>';
                  modalBody += '<p><strong>Petitioner Advocate:</strong> ' + detailData.padvocate +
                    '</p>';
                  modalBody += '<p><strong>Respondent Advocate:</strong> ' + detailData.radvocate +
                    '</p>';
                  // Add more advocate-related fields as needed
                  modalBody += '</div>';
                  modalBody += '</div>'; // End of row
                  // Add more sections as needed
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-12">';
                  modalBody += '<p><strong>Subject:</strong> ' + detailData.subject + '</p>';
                  modalBody += '</div>';
                  modalBody += '</div>';
                  // Second row section
                  modalBody += '<div class="row">';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Case Information</h5>';
                  modalBody += '<p><strong>Petitioner:</strong> ' + detailData.petitioner + '</p>';
                  modalBody += '<p><strong>Respondent:</strong> ' + detailData.associated + '</p>';
                  // Add more basic information fields as needed
                  modalBody += '</div>';
                  modalBody += '<div class="col-md-6">';
                  modalBody += '<h5>Court Information</h5>';
                  modalBody += '<p><strong>Court No:</strong> ' + detailData.court_no + '</p>';
                  modalBody += '<p><strong>Remarks:</strong> ' + detailData.remarks + '</p>';
                  // Add more advocate-related fields as needed
                  modalBody += '</div>';
                  modalBody += '</div>'; // End of row
                  // Add more sections as needed
                  modalBody += '</div>'; // End of container

                  // Populate modal with data
                  $('#myModalLabel').text(modalTitle);
                  $('#modal_footer').text(modalFooter);
                  $('.modal-body').html(modalBody);

                  // Open modal
                  $('#myModal').modal('show');

                  // Close Modal
                  $('#closeModalButton').click(function() {
                    $('#myModal').modal('hide');
                  });
                },
                error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                }
              });
            });
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    }

    $('#filterButtonSubject').click(function() {
      var subject = $('#subject').val();

      var url = "/judgements/search/subject/" + subject;
      alert(url);

      fetchJudgements(url);
    });
  });
</script>




@endsection
