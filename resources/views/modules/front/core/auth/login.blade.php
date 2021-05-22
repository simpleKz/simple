@extends('modules.front.layouts.app-main')
@section('styles')

    <style>


        /*@media (max-width: 767px) {*/
        /*    .news__block.login{*/
        /*        margin: 0 auto -70px;*/
        /*    }*/
        /*}*/

        .login {
            padding-top: 80px;
            padding-bottom: 80px;
        }

        .back_links a {
            color: #000000;
        }

        .back_links a:hover {
            color: #111111;
            font-weight: 600;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border: 1px solid #F76321;
            outline: 0;
            box-shadow: none
        }

        .field-icon {
            float: right;
            margin-right: 25px;
            margin-top: -33px;
            position: relative;
            z-index: 3;

        }

        .field-icon-colored {
            float: right;
            margin-right: 25px;
            margin-top: -33px;
            position: relative;
            z-index: 3;
            color: #F76321;
        }


    </style>
@endsection
@section('content')
    <div class="back_links">
        <a href="{{route('index')}}">Главная &#8594;</a>
        <a href="{{route('login')}}">Авторизация </a>
    </div>
    <section class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <form action="{{route('login.post')}}" method="post"
                          enctype="multipart/form-data" class="col-12 col-md-7 col-lg-6 col-xl-5">
                        {{csrf_field()}}
                        <div class="card">
                            <div class="card-body p-lg-5 p-2">
                                <div class="d-flex justify-content-center align-items-center mb-5 mt-4">
                                    <h1>Вход</h1>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Страна
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" onclick="kz()">Казахстан</a>
                                            <a class="dropdown-item" onclick="kg()">Киргизия</a>
                                            <a class="dropdown-item" onclick="ru()">Россия</a>
                                            <a class="dropdown-item" onclick="pl()">Польша</a>
                                            <a class="dropdown-item" onclick="tur()">Турция</a>
                                            <a class="dropdown-item" onclick="usa()">США и Канада</a>
                                            <a class="dropdown-item" onclick="md()">Молдова</a>
                                            <a class="dropdown-item" onclick="uz()">Узбекистан</a>
                                            <a class="dropdown-item" onclick="ukr()">Украина</a>
                                            <a class="dropdown-item" onclick="ger()">Германия</a>
                                            <a class="dropdown-item" onclick="greece()">Греция</a>
                                            <a class="dropdown-item" onclick="azb()">Азербайжан</a>
                                            <a class="dropdown-item" onclick="gr()">Грузия</a>
                                            <a class="dropdown-item" onclick="arm()">Армения</a>
                                            <a class="dropdown-item" onclick="grb()">Великобритания</a>


                                        </div>
                                    </div>
                                    <input type="tel"
                                           class="form-control pt-4 pb-4 {{ isset($errors) && $errors->has('phone') ? ' is-invalid' : '' }}"
                                           id="phone" name="phone" value="{{old('phone')}}"
                                           placeholder="Введи номер телефона" required>
                                    @if(isset($errors) && $errors->has('phone'))
                                        <div class="invalid-feedback">{{$errors->first('phone')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="password"
                                           class="form-control pt-4 pb-4 {{ isset($errors) && $errors->has('phone') ? ' is-invalid' : '' }}"
                                           id="password" placeholder="Пароль"
                                           name="password" required>
                                    <span id="icon" class="active fas fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="d-flex justify-content-center form-group mb-3">
                                    <button type="submit" class="btn-orange btn-block">Войти
                                    </button>
                                </div>
                                <div class="col-12 text-center">
                                    <h2 class="mb-1">Еще нет аккаунта?</h2>
                                    <h2 class="mb-5"><b><a href="{{route('register')}}">Зарегистрируйся</a></b></h2>
                                    <p>Входя в аккаунт или создавая новый,
                                        ты соглашаешься с нашими
                                        <a href="#">Правилами и условиямии
                                            Положением о конфиденциальности</a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

@endsection
@section('scripts')
    <script>

        var inputPass2 = document.getElementById('password'),
            icon = document.getElementById('icon');

        icon.onclick = function () {

            if (icon.className == 'active fas fa-eye field-icon toggle-password') {
                inputPass2.setAttribute('type', 'text');
                icon.className = 'fas fa-eye field-icon-colored toggle-password';


            } else {
                inputPass2.setAttribute('type', 'password');
                icon.className = 'active fas fa-eye field-icon toggle-password';
            }

        };

        function kz() {
            mask('+7(999) 999-99-99')
        }

        function kg() {
            mask("+999(999)999-999")
        }

        function ru() {
            mask("+7(999) 999-99-99")
        }

        function pl() {
            mask("+48(999) 999-999")
        }

        function tur() {
            mask("+99(999) 999-9999")
        }

        function usa() {
            mask("+1(999) 999-9999")
        }

        function md() {
            mask("+373(9999) 9999")
        }

        function uz() {
            mask("+999(99) 999-9999")
        }
        function ukr() {
            mask("+380(99) 999-99-99")

        }
        function ger() {
            mask("+99(9999) 999-9999")
        }

        function greece() {
            mask("+30(9999) 999-9999")

        }

        function azb() {
            mask("+999(99) 999-99-99")

        }


        function gr() {
            mask("+999(999) 999-999")
        }

        function arm() {
            mask("+374(99) 999-999")
        }


        function grb() {
            mask("+44(99) 9999-9999")

        }






        function mask(mask) {
            $(function () {
                $("#phone").mask(mask);
            });
        }


    </script>
@endsection

