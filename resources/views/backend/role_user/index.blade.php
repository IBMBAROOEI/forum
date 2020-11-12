
@include('backend.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">tabel user</li>
		</ol>
	</div><!--/.row-->
	@include('backend.success')
	<div class="row">
		<div class="col-lg-12">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				craete user
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">modal</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							@include('backend.error')
							<form  method="post" action="{{route('backend.user.role.store')}}">
								@csrf
								<div class="form-group">
									<label>name</label>
									<input type="text"  name="name" class="form-control"  aria-describedby="emailHelp">
								</div>
								<div class="form-group">
									<label>lastname</label>
									<input type="text"  name="lastname" class="form-control">
								</div>
								<div class="form-group">
									<label>email</label>
									<input type="email"  name="email" class="form-control">
								</div>
								<div class="form-group">
									<label>password</label>
									<input type="password"  name="password" class="form-control">
								</div>
								<div class="form-group">
									<label>password_confirmation</label>
									<input type="password"  name="password_confirmation " class="form-control">
								</div>
								<div class="form-group">
									<label> roles</label>
									@foreach($roles  as $role)
										{{$role->name}}	<input type="checkbox" multiple="multiple" name="roles[]" value="{{$role->id}}">
									@endforeach
								</div>

								<div class="form-group">
									<label>permision</label>
									@foreach($permissions  as $permission)
										{{$permission->name}}	<input type="checkbox" multiple="multiple" name="permissions[]" value="{{$permission->id}}">
									@endforeach
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<table class="table">
				<thead>
				<tr>
					<th >name</th>
					<th>email</th>
					<th >role</th>
					<th>edit</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					@foreach($data as $key => $user)
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>
							@if(!empty($user->getRoleNames()))
								@foreach($user->getRoleNames() as $v)
									<label class="badge badge-success">{{ $v }}</label>
								@endforeach
							@endif
						</td>
						<td><a class="btn btn-primary" href="{{route('backend.user.role.edit',$user->id)}}"  role="button">edit</a></td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
















































































