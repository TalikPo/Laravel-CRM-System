
@extends('layouts.user_type.auth')

@section('content')
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">              
              <img src="{{ asset('storage/avatars/' . $foundUser->avatar) }}" class="w-100 border-radius-lg shadow-sm" alt="Avatar">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                {{ Auth::user()->name }} {{ Auth::user()->surname }}
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-6 col-xl-12">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Особиста інформація</h6>
                </div>
                <div class="col-md-4 text-end">
                  <a href="{{ url('edit_profile')}}">
                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              @if( Auth::user()->surname == 'Полянський')
              <p class="text-sm">
                Привіт, Я {{ Auth::user()->name }}. 
              </p>
              <p>
                Якщо ти не можеш вирішити, тоді відповідь - ні. Якщо дві однаково складні стежки, вибери ту, яка болючіша на короткий термін (уникання болю створює ілюзію рівності).
              </p>
              <hr class="horizontal gray-light my-4">
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Мобільний:</strong> &nbsp; (097) 882 54 90</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ Auth::user()->email }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Розташування:</strong> &nbsp; Тернопіль, Україна</li>
                <li class="list-group-item border-0 ps-0 pb-0">
                  <strong class="text-dark text-sm">Соціальні мережі:</strong> &nbsp;
                  <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="www.linkedin.com/in/vitalik-polyanskiy-a7883517a">
                    <i class="fab fa-linkedin fa-lg"></i>
                  </a>
                </li>
                <li class="list-group-item border-0 ps-0 pt-0">
                  <strong class="text-dark text-sm">Посилання на GitHub:</strong> &nbsp;
                  <a href="https://github.com/TalikPo">
                    <img src="../assets/img/qrcode_github.com.png" class="w-15" alt="GitHub QR code"/>
                  </a>
                </li>
              </ul>
              @else
              <p class="text-sm">
                Привіт, Я {{ Auth::user()->name }}. 
              </p>
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Мобільний:</strong> &nbsp;</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ Auth::user()->email }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Розташування:</strong> &nbsp; </li>
                <li class="list-group-item border-0 ps-0 pb-0">
                  <strong class="text-dark text-sm">Соціальні мережі:</strong> &nbsp;
                  <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="">
                    <i class="fab fa-linkedin fa-lg"></i>
                  </a>
                </li>
                <li class="list-group-item border-0 ps-0 pt-0">
                  <strong class="text-dark text-sm">Посилання на GitHub:</strong> &nbsp;
                  <a href="">
                    <img src="" class="w-15" alt="GitHub QR code"/>
                  </a>
                </li>
              </ul>              
              @endif
            </div>
          </div>
        </div>
      </div>
      @include('layouts.footers.auth.footer')
    </div>
  </div>

@endsection

