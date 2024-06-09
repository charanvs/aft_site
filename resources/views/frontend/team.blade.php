@extends('frontend.main_master')
@section('main')
@section('title')
  AFT-PB | Members
@endsection
@include('frontend.body.header')
<!-- Team Area Three -->
<div class="team-area-three pt-100 pb-70">
  <div class="container">
    <div class="section-title text-center">
      <span class="sp-color">Members</span>
      <h2>Members</h2>
    </div>

    <div class="team-slider-two owl-carousel owl-theme pt-45">
      @foreach ($data as $item)
        <div class="team-item">
          <a href="team.html">
            <img src="{{ asset($item->image) }}" alt="Images">
          </a>
          <div class="content">
            <h3><a href=""></a>{{ $item->name }}</h3>
            <span>{{ $item->salutation }}</span>
            <ul class="social-link">
              <li>
                <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
              </li>
              <li>
                <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
              </li>
              <li>
                <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
              </li>
              <li>
                <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
              </li>
            </ul>
          </div>
        </div>
      @endforeach
    </div>
  </div>

</div>
<!-- Team Area Three End -->
@endsection
