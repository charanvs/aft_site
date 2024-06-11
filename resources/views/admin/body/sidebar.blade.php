<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div>
        <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
      </div>
      <div>
        <h4 class="logo-text">AFT PB</h4>
      </div>
      <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
      </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
      <li>
        <a href="javascript:;" class="has-arrow">
          <div class="parent-icon"><i class='bx bx-home-alt'></i>
          </div>
          <div class="menu-title">Dashboard</div>
        </a>
        <ul>
          <li> <a href="index.html"><i class='bx bx-radio-circle'></i>Default</a>
          </li>
          <li> <a href="index2.html"><i class='bx bx-radio-circle'></i>Alternate</a>
          </li>
          <li> <a href="index3.html"><i class='bx bx-radio-circle'></i>Graphical</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="javascript:;" class="has-arrow">
          <div class="parent-icon"><i class="bx bx-category"></i>
          </div>
          <div class="menu-title">Manage Teams</div>
        </a>
        <ul>
          <li> <a href="{{ route('all.team') }}"><i class='bx bx-radio-circle'></i>All Team</a>
          </li>
          <li> <a href="{{ route('add.team') }}"><i class='bx bx-radio-circle'></i>Add Team</a>
          </li>

        </ul>
      </li>
      <li>
        <a href="javascript:;" class="has-arrow">
          <div class="parent-icon"><i class="bx bx-category"></i>
          </div>
          <div class="menu-title">Manage Banner</div>
        </a>
        <ul>
          <li> <a href="{{ route('all.banner') }}"><i class='bx bx-radio-circle'></i>All Banner</a>
          </li>
          <li> <a href="{{ route('add.banner') }}"><i class='bx bx-radio-circle'></i>Add Banner</a>
          </li>

        </ul>
      </li>
      <li class="menu-label">UI Elements</li>
      <li>
        <a href="widgets.html">
          <div class="parent-icon"><i class='bx bx-cookie'></i>
          </div>
          <div class="menu-title">widgets</div>
        </a>
      </li>

    <!--end navigation-->
  </div>
