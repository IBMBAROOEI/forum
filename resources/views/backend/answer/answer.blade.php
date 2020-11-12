
@include('backend.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">table answer</li>
		</ol>
	</div><!--/.row-->
	@include('backend.success')
	<div class="row">
		<div class="col-lg-12">
			<table class="table " >
				<thead>
				<tr>
					<th >name user</th>
					<th>content</th>
					<th>thread title</th>
					<th>status</th>
					<th >creat_at</th>
					<th>update_at</th>
					<th>delete</th>
					<th>edit</th>
				</tr>
				</thead>
				<tbody>
				<tr>
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
							<td>{{$answe->user->name}}</td>
							<td>{{Illuminate\Support\Str::limit($answe->content, 7)}}</td>
							<td>{{$answe->thread->title}}</td>
							<td>{!!$flag!!}</td>
						<td>{{$answe->created_at}}</td>
						<td>{{$answe->updated_at}}</td>
							<td><form action="{{ route('backend.answer.destroy',$answe->id)}}" method="post">@csrf
								@method('DELETE')<button class="btn btn-danger" type="submit">حذف</button></form></td>
							<td><a class="btn btn-primary" href="{{route('backend.answer.edit',  $answe->id)}}"  role="button">ویرایش</a></td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>


</div>




