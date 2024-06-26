@extends('layouts.user_type.auth')

@section('content')
<div class="col-4 col-xl-12">
    <div class="card-body p-0">
        <form action="edit_profile" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="user.phone" class="form-control-label">{{ __('Оновити аватар') }}</label>
                        <input type="file" name="avatar" id="avatar" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 mt-0">
                    <div class="form-group">
                        <label for="user.phone" class="form-control-label">{{ __('Мобільний') }}</label>
                        <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                            <input class="form-control" type="tel" placeholder="(011) 111 11 11" id="number" name="phone" value="{{ auth()->user()->phone }}">
                                @error('phone')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-0">
                    <div class="form-group">
                        <label for="user.location" class="form-control-label">{{ __('Розташування') }}</label>
                        <div class="@error('user.location') border border-danger rounded-3 @enderror">
                            <input class="form-control" type="text" placeholder="місце знаходження" id="location" name="location" value="{{ auth()->user()->location }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="about">{{ 'Про мене' }}</label>
                <div class="@error('user.about')border border-danger rounded-3 @enderror">
                    <textarea class="form-control" id="about" rows="3" placeholder="Скажи щось про себе" name="about_me">{{ auth()->user()->about_me }}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Зберегти зміни' }}</button>
            </div>

        </form>
    </div>
</div>       
@endsection