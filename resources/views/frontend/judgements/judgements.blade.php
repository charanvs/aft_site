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
                          <i class='bx bx-rename'></i>
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
                          <i class='bx bx-search-alt'></i>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12">
                        <button id="filterButtonCasetype" type="button"
                          class="default-btn btn-bg-three border-radius-5">
                          Search Case Type
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
<div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Modal Body Content -->
        <p>Modal body content goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal HTML for PDF display -->
<div class="modal fade" id="myModalPDF" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Modal Body Content -->

          <p>Modal body content goes here.</p>
        </div>
        <div class="modal-footer" id="modal_footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('frontend/assets/js/mytabs.js') }}"></script>


@endsection
