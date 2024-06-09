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
        cursor: pointer; /* Add cursor pointer to indicate clickable items */
    }
    .calendar .weekday {
        font-weight: bold;
        background-color: #E6E6FA;
    }
    .calendar .empty {
        border: none;
    }
    .calendar .saturday, .calendar .sunday {
        background-color: #E6E6FA; /* Bootstrap 'danger' class color */
    }
    .calendar .pdf-day {
        background-color: #40E0D0; /* Bootstrap 'success' class color */
    }
    .calendar .holiday {
        background-color: #FFD700; /* Bootstrap 'warning' class color */
    }
    .month-container {
        margin-bottom: 20px;
        border: 2px solid #ddd; /* Add border to month container */
        border-radius: 5px; /* Optional: Add border radius for rounded corners */
        padding: 10px; /* Optional: Add padding for better spacing */
    }
    .month-name {
        text-align: center;
        font-size: 1.5em;
        margin-bottom: 10px;
       background-color: #FFD700;
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