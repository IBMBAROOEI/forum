@include('backend.master')
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <td>
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="glyphicon glyphicon-bell"></i><span class="label label-info">
                                @foreach(auth()->user()->notifications as $notification)
                            @if($notification->unread())<badge>@lang('new noti')</badge>
                            @endif

                        @endforeach
                            </span>
                </a>
            </td>
            <td><a class="btn btn-primary" href="{{route('show_thread')}}"  role="button">Forum</a></td>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                </a>
                @if((Auth::user()->avatar))
                    <img style="width:25px " class="img-circle " class="img-circle" src= "{{ asset('storage/images/'.Auth::user()->avatar) }}">
                @else
                    <img src="image/default.jpg" style="width: 25px;">
                @endif
                {{ Auth::user()->name }}
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            <a id="navbarDropdown"  href="#" role="button"  aria-haspopup="true"  v-pre>

                <a class="navbar-brand" href="#">panel</a>

                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown">
                    <li class="divider"></li>
                    <li class="divider"></li>
                </ul>
            </a>
        </div>
    </div>
</nav>
</div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-3 sidebar">
    <ul class="nav menu">
        <li class="active"><a href="index.html"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>profile</a></li>
        <li class="parent ">
            @role('admin')
        <li>
            <a class="" href="{{route('backend.thread.index')}}">
                <span class="glyphicon glyphicon-share-alt"></span>thread
            </a>
        </li>
        <li>
            <a class="" href="{{route('backend.answer.index')}}">
                <span class="glyphicon glyphicon-share-alt"></span> answer
            </a>
        </li>
        <li>
            <a class="" href="{{route('backend.user.index')}}">
                <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> users
            </a>
        </li>
        <li>
            <a class="" href="{{route('backend.chanel.index')}}">
                <svg class="glyph stroked film"><use xlink:href="#stroked-film"/></svg></span>chanel
            </a>
        </li>
        <li>
            <a class="" href="{{route('backend.user.role.index')}}">
                <svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg></span>role user
            </a>
        </li>
        <li>
            <a class="" href="{{route('backend.role.index')}}">
                <svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg></span>permission user
            </a>
        </li>

        @endrole
        <hr>

        @role('users|admin|writer ')
        <li>
            <a class="" href="{{route('user.profile.index')}}">
                <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>edit profile
            </a>
        </li>
        @endrole
        @role('users|writer')
        <li>
            <a class="" href="{{route('thread.user.index')}}">
                <svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>edit thtread
            </a>
        </li>

        <li>
            <a class="" href="{{route('answer.user.index')}}">
                <svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg>
                edit answer
            </a>
        </li>
        @endrole

        <li role="presentation" class="divider"></li>

    </ul>
</div><!--/.sidebar-->

