@extends('admin/layouts/app')

@section('content')

<div class="jss3">
	<div class="jss4">
		<div class="jss1188 jss1196 jss1189" style="">
			<h4 class="jss1357">
				Add New Admin
			</h4>
		</div>
		<br>
		<div class="jss269 jss268">

			<div class="jss1198" style="background: #fff;
			box-shadow: 0 1px 29px 0 #717171;">
			<div class="jss1368" style="">
				<form method="POST" action="/admin/adminregister" autocomplete="off">
					@csrf
					<div class="columns">
						<div class="column is-narrow">
							<label class="label">Username</label>
						</div>
						<div class="column">
							<div class="field">
								<div class="control">
									<input class="input is-success" type="text" name="name" placeholder="Admin Name">
								</div>
							</div>
						</div>
					</div>

					<div class="columns">
						<div class="column is-narrow" style="margin-right: 2.2em;">
							<label class="label">Email</label>
						</div>
						<div class="column">
							<div class="field">
								<div class="control">
									<input class="input is-success" type="email" name="email" placeholder="Admin Email" autocomplete="off">
								</div>
							</div>
						</div>
					</div>

					<div class="columns">
						<div class="column is-narrow">
							<label class="label">Password</label>
						</div>
						<div class="column">
							<div class="field">
								<div class="control">
									<input class="input is-success" type="password" name="password" placeholder="Admin Password" autocomplete="off">
								</div>
							</div>
						</div>
					</div>

					<div class="columns">
						<div class="column is-narrow">
							<label class="label">Choose Roles</label>
						</div>
						<div class="column">
							<div class="field">
								<div class="control">
									<div class="select is-primary">
										<select name="role_id">
											<option>Choose Roles</option>
											@foreach (App\Roles::all() as $role)
											<option value="{{ $role->id }}" 
												{{ old('role_id') == $role->id ? 'selected' : '' }}>
												{{ $role->role_name }}
											</option>                                  
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="flexing">
						<button type="submit" class="button is-rounded submit_button">
						Submit
					</button></div>
				</form>
				@if(count($errors))
					<ul class="notification is-danger">
						@foreach($errors->all() as $error)				
						<li>{{$error}}</li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>
	</div>
</div>
</div>
</div>
@endsection