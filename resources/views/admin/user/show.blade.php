
@extends('admin/layouts/app')

@section('content')
	<div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Manage Role</h1>
<form action="/admin/user/{{ $user->id }}" method="POST">
@csrf
 @method('PATCH')
@foreach($roles as $role)
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="roles[]" id="inlineRadio1" value="{{ $role->id }}" {{$user->hasAnyRole($role->name)?'checked':''}}>
  
  <label class="form-check-label" for="inlineRadio1">{{ $role->name }}</label>
</div>
@endforeach
<button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection