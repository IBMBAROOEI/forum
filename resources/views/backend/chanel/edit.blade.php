
@include('backend.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-9 col-lg-offset-3 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">chanel</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                <tr>
                    <form  method="post" action="{{route('backend.chanel.update', $chanel->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>name</label>
                            <input type="text"  value="{{ $chanel->name}}" name="name" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">update</button>
                    </form>
                </tr>
                </thead>
            </table>
        </div>
    </div>


</div>

