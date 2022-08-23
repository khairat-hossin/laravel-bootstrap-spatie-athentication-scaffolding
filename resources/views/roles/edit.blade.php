@extends('layouts.app')
@section('slug') Edit Role @endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <form action="{{ route('roles.update', $role->id) }}" role="form" method="POST">
            <div class="modal-body">
        
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label">Role Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $role->name }}">
                </div>
                <div class="mb-3">
                    <label for="permissions" class="form-label">Select Permission</label>
                    @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input class="form-check-input" name="permissions[]" type="checkbox" {{ (in_array($permission->id, $rolePerm))? "checked" : "" }} value="{{ $permission->id }}" id="check_permissions">
                            <label class="form-check-label" for="check_permissions">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
        
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection