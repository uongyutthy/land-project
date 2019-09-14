@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <form class="form-horizontal" action="{{ route('roles.update', $role->id) }}" method="post" id="role-form">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="id" value="{{ $role->id }}">
                <div class="card">
                    <div class="card-header">
                        <b>@lang('role.edit_role')</b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name" class="control-label">@lang('role.name') *</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}" required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="description" class="control-label">@lang('role.description')</label>
                                    <input type="text" class="form-control" name="description" id="description" value="{{ $role->description }}"/>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h5>@lang('role.assign_permissions')</h5>
                        <br>
                        @foreach($permissionGroups as $permissionGroup)
                            <div class="row pb-3">
                                <div class="col">
                                    <b>{{ $permissionGroup->name }}</b>
                                    <hr class="mt-1">
                                    <div class="row">
                                        @foreach($permissionGroup->permissions as $permission)
                                            <div class="col-sm-3">
                                                <label class="control-label">
                                                    <input
                                                        type="checkbox"
                                                        name="permissions[]"
                                                        value="{{ $permission->id }}"
                                                        {{ in_array($permission->id, $assignedPermissions) ? 'checked' : '' }}
                                                    />
                                                    {{ $permission->description }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer text-right">
                        @can('edit-role')
                        <button class="btn btn-primary" type="submit">@lang('global.save')</button>
                        @endcan
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary">@lang('global.back')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/role.js') }}"></script>
@endpush
