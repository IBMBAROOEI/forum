
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

			<table class="table " >
				<thead >
				<tr>
					<th>name</th>
					<th>email</th>
					<th>lastname</th>
					<th>role user</th>
					<th>status</th>
					<th>create_at</th>
					<th>update_at</th>
					<td>delete</td>
					<td>edit</td>

				</tr>
				</thead>
				<tbody>
				<tr>
					@foreach($users as $user)
						@switch($user->flag)
							@case(1)
							@php
								$url=route('backend.flag',$user->id);
                                $flag ='<a href="'.$url.'"class="badge badge-success">active</a>'
							@endphp
							@break
							@case(0)
							@php
								$url=route('backend.flag',$user->id);
                                $flag ='<a href="'.$url.'"class="badge badge-warning"> disable</a>'
							@endphp
							@break
							@default
						@endswitch
						<td>{{$user->name}}</td>
						<td>{{Illuminate\Support\Str::limit($user->email,7)}}</td>
						<td>{{$user->lastname}}</td>
						<td>{{$user->getRoleNames()[0]}}</td>
							<td>{!!$flag!!}</td>
						<td>{{$user->created_at}}</td>
						<td>{{$user->updated_at}}</td>
						<td><form action="{{ route('backend.user.destroy', $user->id)}}" method="post">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger" type="submit">delete</button>
							</form></td>
						<td><a href="{{url('backend/permision/'.$user->id)}}" class="btn  btn-primary">edit</a></td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>


</div>
