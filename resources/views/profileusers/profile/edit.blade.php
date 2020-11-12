
@include('backend.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>

		</ol>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">

			<div class="modal-body">
				<form  method="post" action="{{route('user.profile.update', $users->id)}}" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="form-group">
						<label>name</label>
						<input type="text"  name="name"  value="{{$users->name}}" class="form-control" >
					</div>
					<div class="form-group">
						<label>last name</label>
						<input type="text"  name="name"  value="{{$users-> lastname}}" class="form-control">
					</div>
					<div class="form-group">
						<label>ایمیل</label>
						<input type="text" disabled  name="email"  value="{{$users->email}}" class="form-control">
					</div>
					<div class="form-group">
						<label>password</label>
						<input type="password"  value="{{$users->password}}" name="password" class="form-control" >
					</div>
					<div class="form-group">
						<label>password</label>
						<input type="password"  value="{{$users->password}}" name="password" class="form-control" >
					</div>
					<div class="form-group">
						<label>avatar</label>
						<input type="file"  name="avatar"  value="{{$users->avatar}}" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>

			</div>
		</div>
	</div>
</div>
