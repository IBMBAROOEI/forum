
@include('backend.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>

			<li class="active">table users </li>
		</ol>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<table class="table " >
				<tbody>
				<tr>
					@foreach($users as $user)
						<td><form action="{{ route('user.profile.destroy', $user->id)}}" method="post">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger" type="submit"> delete acount </button>
							</form></td>
						<td><a class="btn btn-primary" href="{{route('user.profile.edit', $user->id)}}"  role="button">edit</a></td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>


</div>


