<!-- Page Header Start-->
<div class="page-main-header">
    <div class="main-header-right row m-0">
      <div class="main-header-left">
        <div class="logo-wrapper"><a href="{{route('dashboard')}}">
          
        <h6>
               @php 
                $proName = App\Models\Profile::first();
              @endphp
              @php 
                $content = App\Models\Content::first();
              @endphp
              {{ $proName->name }}
              
          </h6>
        </a></div>
        <div class="dark-logo-wrapper "><a href="{{route('dashboard')}}"><h4>{{ $proName->name }}</h4></a></div>
        <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
      </div>
      <div class="left-menu-header col">
        <ul>
          <li>

          </li>
        </ul>
      </div>
      <div class="nav-right col pull-right right-menu p-0">
        <ul class="nav-menus">
          <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
          <li>
            <div class="mode"><i class="fa fa-moon-o"></i></div>
          </li>
          <li class="onhover-dropdown">
            <div class="bookmark-box">
              @if (!is_null($content->about_image))
                <img class="img-30 rounded-circle"  src="{{ asset('uploads/'. $content->about_image) }}" alt="P">
              @else
              <img class="img-30 rounded-circle"  src="" alt="P">
              @endif
            </div>
            <div class="bookmark-dropdown onhover-show-div">
              {{-- <div class="form-group mb-0">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
                  <input class="form-control" type="text" placeholder="Search for bookmark...">
                </div>
              </div>
              <ul class="m-t-5">
                <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="inbox"></i>Email<span class="pull-right"><i data-feather="star"></i></span></li>
                <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="message-square"></i>Chat<span class="pull-right"><i data-feather="star"></i></span></li>
                <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="command"></i>Feather Icon<span class="pull-right"><i data-feather="star"></i></span></li>
                <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="airplay"></i>Widgets<span class="pull-right"><i data-feather="star">   </i></span></li>
              </ul> --}}
              <div class="sidebar-user text-center"><a class="setting-primary" href="{{route('manage.admin')}}"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{ asset('uploads/'. $content->about_image) }}" alt="Abt">
                <div class="badge-bottom">
                {{-- <span class="badge badge-primary">New</span> --}}
                </div>
                <a href="#">
                <h6 class="mt-3 f-14 f-w-600">{{ $proName->name }} {{ $proName->lastname }}</h6>
                </a>
              <p class="mb-0 font-roboto">Super Admin</p>
              <!-- {{-- <ul>
                <li><span><span class="counter">19.8</span>k</span>
                  <p>Follow</p>
                </li>
                <li><span>2 year</span>
                  <p>Experince</p>
                </li>
                <li><span><span class="counter">95.2</span>k</span>
                  <p>Follower </p>
                </li>
              </ul> --}} -->
            </div>
            </div>
          </li>
          <li class="onhover-dropdown p-0">
            <button class="btn btn-primary-light" type="button">
                {{-- <a href="login_two.html"><i data-feather="log-out"></i>Log out</a> --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit();"><i data-feather="log-out"></i> Logout</a>
                </form>
            </button>
          </li>
        </ul>
      </div>
      <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
  </div>
  <!-- Page Header Ends                              -->
