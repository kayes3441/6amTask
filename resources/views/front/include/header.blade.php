

<header class="header navbar-area">
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-left">
                        <ul class="menu-top-link">


                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">
                            <li><a href="{{route('home')}}">Home</a></li>
                            @if(Session::get('front_user_id'))
                            <li><a href="{{route('post.index')}}">Post Blog</a></li>
                            <li><a href="{{route('post.manage')}}">Blog List</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        @if(Session::get('front_user_id'))
                        <div class="user">
                            <i class="lni lni-user"></i>
                            {{Session::get('front_user_name')}}
                        </div>
                        @endif
                        <ul class="user-login">
                            @if(Session::get('front_user_id'))
                                <li>
                                    <a href="{{route('front.logout')}}">Logout</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{route('front.login')}}">Sign In</a>
                                </li>
                                <li>
                                    <a href="{{route('front.registration')}}">Register</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
