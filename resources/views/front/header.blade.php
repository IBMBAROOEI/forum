@include('front.resorce')
<header id="tt-header">
    <div class="container">
        <div class="row tt-row no-gutters">
            <div class="col-auto">
                <!-- /toggle mobile menu -->
                <!-- logo -->
                <div class="tt-logo">
                  <img src="{{url('image/logo.png ')}}"></a>

                </div>
                <div class="tt-search">
                    <form class="search-wrapper" method="post" action="{{route('search')}}">
                        @csrf
                        <div class="search-form">
                            <input type="text" name="search" class="tt-search__input" placeholder="Search">
                            <button class="tt-search__btn" type="submit">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-search"></use>
                                </svg>
                            </button>
                            <button class="tt-search__close">
                                <svg class="tt-icon">
                                    <use xlink:href="#cancel"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="search-results">
                            <button type="button" class="tt-view-all" data-toggle="modal" data-target="#modalAdvancedSearch">Advanced Search</button>
                        </div>
                    </form>
                </div>
                <!-- /tt-search -->
            </div>
            <div class="col-auto ml-auto">
                <div class="tt-user-info d-flex justify-content-center">
                        {{ Auth::user()->id }}
                    <div class="tt-avatar-icon tt-size-md">
                        @if((Auth::user()->avatar))
                       <img style="width: 25px" src= "{{ asset('storage/images/'.Auth::user()->avatar)}}">
                        @else
                            <img src="image/default.jpg" style="width: 25px;">
                        @endif
                    </div>
                    <div class="custom-select-01">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <div class="btn btn-danger">logout</div>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
