
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ url('/') }}">
        <span class="ms-5 font-weight-bold">Вітаю, {{Auth::user()->name}}</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">

  <ul class="navbar-nav">

  @if (Auth::user()->role->name == 'teacher')

    <li class="nav-item">
      <a class="nav-link {{ (Request::is('all_students') ? 'active' : '') }}" href="{{ url('all_students') }}">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i style="font-size: 1rem;" class="fas fa-lg fa-users ps-2 pe-2 text-center {{ (Request::is('user-management') ? 'text-white' : 'text-dark') }}" aria-hidden="true"></i>
        </div>
        <span class="nav-link-text ms-1">Всі студенти</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ (Request::is('all_groups') ? 'active' : '') }}" href="{{ url('all_groups') }}">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i style="font-size: 1rem;" class="fas fa-lg fa-sitemap ps-2 pe-2 text-center {{ (Request::is('user-management') ? 'text-white' : 'text-dark') }}" aria-hidden="true"></i>
        </div>
        <span class="nav-link-text ms-1">Групи</span>
      </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (Request::is('schedule') ? 'active' : '') }}" href="{{ url('schedule') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
          <i style="font-size: 1rem;" class="fas fa-lg fa-calendar-alt ps-2 pe-2 text-center {{ (Request::is('user-management') ? 'text-white' : 'text-dark') }}" aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Розклад</span>
        </a>
      </li>
      
      @endif

      @if(Auth::user()->role->name == 'admin')

      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('user-management') ? 'active' : '') }}" href="{{ url('user-management') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas fa-lg fa-users ps-2 pe-2 text-center {{ (Request::is('user-management') ? 'text-white' : 'text-dark') }}" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Всі користувачі</span>
        </a>
      </li>

      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('schedule_management') ? 'active' : '') }}" href="{{ url('schedule_management') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i style="font-size: 1rem;" class="fas fa-lg fa-calendar-alt ps-2 pe-2 text-center text-dark {{ (Request::is('schedule') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Розклад</span>
        </a>
      </li>

      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('subject_management') ? 'active' : '') }}" href="{{ url('subject_management') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i style="font-size: 1rem;" class="fas fa-lg fa-book ps-2 pe-2 text-center text-dark {{ (Request::is('subject') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Предмети</span>
        </a>
      </li>

      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('group_management') ? 'active' : '') }}" href="{{ url('group_management') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i style="font-size: 1rem;" class="fas fa-lg fa-sitemap ps-2 pe-2 text-center text-dark {{ (Request::is('group') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Групи</span>
        </a>
      </li>

      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('role_management') ? 'active' : '') }}" href="{{ url('role_management') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i style="font-size: 1rem;" class="fas fa-lg fa-user-tag ps-2 pe-2 text-center text-dark {{ (Request::is('role') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Ролі</span>
        </a>
      </li>

      @endif

      @if(Auth::user()->role->name == 'student')

      <li class="nav-item">
        <a class="nav-link {{ (Request::is('schedule') ? 'active' : '') }}" href="{{ url('schedule') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
          <i style="font-size: 1rem;" class="fas fa-lg fa-calendar-alt ps-2 pe-2 text-center text-dark {{ (Request::is('role') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Розклад</span>
        </a>
      </li>      
     
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('profile') ? 'active' : '') }}" href="{{ url('profile') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
          <i style="font-size: 1rem;" class="fas fa-lg fa-user-circle ps-2 pe-2 text-center text-dark {{ (Request::is('role') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Профіль</span>
        </a>
      </li>      
      @endif
      
    </ul>
    

</aside>
