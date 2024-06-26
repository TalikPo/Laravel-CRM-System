@extends('layouts.user_type.auth')

@section('content')

  <div class="container-fluid py-4">
    <div class="row">

      <div class="col-4 col-xl-4 col-lg-4 col-md-4 mx-auto">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Групи</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Назва</th>
                    <th class="ext-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Дія</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($all_groups as $onegroup)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $onegroup->name }}</h6>
                          <p class="text-xs text-secondary mb-0"></p>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">
                      <form action="{{route('group.destroy', $onegroup->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete group">
                          Видалити
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
      
        <div class="col-4 col-xl-4 col-lg-4 col-md-4 mx-right">
          <div class="card z-index-0">
            <div class="card-body">
              <form action="{{url('group_management')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" name="group" placeholder="Група" aria-label="Group" aria-describedby="group-addon">
                  @error('role')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Додати групу</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection

