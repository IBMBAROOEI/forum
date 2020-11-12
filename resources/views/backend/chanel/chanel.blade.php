@include('backend.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Chanel</li>
		</ol>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				create chanel
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form  method="post" action="{{route('backend.chanel.store')}}">
								@csrf

								<div class="form-group">
									<label for="exampleInputPassword1">name</label>
									<input type="text"  name="name" class="form-control" id="exampleInputPassword1">
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
					<th scope="col">chanel</th>
					<th scope="col">create_at</th>
					<th scope="col">update_at</th>
					<th scope="col">delete</th>
					<th scope="col">edit</th>
				</tr>
				</thead>
				<tbody>
				@foreach( $chanels as  $chanel)
					<tr>
						<td>{{$chanel->name}}</td>
						<td>{{$chanel->created_at}}</td>
						<td>{{$chanel->updated_at}}</td>
						<td><form action="{{ route('backend.chanel.destroy', $chanel->id)}}" method="post">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger" type="submit">delete</button>
							</form></td>
						<td><a class="btn btn-primary" href="{{route('backend.chanel.edit', $chanel->id)}}"  role="button">edit</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
