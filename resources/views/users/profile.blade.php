@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-sm-12">
      <form action="{{ route('profile.update') }}" method="post" class="form-horizontal user-form" id="profile-form">
        <input type="hidden" name="_method" value="put">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">@lang('user.profile')</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-auto text-center">
                <img src="{{ asset($user->profile_picture ? 'uploads/'.$user->profile_picture : 'img/avatars/placeholder.png') }}" alt="profile photo" class="img-avatar" id="profile-picture">
                <div class="custom-input-file">
                  <input type="file" name="profile_picture_file" id="profile-picture-input"/>
                  <button class="btn btn-light" id="choose-photo">@lang('user.choose_photo')</button>
                  <button class="btn btn-danger" id="remove-photo">@lang('user.remove')</button>
                </div>
              </div>
              <div class="col">
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="name">@lang('user.full_name') *</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="icon-user"></i>
                          </div>
                        </div>
                        <input type="text" id="name" class="form-control" name="name" value="{{ $user->name }}" placeholder="@lang('user.full_name')" required autofocus autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="username">@lang('user.email')</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            @
                          </div>
                        </div>
                        <input type="text" id="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="@lang('user.email')" autocomplete="off">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="address">@lang('user.address')</label>
                      <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ $user->address }}</textarea>
                    </div>
                  </div>
                </div>
                <br>
                <h5>@lang('user.change_password')</h5>
                <hr>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="new-password">@lang('user.new_password') *</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="icon-lock"></i>
                          </div>
                        </div>
                        <input type="password" id="new-password" class="form-control" name="new_password" placeholder="@lang('user.new_password')" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="confirm_password">@lang('user.confirm_password') *</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="icon-lock"></i>
                          </div>
                        </div>
                        <input type="password" id="password-confirmation" class="form-control" name="new_password_confirmation" placeholder="@lang('user.confirm_password')" autocomplete="off">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">@lang('global.save')</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('css')
  <link rel="stylesheet" href="{{ asset('css/pages/user.css') }}">
@endpush

@push('scripts')
  <script>
    const AVATAR_PLACEHOLDER = '{{ asset('img/avatars/placeholder.png') }}';
  </script>
  <script src="{{ asset('js/pages/user.js') }}"></script>
  <script src="{{ asset('js/pages/profile.js') }}"></script>
@endpush