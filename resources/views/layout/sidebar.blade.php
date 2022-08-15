<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ url('assets/images/faces/face8.jpg') }}" alt="profile image">
          </div>
          
          <div class="text-wrapper">
            <p class="profile-name">{{Auth::user()->name}}</p>
            <div class="dropdown" data-display="static">
              <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <small class="designation text-muted">{{Auth::user()->role}}</small>
                <span class="status-indicator online"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="UsersettingsDropdown">
                <a class="dropdown-item p-0">
                  <div class="d-flex border-bottom">
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                      <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item mt-2"> Manage Accounts </a>
                <a class="dropdown-item"> Change Password </a>
                <a class="dropdown-item"> Check Inbox </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </li>
    @if("Member" == Auth::user()->role )
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/dashboard/member') }}">
        <i class="menu-icon mdi mdi-account"></i>
        <span class="menu-title">Member Dashboard</span>
      </a>
    </li>
    @endif

    @if("Admin" == Auth::user()->role )
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/dashboard/society-admin') }}">
        <i class="menu-icon mdi mdi-account-star"></i>
        <span class="menu-title">Society Admin Dashboard</span>
      </a>
    </li>
    @endif
    
    @if("Admin" == Auth::user()->role ||  "Member" == Auth::user()->role)
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/dashboard/visitor') }}">
        <i class="menu-icon mdi mdi-account-multiple"></i>
        <span class="menu-title">Visitor Dashboard</span>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/lists/visitor-list') }}">
        <i class="menu-icon mdi mdi-clipboard-text-multiple-outline"></i>
        <span class="menu-title">Visitor List</span>
      </a>
    </li>
    @endif

    @if("Admin" == Auth::user()->role )
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/lists/member-list') }}">
        <i class="menu-icon mdi mdi-clipboard-text-outline"></i>
        <span class="menu-title">Member List</span>
      </a>
    </li>
    @endif
    
    @if("Admin" == Auth::user()->role ||  "Member" == Auth::user()->role)
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/forms/visitor-register') }}">
        <i class="menu-icon mdi mdi-account-plus"></i>
        <span class="menu-title">Add Visitor</span>
      </a>
    </li>
    @endif


    @if("Admin" == Auth::user()->role )
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/forms/member-approve') }}">
        <i class="menu-icon mdi mdi-account-check"></i>
        <span class="menu-title">Approve Member</span>
      </a>
    </li>
    @endif

    @if("Watchman" == Auth::user()->role )
    <li class="nav-item ">
      <a class="nav-link" href="{{ url('/entry-dashboard/entry') }}">
        <i class="menu-icon mdi mdi-account-check"></i>
        <span class="menu-title">Entry Dashboard</span>
      </a>
    </li>
    
    @endif
    

  </ul>
</nav>