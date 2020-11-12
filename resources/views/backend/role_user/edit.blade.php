@include('backend.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">user</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<table class="table">
				<thead>
				<tr>
					<form  method="post" action="{{route('backend.user.role.update', $user->id)}}">
						@method('PUT')
						@csrf
						@include('backend.error')
						<div class="form-group">
							<label>name</label>
							<input type="text"  name="name"  value="{{ $user->name}}" class="form-control">
						</div>
						<div class="form-group">
							<label>lastname</label>
							<input type="text"  name="lastname" value="{{$user->lastname}}"  class="form-control">
						</div>
						<div class="form-group">
							<label>email</label>
							<input type="email" disabled  value="{{$user->email}}" name="email" class="form-control" >
						</div>
						<div class="form-group">
							<label>password</label>
							<input type="password"  value="{{$user->password}}" name="password" class="form-control" >
						</div>
						<div class="form-group">
							<label>password</label>
							<input type="password"  value="{{$user->password}}" name="password" class="form-control" >
						</div>
                        <div class="form-group">
                            @foreach($permissions  as $permission)
                                {{$permission->name}}	<input type="checkbox" multiple="multiple" name="permissions[]" value="{{$permission->id}}">
                            @endforeach
                        </div>
						<div class="form-group">
							@foreach($roles  as $role)
								{{$role->name}}	<input type="checkbox" multiple="" name="roles[]" value="{{$role->id}}">
							@endforeach
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

