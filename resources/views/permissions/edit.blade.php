@extends('layouts.app')
@section('slug') Edit Permission @endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Permission</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('permissions.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <form action="{{ route('permissions.update', $permission->id) }}" role="form" method="POST">
            <div class="modal-body">
        
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label">Permission Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $permission->name }}">
                </div>
        
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection