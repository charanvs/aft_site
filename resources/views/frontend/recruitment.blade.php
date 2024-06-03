@extends('frontend.main_master')
@section('main')
@section('title')
  AFT-PB | Vacancies
@endsection
@include('frontend.body.header')
<h6 class="mb-0 text-uppercase">Recruitment</h6>
<hr />
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
            <th>View</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
            <tr>
              <td style="width:20%">{{ $item->title }}</td>
              <td style="width:30%">{{ $item->description }}</td>
              <td>{{ $item->start_date }}</td>
              <td>{{ $item->end_date }}</td>
              <td>{{ $item->file }}</td>

            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

