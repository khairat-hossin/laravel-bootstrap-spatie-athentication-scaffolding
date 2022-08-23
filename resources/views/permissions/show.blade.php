@extends('layouts.app')
@section('slug') Show Permission @endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Permission</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('permissions.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission Name:</strong>
            {{ $permission->name }}
        </div>
    </div>
</div>
@endsection