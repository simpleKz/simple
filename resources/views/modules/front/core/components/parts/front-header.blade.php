<header class="header mb-2"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7))"
        id="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__inner__top row justify-content-between">
                <div class="header__social-media col-12 col-lg-3 justify-content-start mx-0 px-0">
                    <a class="nav-link mx-0 pl-0 d-none d-md-block" href="">
                        <img class="nav__social-media" src="{{asset('modules/front/assets/img/insta.svg')}}" alt="">
                    </a>
                    <a class="nav-link mx-0 pl-0 d-none d-md-block" href="">
                        <img class="nav__social-media" src="{{asset('modules/front/assets/img/facebook.svg')}}" alt="">
                    </a>
                    <a class="nav-link mx-0 pl-0 d-none d-md-block" href="">
                        <img class="nav__social-media" src="{{asset('modules/front/assets/img/youtube.svg')}}" alt="">
                    </a>
                </div>
                <div class="header__auth p-0 m-0">
                    <a class="nav-link px-0 mx-0 bvi-open" href="">
                        <img class="nav__social-media" src="{{asset('modules/front/assets/img/eye.svg')}}" alt="">
                    </a>
                    <span class="nav-link dropdown show">

                    </span>

                    @if(auth()->user())
                        <a class="nav-link btn-login m-0" href="{{route('login')}}">Профиль</a>
                    @else
                        <a class="nav-link btn-login m-0" href="{{route('login')}}">{{trans('actions.login')}}</a>
                    @endif
                </div>
            </div>
{{--            <div class="header__inner__bottom navbar navbar-expand-lg ">--}}
{{--                <div class="header__logo">--}}
{{--                    <img src="{{asset('modules/front/assets/img/icon.png')}}" width="250px" alt="logo">--}}
{{--                </div>--}}
{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"--}}
{{--                        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                    <i class="burger-icon fa fa-bars"></i>--}}
{{--                </button>--}}
{{--                <div class="header__nav collapse navbar-collapse" id="navbarNavAltMarkup">--}}
{{--                    <div class="navbar-nav header__nav">--}}
{{--                        @foreach($navItems as $navItem)--}}
{{--                            <a href="{{$navItem['href']}}" class="nav__link nav-link">{{$navItem['title']}}</a>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</header>
