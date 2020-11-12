@include('backend.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">table user</li>
		</ol>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				create user role permision
			</button>
		@include('backend.success')
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form  method="post" action="{{route('backend.role.store')}}">
								@csrf
								<div class="form-group">
									@include('backend.error')
									<label>roles</label>
									<input type="text"  name="name" class="form-control">
								</div>
								<div class="form-group">
									@foreach($permissions  as $permission)
										{{$permission->name}}	<input type="checkbox" multiple="multiple" name="permission[]" value="{{$permission->id}}">
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
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">table user</li>
		</ol>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<table class="table">
				<thead>
				<tr>
					<th >role</th>
					<th>delete</th>
					<th>edit</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					@foreach ($roles as $key => $role)
						<td>{{$role->name }}</td>
						<td><form action="{{ route('backend.role.destroy', $role->id)}}" method="post">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger" type="submit">delete</button>
							</form></td>
						<td><a class="btn btn-primary" href="{{route('backend.role.edit',$role->id)}}"  role="button">edit</a></td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>


</div>












































































































































































