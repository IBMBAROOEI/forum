@include('backend.sidebar')


<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">table answer</li>
	</ol>
    @include('backend.success')
</div><!--/.row-->
<div class="row">
	<div class="col-lg-12">
		<!-- Button trigger modal -->
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<table class="table " >
			<thead >
			<tr>
				<th >name user</th>
				<th>title</th>
				<th>content</th>
				<th >create_at</th>
				<th>update_at</th>
				<th>delete</th>
				<th>edit</th>
				@role('writer')
				<th>status</th>
				@endrole

			</tr>
			</thead>
			<tbody>
			<tr>
				@role('writer')
				@foreach($answer as $answe)
					@switch($answe->flag)
						@case(1)
						@php
							$url=route('backend.answer.flag',$answe->id);
                            $flag ='<a href="'.$url.'"class="badge badge-success">active</a>'
						@endphp
						@break
						@case(0)
						@php
							$url=route('backend.answer.flag',$answe->id);
                            $flag ='<a href="'.$url.'"class="badge badge-warning">disable</a>'
						@endphp
						@break
						@default
					@endswitch
				@endforeach
				@endrole
				@foreach($answer as $answe)
				<td>{{$answe->user->name}}</td>
				<td>{{$answe->thread->title}}</td>
				<td>{{Illuminate\Support\Str::limit($answe->content,2)}}</td>
				<td>{{$answe->created_at}}</td>
				<td>{{$answe->updated_at}}</td>
				<td><form action="{{ route('answer.user.destroy', $answe->id)}}" method="post">@csrf
				@method('DELETE')<button class="btn btn-danger" type="submit">delete</button></form></td>
				<td><a class="btn btn-primary" href="{{route('answer.user.edit', $answe->id)}}"  role="button">edit</a></td>
					@role('writer')
					<td>{!!$flag!!}</td>
					@endrole
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>


</div>















































































