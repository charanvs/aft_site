@extends('frontend.main_master')
@section('main')
@section('title')
  AFT-PB | Case Management
@endsection
@include('frontend.body.header')
<style>
  /* Custom CSS for spacing between buttons */
  .btn-spacing {
    margin-right: 10px;
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
      <ul class="tabs d-flex flex-wrap">
        @foreach (['File Number', 'Party Name', 'Advocate Name', 'Case Type', 'Date', 'Subject'] as $tab)
          <li class="bg-secondary m-1">
            <a href="#" class="default-btn btn-bg-four border-radius-5 btn-spacing">
              <span class="text-white h6">{{ $tab }}</span>
            </a>
          </li>
        @endforeach
      </ul>

      <div class="tab_content current active pt-45">
        <div class="tabs_item current">
          <div class="reservation-tab-item">
            <div class="row">
              <div class="col-lg-4">
                <div class="side-bar-form">
                  <h3>Search By - File Number</h3>
                  <form method="get" action="{{ route('judgements.page') }}">
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
                          Search FileNo
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="reservation-widget-content">
                  <h2>Details of Cases - File No</h2>
                  <hr>
                  <table id="dataTableFile" class="table table-striped">
                    <thead>
                      <!-- Table Head where data will be displayed -->
                    </thead>
                    <tbody>
                      <!-- Table rows will be populated dynamically -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Other tabs content with similar structure -->

        @foreach (['Party Name', 'Advocate', 'Case Type', 'Case Date', 'Subject'] as $searchBy)
        <div class="tabs_item">
          <div class="reservation-tab-item">
            <div class="row">
              <div class="col-lg-4">
                <div class="side-bar-form">
                  <h3>Search By - {{ $searchBy }}</h3>
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
                      @if ($searchBy == 'Party Name')
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>{{ $searchBy }}</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="{{ $searchBy }}" id="partyname">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx bx-rename'></i>
                        </div>
                      </div>
                      @elseif ($searchBy == 'Advocate')
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>{{ $searchBy }} Name</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter {{ $searchBy }} Name" id="advocate">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx bx-user-pin'></i>
                        </div>
                      </div>
                      @elseif ($searchBy == 'Case Type')
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Select {{ $searchBy }}</label>
                          <select class="form-control" id="casetype">
                            <option value="1">OA</option>
                            <option value="2">TA</option>
                            <option value="4">CA</option>
                            <option value="3">AT</option>
                            <option value="7">MA</option>
                            <option value="5">RA</option>
                          </select>
                          <i class='bx bx-search-alt'></i>
                        </div>
                      </div>
                      @elseif ($searchBy == 'Case Date')
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>{{ $searchBy }}</label>
                          <div class="input-group">
                            <input type="date" class="form-control" placeholder="{{ $searchBy }}" id="casedate">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx bx-calendar'></i>
                        </div>
                      </div>
                      @elseif ($searchBy == 'Subject')
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>{{ $searchBy }}</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter {{ $searchBy }}" id="subject">
                            <span class="input-group-addon"></span>
                          </div>
                          <i class='bx bx-book-content'></i>
                        </div>
                      </div>
                      @endif

                      <div class="col-lg-12 col-md-12">
                        <button id="filterButton{{ str_replace(' ', '', $searchBy) }}" type="button" class="default-btn btn-bg-three border-radius-5">
                          Search {{ $searchBy }}
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="reservation-widget-content">
                  <h2>Cases - {{ $searchBy }}</h2>
                  <table id="dataTable{{ str_replace(' ', '', $searchBy) }}" class="table table-striped">
                    <thead>
                      <!-- Table Header from script will be displayed -->
                    </thead>
                    <tbody>
                      <!-- Table rows will be populated dynamically -->
                    </tbody>
                  </table>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination" id="paginationLinks{{ str_replace(' ', '', $searchBy) }}"></ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>

<!-- Modal HTML -->
<div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Case Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Modal Body Content -->
        <p>Modal body content goes here.</p>
      </div>

      <div class="modal-footer">
        <button id="printButton" class="btn btn-primary">Print</button>
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
<script>
    var casesSearchUrl = "{{ route('cases.search') }}";
</script>
<script src="{{ asset('frontend/assets/js/search_cases.js') }}"></script>

@endsection
