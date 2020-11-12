@include('front.header')
<meta name="_token" content="{{ csrf_token() }}"/>
<main id="tt-pageContent" class="tt-offset-small">
    <div class="container">
        <div class="tt-topic-list">
            <div class="tt-list-header">
                <a href="{{route('create')}}" class="btn btn-primary">create</a>
                <div class="tt-col-topic">thread</div>
                <div class="tt-col-category">chanel</div>
                <div class="tt-col-value hide-mobile">answer</div>
                <div class="tt-col-value hide-mobile">view</div>
                <div class="tt-col-value hide-mobile">like</div>
                <div class="tt-col-value">last seen</div>
            </div>
            @foreach($threads as $thread)
                <div class="tt-item tt-itemselect mt-5">
                    <div class="col-md-1" data-threadid="{{ $thread->id }}">
                        <a href="#" class=" far fa-thumbs-up like"
                           style='font-size:15px'>{{ Auth::user()->likes()->where('thread_id',$thread->id)->first()?Auth::user()->likes()->where('thread_id',$thread->id)->first()->like =='1'?'like':'':''}} </a>
                        <a href="#" class=" far fa-thumbs-down like"
                           style='font-size:15px'>{{ Auth::user()->likes()->where('thread_id',$thread->id)->first()?Auth::user()->likes()->where('thread_id',$thread->id)->first()->like == '0' ?'dislike':'':''}}</a>
                    </div>
                    <div class="tt-col-avatar">
                        @if(($thread->user->avatar))
                            <img style="width: 25px" src="{{ asset('storage/images/'.$thread->user->avatar)}}">
                        @else
                            <img src="image/default.jpg" style="width: 25px;">
                        @endif
                    </div>
                    <div class="tt-col-description">
                        <h6 class="tt-title">

                            <a href="{{route('show',$thread->id)}}"> {{$thread->title}}</a>
                        </h6>
                        <div class="row align-items-center no-gutters">
                            <div class="col-11">
                                <ul class="tt-list-badge">
                                    <li><a href="#"><span class="tt-badge"> {{$thread->user->name}}</span></a></li>
                                    <li><a href="#"><span class="tt-badge">wirter</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tt-col-category"><span class="tt-color01 tt-badge">{{$thread->chanel->name}}</span>
                    </div>
                    <div class="tt-col-value tt-color-select hide-mobile">{{$thread->answers->count()}}</div>
                    <div class="tt-col-value tt-color-select hide-mobile">{{$thread->view_thread}}</div>
                    <div class="tt-col-value hide-mobile">{{$thread->likes()->count()}}</div>
                    {{-- if you use pakage persion sentax jalali <div class="tt-col-value hide-mobile">{!!jdate($thread->lastseen)->format('%B %d، %Y')!!}</div>--}}
                    <div class="tt-col-value hide-mobile">{{$thread->user->last_seen}}</div>
                </div>
            @endforeach

        </div>
    </div>
</main>
    <script src="{{ asset('js.front/like.js')}}"></script>
@include('front.footer')

