@extends('layouts.user_type.auth')

@section('content')

  <section class="min-vh-100 mb-8">
    <div class="container">
      <div class="row mt-lg-0 mt-md-0 mt-0">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-body">

              <form action="{{ isset($userToEdit) ? route('user.update', $userToEdit->id) : route('user.store') }}" method="POST">
                @csrf
                @if(isset($userToEdit))
                  @method('PUT')
                @endif
                <div class="mb-3">
                  <input type="text" class="form-control" name="surname" placeholder="Surname" aria-label="Surname" aria-describedby="surname-addon" value="{{ isset($userToEdit) ? $userToEdit->surname : old('name') }}">
                  @error('name')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Name" aria-describedby="name-addon" value="{{ isset($userToEdit) ? $userToEdit->name : old('name') }}">
                  @error('name')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon" value="{{ isset($userToEdit) ? $userToEdit->email : old('name')}}">
                  @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon" value="{{ isset($userToEdit) ? $userToEdit->password : old('name')}}">
                  @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <select name="role_id" placeholder="Role" aria-label="Role" aria-describedby="role-addon" style="width: 100%; height: 2.5rem; border-radius: 0.5rem;">
                    <option>{{'Оберіть роль'}}</option>  
                    @foreach ($allroles as $role)
                      <option value="{{ $role->id }}" {{isset($userToEdit) && $userToEdit->role_id == $role->id ? 'selected' : ''}}>{{ $role->name }}</option>
                    @endforeach
                  </select>  
                  @error('role')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <select name="group_id" placeholder="Group" aria-label="Group" aria-describedby="group-addon" style="width: 100%; height: 2.5rem; border-radius: 0.5rem;">
                    <option value="">{{'Оберіть групу'}}</option>  
                    @foreach ($allgroups as $group)
                      <option value="{{ $group->id }}" {{isset($userToEdit) && $userToEdit->group_id == $group->id ? 'selected' : ''}}>{{ $group->name }}</option>
                    @endforeach
                  </select>  
                  @error('group')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">{{ isset($userToEdit) ? 'Оновити користувача' : 'Додати користувача' }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

