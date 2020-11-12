@include('backend.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">thraed</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			@include('backend.success')
			<table class="table">
				<thead>
				<tr>
					<form  method="post" action="{{route('backend.thread.update', $thread->id)}}">
						@method('PUT')
						@csrf
						@include('backend.error')
						<div class="form-group">
							<label>title</label>
							<input type="text"  name="title"  value="{{ $thread->title}}" class="form-control" >
						</div>
						<div class="form-group">
							<label>content</label>
							<div class="form-group">
								<textarea name="content" id="ckeditor"  class="form-control"   placeholder="Lets get started">{{ $thread->content}}</textarea>
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
						<div class="form-group">
							<label >status</label>
							<select name="flag" >
								<option  value="1" {{ $thread->flag}}>active</option>
								<option value="0" {{ $thread->flag}}>disable</option>
							</select>
						</div >
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
					<script src="{{ asset('js.front/ckeditor.js')}}"></script>

				</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
