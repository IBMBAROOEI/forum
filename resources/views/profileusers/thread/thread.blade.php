@include('backend.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">table thread</li>
		</ol>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<!-- Button trigger modal -->
			@role('writer')
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				create thread
			</button>
			@endrole
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
							<form  method="post" action="{{route('thread.user.store')}}">
								@csrf
								<div class="form-group">
									<label >title</label>
									<input type="text"  name="title" class="form-control"  aria-describedby="emailHelp">
								</div>
								@include('backend.error')
								<div class="form-group">
									<label>content</label>
									<div class="form-group">
										<textarea name="content" id="ckeditor"  class="form-control"   placeholder="Lets get started"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect1">chanel</label>
									<select name="chanel_id">

										@foreach($chanels  as $chanel)
											<option value="{{$chanel->id}}">
												{{$chanel->name}}
											</option>
										@endforeach
									</select>
								</div>

								<td><select name="flag">
										<option value="1">active</option>
										<option value="0">disable</option>
									</select></td>

								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
							<script src="{{ asset('js.front/ckeditor.js')}}"></script>
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
					<th>content</th>
					<th>chanel</th>
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
						@foreach($thread as $threa)
							@switch($threa->flag)
								@case(1)
								@php
									$url=route('backend.thread.flag',$threa->id);
                                    $flag ='<a href="'.$url.'"class="badge badge-success">active</a>'
								@endphp
								@break
								@case(0)
								@php
									$url=route('backend.thread.flag',$threa->id);
                                    $flag ='<a href="'.$url.'"class="badge badge-warning">disable</a>'
								@endphp
								@break
								@default
							@endswitch
						@endforeach
					@endrole
					@foreach($thread as  $threa)
						<td>{{$threa->content}}</td>
						<td>{{$threa->chanel->name}}</td>
						<td><form action="{{ route('thread.user.destroy', $threa->id)}}" method="post">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger" type="submit">delete</button>
							</form></td>

						<td><a class="btn btn-primary" href="{{route('thread.user.edit', $threa->id)}}"  role="button">edit</a></td>
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













































































































{{--<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">--}}
{{--<div class="row">--}}
{{--<ol class="breadcrumb">--}}
{{--<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>--}}
{{--<li class="active">جدول تاپیک</li>--}}
{{--</ol>--}}

{{--</div><!--/.row-->--}}
{{--<div class="row">--}}
{{--<div class="col-lg-12">--}}
{{--<table class="table " >--}}
{{--<thead>--}}
{{--<tr>--}}

{{--<th>عنوان</th>--}}
{{--<th>متن</th>--}}
{{--<th>دسته بندی</th>--}}
{{--<th>حذف</th>--}}
{{--<th>ویرایش</th>--}}
{{--</tr>--}}
{{--</thead>--}}
{{--<tbody>--}}
{{--<tr>--}}
{{--@foreach($thread as  $threa)--}}
{{--<td>{{$threa->title}}</td>--}}
{{--<td>{{$threa->content}}</td>--}}
{{--<td>{{$threa->chanel->name}}</td>--}}
{{--<td><form action="{{ route('thread.user.destroy', $threa->id)}}" method="post">--}}
{{--@csrf--}}
{{--@method('DELETE')--}}
{{--<button class="btn btn-danger" type="submit">حذف</button>--}}
{{--</form></td>--}}
{{--<td><a class="btn btn-primary" href="{{route('thread.user.edit', $threa->id)}}"  role="button">ویرایش</a></td>--}}
{{--</tr>--}}
{{--@endforeach--}}
{{--</tbody>--}}
{{--</table>--}}
{{--</div>--}}
{{--</div>--}}


{{--</div><!--/.main-->--}}



{{--</body>--}}

{{--</html>--}}



