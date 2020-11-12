@include('front.header')
<body>
<main id="tt-pageContent">
    <div class="row">
        @include('front.mesage')
    </div>
    <div class="container">
        <div class="tt-wrapper-inner">
            <h1 class="tt-title-border">
                Create New Topic
            </h1>
                <form class="form-default form-create-topic" action="{{route('store_thread')}}" method="post">
                    @method('POST')
                    @csrf
                <div class="form-group">
                    <label for="inputTopicTitle">create topic</label>
                    @include('front.error')
                    <div class="tt-value-wrapper">
                        <input type="text" name="title" class="form-control" id="inputTopicTitle" placeholder="Subject of your topic">
                    </div>
                    <div class="tt-note">Describe your topic well, while keeping the subject as short as possible.</div>
                </div>
                <div class="pt-editor">
                    <h6 class="pt-title">Topic Body</h6>
                    <div class="pt-row">
                        <div class="col-left">
                            <div class="form-group">
                                <textarea name="content" id="ckeditor"  class="form-control"  placeholder="Lets get started"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputTopicTitle">chanel</label>
                                <select name="chanel_id" class="form-control">
                                    @foreach($chanels  as $chanel)
                                    <option value="{{$chanel->id}}">{{$chanel->name}}"</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">send</button>
                </div>
            </form>
            <script src="{{ asset('js.front/ckeditor.js')}}"></script>
        </div>
    </div>
</main>












































