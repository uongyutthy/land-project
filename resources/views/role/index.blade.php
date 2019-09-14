@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('role.list')</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-right">
                            @can('create-role')
                                <a href="{{ route('roles.create') }}" class="btn btn-success">
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
