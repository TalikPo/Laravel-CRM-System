@extends('layouts.user_type.auth')

@section('content')

<div class="container">
    <div class="row">
        @foreach($all_groups as $group)
            <div class="col-sm-4 col-md-3 col-lg-2 mt-4">
                <a href="all_students/{{ $group->id }}">
                    <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                <i class="fas fa-users-cog opacity-10"></i>
                            </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                            <h6 class="text-center mb-0">{{ $group->name }}</h6>
                            <span class="text-xs">група</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection

