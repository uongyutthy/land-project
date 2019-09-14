@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header wrap">
          <h5 class="card-title">@lang('user.users')</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col text-right">
              @can('create-user')
              <a href="{{ route('users.create') }}" class="btn btn-success">
                <i class="fa fa-plus-circle"></i>
                @lang('global.create')
              </a>
              @endcan
            </div>
          </div>
          <br>
          {!! $dataTable->table() !!}
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  {!! $dataTable->scripts() !!}
@endpush
