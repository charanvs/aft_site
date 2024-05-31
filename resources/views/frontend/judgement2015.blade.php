<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Data Tables | Upcube - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

        <!-- DataTables -->
        <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}"  rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <!-- <div id="layout-wrapper"> -->




            <!-- ========== Left Sidebar Start ========== -->

            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <!-- <div class="main-content"> -->

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->

                        <!-- end page title -->



                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Buttons Example</h4>
                                        <p class="card-title-desc">The Buttons extension for DataTables
                                            provides a common set of options, API methods and styling to display
                                            buttons on a page that will interact with a DataTable. The core library
                                            provides the based framework upon which plug-ins can built.
                                        </p>

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Case Type</th>
                                                <th>File No</th>
                                                <th>Year</th>
                                                <th>Petitioner</th>
                                                <th>MOD</th>
                                                <th>DOD</th>
                                                <th>Adv.</th>
                                                <th>R Adv.</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                                @php($i = 1)
                                                @foreach($judgements2015 as $key => $item)
                                            <tr>
                                                <td>{{ $i++}}</td>
                                                <td>{{ $item->case_type }}</td>
                                                <td>{{ $item->file_no }}</td>
                                                <td>{{ $item->year }}</td>
                                                <td>{{ $item->petitioner }}</td>
                                                <td>{{ $item->mod }}</td>
                                                <td>{{ $item->dod }}</td>
                                                <td>{{ $item->padvocate }}</td>
                                                <td>{{ $item->radvocate }}</td>
                                            </tr>
                                           @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                        <!-- end row-->









                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->



            <!-- </div> -->
            <!-- end main content-->

        <!-- </div> -->
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->

        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/pdfmake/build/pdfmake.min.js') }}assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

        <script src="{{ asset('backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>

        <script src="{{ asset('backend/assets/js/app.js') }}"></script>

    </body>
</html>
