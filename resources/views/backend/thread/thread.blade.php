
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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				create thread
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">modal</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form  method="post" action="{{route('backend.thread.store')}}">
								@csrf
								@include('backend.error')
								<div class="form-group">
									<label>title</label>
									<input type="text"  name="title" class="form-control">
								</div>
								<div class="form-group">
									<label>content</label>
									<div class="form-group">
										<textarea name="content" id="ckeditor"  class="form-control"   placeholder="Lets get started"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label>chanel</label>
									<select name="chanel_id">

										@foreach($chanels  as $chanel)
											<option value="{{$chanel->id}}">
												{{$chanel->name}}
											</option>
										@endforeach
									</select>
								</div>

								<td><select name="flag">
										<option value="flag">active</option>
										<option value="flag">disable</option>
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
			@include('backend.success')
			<table class="table">
				<thead>
				<tr>
					<th >name user</th>
					<th >last name</th>
					<th >content</th>
					<th >status</th>
					<th >chanel</th>
					<th >create_at</th>
					<th>update_at</th>
					<th>answer</th>
					<th>delete</th>
					<th>edit</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					@foreach($thread as $threa)
						@switch($threa->flag)
							@case(1)
							@php
								$url=route('backend.flag',$threa->id);
                                $flag ='<a href="'.$url.'"class="badge badge-success">active</a>'
							@endphp
							@break
							@case(0)
							@php
								$url=route('backend.flag',$threa->id);
                                $flag ='<a href="'.$url.'"class="badge badge-warning">disable</a>'
							@endphp
							@break
							@default
						@endswitch
						<th scope="row">{{$threa->user->name}}</th>
						<td>{{$threa->title}}</td>
						<td>{{Illuminate\Support\Str::limit($threa->content, 7)}}</td>
						<td>{!!$flag!!}</td>
						<td>{{$threa->chanel->name}}</td>
						<td>{{$threa->created_at}}</td>
						<td>{{$threa->updated_at}}</td>
						<td><a class="btn btn-primary" role="button" href="{{route('show',$threa->id)}}">send answer </a></td>
						<td><form action="{{ route('backend.thread.destroy', $threa->id)}}" method="post">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger" type="submit">del</button>
							</form></td>
						<td><a class="btn btn-primary" href="{{route('backend.thread.edit', $threa->id)}}"  role="button">edit</a></td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

