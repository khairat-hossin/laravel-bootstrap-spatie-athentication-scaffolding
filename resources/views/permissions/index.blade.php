@extends('layouts.app')
@section('slug')
    Permissions
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-center my-3">
            <div class="col-sm-6">
                <h2>Permission Management</h2>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPermission">
                    Create Permission
                </button>
            </div>
        </div>
    </div>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Permission Name</th>
                <th style="width: 150px">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-sm btn-info"
                            title="Show"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm"
                            title="Edit"><i class="fa fa-pencil"></i> </a>
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="post" class="d-inline">
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
    
    {!! $permissions->render() !!}


    <div class="modal fade" id="createPermission" tabindex="-1" aria-labelledby="createPermissionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="createPermissionLabel">Create Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('permissions.store') }}" role="form" method="POST">
                    <div class="modal-body">

                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Permission Name</label>
                            <input type="text" name="name" class="form-control" id="name">
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
