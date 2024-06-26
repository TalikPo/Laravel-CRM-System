@extends('layouts.user_type.auth')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Всі користувачі</h5>
                        </div>
                        <a href="{{'add_new_user'}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Нового користувача</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Фото
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Прізвище
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ім'я
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Пошта
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Роль
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Група
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Дата створення
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Дія
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allusers as $oneuser)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $oneuser->id }}</p>
                                    </td>
                                    <td>
                                        @if ($oneuser->avatar)
                                        <div>
                                            <img src="{{ asset('storage/avatars/' . $oneuser->avatar) }}" class="avatar avatar-sm me-3" alt="Avatar">
                                        </div>
                                        @else
                                        <div>
                                            <i style="font-size: 1rem;" class="fas fa-lg fa-user-secret ps-2 pe-2 text-center text-dark {{ (Request::is('role') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $oneuser->surname }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $oneuser->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $oneuser->email }}</p>
                                    </td>
                                    <td class="text-center">
                                        @if ($oneuser->role_id)
                                            <p class="text-xs font-weight-bold mb-0">{{ $oneuser->role->name }}</p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($oneuser->group_id)
                                            <p class="text-xs font-weight-bold mb-0">{{ $oneuser->group->name }}</p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $oneuser->created_at }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('edit_user', ['user_id' => $oneuser->id])}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <form action="{{ route('user.destroy', $oneuser->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
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
    </div>
 
@endsection