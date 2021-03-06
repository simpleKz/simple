<header>
    <div class="start-header start-style">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-light navbar-expand-md">
                        <div class="header_logo">
                            <a href="{{url()->to('/')}}">Simple.</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
{{--                            <ul class="navbar-nav ml-auto py-4 py-md-0">--}}
{{--                                                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">--}}
{{--                                                                    <a class="nav-link" href="{{route('courses')}}">Курсы</a>--}}
{{--                                                                </li>--}}
{{--                            </ul>--}}
                        </div>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto py-4 py-md-0">
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">

                                    @if(auth()->user() && auth()->user()->role_id == 2 )
                                        <a class="nav-link" href="{{route('personal-account')}}"><i
                                                class="fas fa-user"></i>{{" ".auth()->user()->first_name ." ".auth()->user()->last_name."."}}
                                        </a>
                                    @else
                                        <a class="nav-link" href="{{route('personal-account')}}"><i class="fas fa-user"></i> Войти</a>
                                    @endif
                                </li>
{{--                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">--}}
{{--                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"--}}
{{--                                       aria-haspopup="true" aria-expanded="false">Ru</a>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="#">Kz</a>--}}
{{--                                        <a class="dropdown-item" href="#">En</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
