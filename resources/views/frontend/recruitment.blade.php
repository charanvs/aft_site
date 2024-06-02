@extends('frontend.main_master')
@section('main')
@section('title')
  AFT-PB | Vacancies
@endsection
@include('frontend.body.header')
<h6 class="mb-0 text-uppercase">Recruitment</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Title</th>
										<th>Description</th>
										<th>Start Date</th>
										<th>End Date</th>
										<th>File</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Tiger Nixon</td>
										<td>System Architect</td>
										<td>Edinburgh</td>
										<td>61</td>
										<td>2011/04/25</td>
									</tr>

							</table>
						</div>
					</div>
				</div>
@endsection