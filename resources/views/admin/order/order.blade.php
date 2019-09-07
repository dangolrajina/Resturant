@extends('admin/layouts/app')

@section('content')
	<div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Menus</h1>
	          <!-- DataTales Example -->
	    <div class="card shadow mb-4">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
	        </div>
	        <div class="card-body">
	            <div class="table-responsive" style="overflow: hidden;">
	                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
	                	<div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
	                	<form method="GET">
	                			@csrf
	                		<label>Search:
	                			<input type="text" name="s" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
	                			
	                		</label>
	                	</form>
	                	</div>
	                </div>
	            </div>
	            <div class="row"><div class="col-sm-12">

				{{-- <a href="/admin/menu/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="padding: 10px;">+Add Menu</a> --}}
	                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
	                  <thead>
	                    <tr role="row">
	                    	<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 219px;">S.N</th>
	                    	<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 328px;">Name</th>
	                    	<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 161px;">Price</th>
	                    	<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 161px;">Image</th>
	                    	<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 161px;">Action</th>
	                    </tr>
	                  </thead>
	             		
	                  <tbody>
	                  	
	                  	{{-- @foreach($menus as $key=>$menu) --}}
		                  	<tr role="row" class="odd">
		                      <td class="sorting_1">{{-- {{ ++$key}} --}}</td>
		                      <td>{{-- {{ $menu->name }} --}}</td>
		                      <td>{{-- {{ $menu->price }} --}}</td>
		                      <td><img src="{{-- /storage/menu_images/{{ $menu->menu_image} --}}}" style="    width: 54px;"></td>
		                      <td style="display: flex;">
		                      	<a href="{{-- /admin/menu/edit/{{ $menu->id }} --}}" class="btn btn-primary text-gray-800">Edit</a>
		                      	&nbsp;
		                      	<form method="POST" action="{{-- /admin/menu/delete/{{ $menu->id }} --}}">
		                      		@csrf
		                      		@method('DELETE')
		                      		<button type="submit" class="btn btn-danger text-gray-800">Delete</button>
		                      	</form>
		                      </td>
		                    </tr>
	                   {{--  @endforeach --}}
	                </tbody>
	                </table>
	            </div>
	        </div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div>

	        <div class="col-sm-12 col-md-7">
	        	{{-- {{ $menus->links() }} --}}
	        	</div></div></div>
	              </div>
	            </div>
	          </div>

	        </div>

@endsection