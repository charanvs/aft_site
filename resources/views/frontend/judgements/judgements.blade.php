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
                          <label class="h5">Select Bench</label>
                          <select class="form-control">
                            <option class="h6">Principal Bench</option>
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
                          <i class='bx file-search'></i>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="h5">Year</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Year of File No" id="year">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx file-search'></i>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12">
                        <button id="filterButton" type="button" class="default-btn btn-bg-three border-radius-5">
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
                  <table id="dataTable" class="table">
                    <!-- Table headers -->
                    <thead>
                      <tr>
                        <th>S No</th>
                        <th>Reg No</th>
                        <th>Year</th>
                        <th>Petioner</th>
                        <th>Action</th>
                        <!-- Add more headers if needed -->
                      </tr>
                    </thead>
                    <!-- Table body where data will be displayed -->
                    <tbody>
                      <!-- Table rows will be populated dynamically -->
                    </tbody>

                  </table>
                  <hr class="fw-bold">
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
                  <h3>Search By </h3>
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
                          <label>File No</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="File No" id="fileno">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx file-search'></i>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12">
                        <button id="filterButton" type="button" class="default-btn btn-bg-three border-radius-5">
                          Search
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="reservation-widget-content">
                  <h2>Details of Judgements</h2>
                  <table id="dataTable" class="table">
                    <!-- Table headers -->
                    <thead>
                      <tr>
                        <th>S No</th>
                        <th>Reg No</th>
                        <th>Petitioner</th>
                        <th>Action</th>
                        <!-- Add more headers if needed -->
                      </tr>
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
                  <h3>Search By </h3>
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
                          <label>File No</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="File No" id="fileno">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx file-search'></i>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12">
                        <button id="filterButton" type="button" class="default-btn btn-bg-three border-radius-5">
                          Search
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="reservation-widget-content">
                  <h2>Details of Judgements</h2>
                  <table id="dataTable" class="table">
                    <!-- Table headers -->
                    <thead>
                      <tr>
                        <th>S No</th>
                        <th>File No</th>
                        <th>Action</th>
                        <!-- Add more headers if needed -->
                      </tr>
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
                  <h3>Search By </h3>
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
                          <label>File No</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="File No" id="fileno">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx file-search'></i>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12">
                        <button id="filterButton" type="button" class="default-btn btn-bg-three border-radius-5">
                          Search
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="reservation-widget-content">
                  <h2>Details of Judgements</h2>
                  <table id="dataTable" class="table">
                    <!-- Table headers -->
                    <thead>
                      <tr>
                        <th>S No</th>
                        <th>File No</th>
                        <th>Action</th>
                        <!-- Add more headers if needed -->
                      </tr>
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
                  <h3>Search By </h3>
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
                          <label>File No</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="File No" id="fileno">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx file-search'></i>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12">
                        <button id="filterButton" type="button" class="default-btn btn-bg-three border-radius-5">
                          Search
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="reservation-widget-content">
                  <h2>Details of Judgements</h2>
                  <table id="dataTable" class="table">
                    <!-- Table headers -->
                    <thead>
                      <tr>
                        <th>S No</th>
                        <th>File No</th>
                        <th>Action</th>
                        <!-- Add more headers if needed -->
                      </tr>
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
                  <h3>Search By </h3>
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
                          <label>File No</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="File No" id="fileno">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx file-search'></i>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12">
                        <button id="filterButton" type="button" class="default-btn btn-bg-three border-radius-5">
                          Search
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="reservation-widget-content">
                  <h2>Details of Judgements</h2>
                  <table id="dataTable" class="table table-striped">
                    <!-- Table headers -->
                    <thead>
                      <tr>
                        <th>S No</th>
                        <th>Reg No</th>
                        <th>Petitioner</th>
                        <th>Action</th>
                        <!-- Add more headers if needed -->
                      </tr>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Modal Body Content -->
        <p>Modal body content goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Additional buttons if needed -->
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    $('#filterButton').click(function() {
      var fileno = $('#fileno').val();
      var year = $('#year').val();

      $.ajax({
        url: "{{ route('judgements.fileno') }}",
        type: 'GET',
        data: {
          fileno,
          year,
        },
        dataType: 'json',
        success: function(data) {
          $('#dataTable tbody').empty();

          if (data.length === 0) {
            var noDataRow =
              '<tr><td colspan="4" class="text-center h6">No data available for given search.</td></tr>';
            $('#dataTable tbody').append(noDataRow);
          } else {
            $.each(data, function(index, item) {
              var row = '<tr>' +
                '<td class="h6">' + (index + 1) + '</td>' +
                '<td>' + item.regno + '</td>' +
                '<td>' + item.year + '</td>' +
                '<td>' + item.petitioner + '</td>' +
                '<td><button class="default-btn btn-bg-one modalData" data-id="' + item.id +
                '">View</button></td>' +
                '<td><button class="default-btn btn-bg-two modalData" data-id="' + item.id +
                '">PDF</button></td>' +
                '</tr>';
              $('#dataTable tbody').append(row);
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
                  var modalTitle = "Judgement Details"; // Set modal title
                  var modalBody = "<div class='row'>" +
                    "<div class='col-md-12'><h5>Reg No:</h5><h6>" + detailData.regno +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Year:</h5><h6> " + detailData.year +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Associated:</h5><h6> " + detailData
                    .associated +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>DOR:</h5><h6> " + detailData
                    .dor +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Department:</h5><h6> " + detailData
                    .deptt +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Subject:</h5><h6> " + detailData
                    .subject +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Petitioner:</h5><h6> " + detailData
                    .petitioner + "</h6></div>" +
                    "<div class='col-md-12'><h5>Respondent:</h5><h6> " + detailData
                    .respondent +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Petioner Advocate:</h5><h6> " + detailData
                    .padvocate +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Respondent Advocate:</h5><h6> " + detailData
                    .radvocate +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Corum:</h5><h6> " + detailData.corum +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>GNO:</h5><h6> " + detailData.gno +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Appeal:</h5><h6> " + detailData.appeal +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>JRO:</h5><h6> " + detailData.jro +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Court No:</h5><h6> " + detailData.court_no +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>DOD:</h5><h6> " + detailData.dod +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Mod:</h5><h6> " + detailData.mod +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Remarks:</h5><h6> " + detailData.remarks +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>HeadNotes:</h5><h6> " + detailData.headnotes +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Citation:</h5><h6> " + detailData.citation +
                    "</h6></div>" +
                    "<div class='col-md-12'><h5>Location:</h5><h6> " + detailData.location +
                    "</h6></div>" +

                    "</div>"; // Adjust fields according to your data structure

                  // Populate modal with data
                  $('#myModalLabel').text(modalTitle);
                  $('.modal-body').html(modalBody);

                  // Open modal
                  $('#myModal').modal('show');
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

@endsection
