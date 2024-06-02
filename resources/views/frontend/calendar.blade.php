@extends('frontend.main_master')
@section('main')
@section('title')
  AFT-PB | Members
@endsection
@include('frontend.body.header')
<style>
    .calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 10px;
        text-align: center;
    }
    .calendar .day, .calendar .weekday {
        padding: 10px;
        border: 1px solid #ddd;
        cursor: pointer;
    }
    .calendar .weekday {
        font-weight: bold;
        background-color: #f1f1f1;
    }
    .calendar .empty {
        border: none;
    }
    .calendar .saturday, .calendar .sunday {
        color: white;
        background-color: #7a1921; /* Bootstrap 'danger' class color */
    }
    .calendar .pdf-day {
        color: whitesmoke;
        background-color: #347042; /* Bootstrap 'success' class color */
    }
    .calendar .holiday {
        color: white;
        background-color: #edb90d; /* Bootstrap 'warning' class color */
    }
    .month-container {
        margin-bottom: 20px;
    }
    .month-name {
        text-align: center;
        font-weight: bold;
        font-size: 1.5em;
        margin-bottom: 10px;
    }
    .row-cols-3 > .col {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
<div class="container">
    <div class="row row-cols-1 row-cols-md-3" id="calendar-container"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('frontend/assets/js/calendar.js') }}"></script>
@endsection