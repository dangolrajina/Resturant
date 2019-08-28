@extends('admin/layouts/app')

@section('content')
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

	<form method="POST" action="/admin/menu/add" enctype="multipart/form-data">
		@csrf
		<div class="modal-body">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter Name" name="name">
			</div>

			<div class="form-group">
				<label for="price">Price</label>
				<input type="number" class="form-control" id="price" placeholder="Price" name="price">
			</div>

			<div class="form-group">
				<label for="price">Price</label>
				<input type="file" class="form-control" id="price" placeholder="Price" name="menu_image">
			</div>

			<div class="form-group">
			    <label for="exampleFormControlSelect1">Example select</label>
			    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
			      <option>Select a category</option>
			       @foreach(\App\Category::all() as $category) 
			      <option value="{{ $category->id }}">{{ $category->name }}</option>
			      @endforeach
			    </select>
			  </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>

</div>

@endsection