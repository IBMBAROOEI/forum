@include('backend.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">table user</li>
		</ol>
	</div><!--/.row-->
	@include('backend.success')
	<div class="row">
		<div class="col-lg-12">
			<table class="table">
				<thead>
				<tr>
					<form  method="post" action="{{route('backend.role.update', $role->id)}}">
						@method('PUT')
						@csrf

						<div class="form-group">
							<label>roles</label>
							<input type="text"  name="name"  value="{{ $role->name}}" class="form-control">
						</div>

						<div class="form-group">
							<div class="form-group">
								@foreach($permissions  as $permission)
									{{$permission->name}}	<input type="checkbox" multiple="multiple" name="permission[]" value="{{$permission->id}}">
								@endforeach
							</div>

						</div>

						<button type="submit" class="btn btn-primary">send</button>
					</form>
				</tr>
				</thead>
			</table>
		</div>
	</div>


</div>

