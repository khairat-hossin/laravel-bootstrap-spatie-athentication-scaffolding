@extends('layouts.app')

@section('slug')
    Role Management
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-center my-3">
            <div class="col-sm-6">
                <h2>Role Management</h2>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRole">
                    Create Role
                </button>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Role Name</th>
                <th style="width: 150px">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-info"
                        title="Show"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm"
                        title="Edit"><i class="fa fa-pencil"></i> </a>
                    <form action="{{ route('roles.destroy', $role->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this item?');"><i
                                class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $roles->render() !!}


    <div class="modal fade" id="createRole" tabindex="-1" aria-labelledby="createRoleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="createRoleLabel">Create Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('roles.store') }}" role="form" method="POST">
                    <div class="modal-body">

                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Role Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="permissions" class="form-label">Select Permission</label>
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $permission->id }}" id="check_permissions">
                                    <label class="form-check-label" for="check_permissions">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
