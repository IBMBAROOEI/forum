

@include('backend.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">table answer</li>
		</ol>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
            @include('backend.error')
			<div class="modal-body">
				<form  method="post" action="{{route('answer.user.update', $answer->id)}}">
					@method('PUT')
					@csrf
                    <div class="form-group">
                        <label>content</label>
                        <div class="form-group">
                            <textarea name="content" id="ckeditor"  class="form-control"   placeholder="Lets get started">{{ $answer->content}}</textarea>
                        </div>
                    </div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
                <script src="{{ asset('js.front/ckeditor.js')}}"></script>
			</div>
		</div>
	</div>
</div>

