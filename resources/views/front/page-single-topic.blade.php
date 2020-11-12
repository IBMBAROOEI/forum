@include('front.header')
@include('front.mesage')
<main id="tt-pageContent">
    <div class="container">
        <div class="tt-single-topic-list">
            <div class="tt-item">
                <div class="tt-single-topic">
                    <div class="tt-item-header">
                        <div class="tt-item-info info-top">

                            <div class="tt-avatar-icon">
                                @if((Auth::user()->avatar))
                                    <img style="width: 25px" src= "{{ asset('storage/images/'.Auth::user()->avatar)}}">
                                @else
                                    <img src="image/default.jpg" style="width: 25px;">
                                @endif
                            </div>
                            <h3 class="tt-item-title">
                                <a href="#">{{$threads->content}}</a>
                            </h3>
                            <a href="#" class="tt-info-time">
                                <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>{{$threads->updated_at}}
                            <!-- !!jdate($thread->lastseen)->format('%B %d، %Y')!!}</div>
                              if you use pakage persion foe Date-->
                            </a>
                        </div>
                        <div class="tt-avatar-title">
                            <a href="#">{{$threads->user->name}}</a>
                        </div>
                        <div class="tt-item-tag">
                            <ul class="tt-list-badge">
                                <li><a href="#"><span class="tt-color03 tt-badge">{{$threads->chanel->name}}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tt-item">

                @foreach( $threads->answers as $reply)
                    @if($reply->flag==1)
                <div class="tt-info-box">
                    <h6 class="tt-title">replay</h6>
                    <div class="tt-row-icon">
                        <div class="tt-item">
                            <div class="tt-single-topic">
                                <div class="tt-item-header pt-noborder">
                                    <div class="tt-item-info info-top">
                                        <div class="tt-avatar-icon">
                                            @if((Auth::user()->avatar))
                                                <img style="width: 25px" src= "{{ asset('storage/images/'.Auth::user()->avatar)}}">
                                            @else
                                                <img src="image/default.jpg" style="width: 25px;">
                                            @endif
                                        </div>
                                        <div class="tt-avatar-title">
                                         writer   <a href="#">{{$reply->user->name}}</a>
                                        </div>
                                        <a href="#" class="tt-info-time">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>{{$reply->updated_at}}
                                        </a>
                                    </div>
                                </div>
                                <div class="tt-item-description">
                                    {!!$reply->content!!}
                                </div>

                            </div>
                        </div>
                        <hr>
                        @endif
                        @endforeach
                        <div class="tt-item">
                            <div class="tt-info-box">

                                <form action="{{route('replay')}}" method="post">
                                    <button type="submit" class="btn btn-primary">replay</button>
                                    @csrf
                                    @method('post')
                                    <div class="col-left">
                                        <div class="form-group">
                                            @include('front.error')
                                            <textarea name="content" id="ckeditor"  class="form-control"  placeholder="Lets get started"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="thread_id" value="{{$threads->id}}">
                                    <script src="{{ asset('js.front/ckeditor.js')}}"></script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('front.footer')