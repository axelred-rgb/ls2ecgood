<header class="top-bar">
    <div class="topbar">

        <div class="container">
            <div class="row justify-content-end">

                <div class="col-lg-6 col-12 xs-mb-10">
                    <div class="topbar-call text-center text-lg-end topbar-right">
                        <ul class="list-inline d-lg-flex justify-content-end">
                            <li class="me-10 ps-10 lng-drop">
                                <select class="header-lang-bx selectpicker" onchange="window.location.href = __env+this.value">
                                    <option  value="{{App::$lang->getIso_code()}}" >
                                        {{App::$lang->getName()}}
                                    </option>

                                    @foreach(Dvups_lang::otherLangs(local()) as $lang)
                                        <option value="{{$lang->getIso_code()}}" >

                                            {{$lang->getName()}}

                                        </option>
                                    @endforeach

                                </select>
                            </li>
                            @if(App::$user->getId())
                                <li class="me-10 ps-10"><a href="{{route('myboard')}}"><i class="text-white fa fa-user d-md-inline-block d-none"></i> @tt("Account")</a></li>
                                <li class="me-10 ps-10"><a href="{{route('logout')}}"><i class="text-white fa fa-sign-in d-md-inline-block d-none"></i> @tt("Logout")</a></li>
                            @else
                                <li class="me-10 ps-10"><a href="{{route('register')}}"><i class="text-white fa fa-user d-md-inline-block d-none"></i> @tt("Register")</a></li>
                                <li class="me-10 ps-10"><a href="{{route('login')}}"><i class="text-white fa fa-sign-in d-md-inline-block d-none"></i> @tt("Login")</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav hidden class="nav-white nav-transparent">
        <div class="nav-header">
            <a href="{{route('home')}}" class="brand" style="">
                <img src="{{ assets   }}images/logo-training.png" alt=""/>
            </a>
            <button class="toggle-bar">
                <span class="ti-menu"></span>
            </button>
        </div>
        <ul class="menu">
            <li>
                <a href="{{route('home')}}">@tt("Home")</a>
            </li>
            <li>
                <a href="{{route('about')}}">@tt("About")</a>
            </li>
            <li>
                <a href="{{route('walloffame')}}">@tt("Wall of fame")</a>
            </li>
            <li class="dropdown">
                <a href="#">@tt("Training")</a>
                <ul class="dropdown-menu">
                    @foreach(App::$academies as $academy)
                        <li class="dropdown">
                            <a href="#">{{$academy->getName()}}</a>
                            <ul class="dropdown-menu">
                                @foreach(Courses::where($academy)->andwhere('type','!==',1)->__getAll() as $course)
                                    <li><a href="{{route('coursedetail')}}?id={{$course->getId()}}">{{$course->getName()}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li>
                <a href="{{route('pricing')}}">@tt("Pricing")</a>
            </li>
            <li>
                <a href="{{route('bloglist')}}">@tt("Articles")</a>
            </li>
            {{--			<li>--}}
            {{--                <a href="{{route('resources')}}">@tt("Resources")</a>--}}
            {{--            </li>--}}
            <li>
                <a href="{{route('affiliation')}}">@tt("Affiliation")</a>
            </li>
            <li>
                <a href="{{route('investor')}}">@tt("Investors")</a>
            </li>
            <li>
                <a href="{{route('contact')}}">@tt("Contact")</a>
            </li>
        </ul>

        <div class="wrap-search-fullscreen">
            <div class="container">
                <button class="close-search"><span class="ti-close"></span></button>
                <input type="text" placeholder="@tt('Search...')" />
            </div>
        </div>
    </nav>
</header>
