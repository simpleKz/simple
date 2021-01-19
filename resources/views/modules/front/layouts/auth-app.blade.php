<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Simple</title>
    @include('client.partner.core.parts.styles')
</head>
<body cz-shortcut-listen="true">
<div id="app">
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">
                <div class="dropdown">
                    <button class="btn dropdown-remove dropdown-toggle bg-transparent
                                    border-0 w-100 pl-1 text-black shadow-none"
                            type="button"
                            id="dropdownMenuButton"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                        <p class="float-left d-flex align-items-center font-weight-bold">
                            <img width="20" class="mr-2"
                                 src="{{asset('modules/clients/partners/assets/images/shop.png')}}" alt="">

                            {{Session::get('shop')->name ? Session::get('shop')->name : 'Магазин'}}
                            <span class="float-right fa fa-angle-down pt-1 ml-2"></span>
                        </p>
                    </button>
                    <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                        @foreach(Session::get('shops') as $shop)
                            <form action="{{route('partners.change.shop', ['id' => $shop->id])}}" method="POST">
                                {{csrf_field()}}
                                <button type="submit" class="btn dropdown-item font-weight-bold w-90
                            {{$shop->id == Session::get('shop')->id ? 'active' : ''}}">
                                    {{$shop->name ? $shop->name : 'Магазин'}}
                                </button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="list-group list-group-flush">
                <router-link :to="{ name: 'menu' }" class="list-group-item list-group-item-action">
                    <i class="fa fa-concierge-bell"></i>&nbsp;&nbsp;Меню
                </router-link>
                <router-link :to="{ name: 'orders' }" class="list-group-item list-group-item-action">
                    <i class="fa fa-receipt"></i>&nbsp;&nbsp;&nbsp;Мои Заказы
                </router-link>
                <router-link :to="{ name: 'histories' }" class="list-group-item list-group-item-action">
                    <i class="fa fa-clipboard-list"></i>&nbsp;&nbsp;&nbsp;История заказов
                </router-link>
                <router-link :to="{ name: 'support' }" class="list-group-item list-group-item-action">
                    <i class="fa fa-question-circle"></i>&nbsp;&nbsp;Техническая поддержка
                </router-link>
            </div>
            <div class="sidebar-footer">
                <p>
                    Если вы затрудняетесь с использованием админ панели, и у вас накопились вопросы, вы можете позвонить
                    на номер 8 705 505 0022 либо отправить ваше сообщение по почте childsapp@gmail.com
                </p>
                <hr>
                <p>
                    Егер сізге администратор тақтасын пайдалану қиын болса және сізде сұрақтар туындаса, сіз 8 705 505 0022
                    нөміріне қоңырау шалыңыз немесе хабарламаңызды childsapp@gmail.com поштасы арқылы жібере
                    аласыз.
                </p>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-light bg-light border-bottom">
                <a class="ml-3 text-black-50" id="menu-toggle">
                    <span class="fa fa-bars text-black"></span>
                </a>
                <div class="form-inline float-right" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <button class="nav-link dropdown-toggle border-0 bg-transparent" href="#"
                                    id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset(!Auth::user()->avatar ?
                                    '/modules/clients/partners/assets/images/profile.svg' : Auth::user()->avatar)}}"
                                     class="mr-1 rounded-circle admin-user-img" alt="">
                            </button>
                            <div class="dropdown-menu position-absolute dropdown-menu-right p-1"
                                 aria-labelledby="navbarDropdown">
                                <router-link :to="{ name: 'profile' }" class="dropdown-item">
                                    Личный кабинет
                                </router-link>
                                <router-link :to="{ name: 'businessRequest' }" class="dropdown-item">
                                    Добавить филиал
                                </router-link>
                                <router-link :to="{ name: 'reviewList' }" class="dropdown-item">Отзывы</router-link>
                                <div class="dropdown-item d-flex justify-content-around">
                                    Уведомления
                                    &nbsp
                                    <p class="custom-switch custom-switch-xl nav-custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1"></label>
                                    </p>
                                </div>
                                <a class="dropdown-item
                                 back-link mt-2 pt-2 pb-2 font-weight-bold text-center"
                                   onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid main-content">
                @yield('content')

                <div class="row">
                    <div class="col mt-5"></div>
                </div>
            </div>
        </div>

    </div>
</div>
<form id="logout-form" action="{{ route('partner.v3.logout') }}" method="POST"
      style="display: none;">
    @csrf
</form>
@include('client.partner.core.parts.scripts')
</body>
</html>
