
@extends('admin/layouts/app')

@section('content')

	<div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Contacts</h1>
	          <!-- DataTales Example -->
	    <div class="card shadow mb-4">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
	        </div>
	        <div class="card-body">
	            <div class="table-responsive">
	                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
	                	<div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
	                	</div>
	                </div>
	            </div>

	            <form method="GET">
        			@csrf
        			                		<label>Search:
        			<input type="text" name="s" class="form-control form-control-sm" placeholder="" aria-controls="dataTable" autocomplete="off">
	                			
	                		</label>
	                	</form>
	                	</div>
	                </div>
	            </div>
	            <div class="row"><div class="col-sm-12">

	                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
	                  <thead>
	                    <tr role="row">
	                    	<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 219px;">S.N</th>
	                    	<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 328px;">UserName</th>
	                    	<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 161px;">Email</th>
	                    	<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 161px;">Subject</th>
	                    	<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 161px;">Message</th>
	                  </tr></thead>
	             		
	             		
	                  	<tbody>
                  			@foreach($contacts as $key=>$contact)
		                  		<tr role="row" class="odd">
		                  			<td>{{ ++$key }}</td>
		                  			<td>{{ $contact->name . ' ' . $contact->last }}</td>
		                  			<td>{{ $contact->email }}</td>
		                  			<td>{{ $contact->subject }}</td>
		                  			<td>{{ $contact->message }}</td>
		                  		</tr>
                  			@endforeach
	                  	</tbody>
	                </table>
	            </div>
	        </div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div>

	        <div class="col-sm-12 col-md-7">
	        	
	        	</div></div></div>
	              </div>

@endsection