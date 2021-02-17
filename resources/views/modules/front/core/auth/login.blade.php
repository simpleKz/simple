@extends('modules.front.layouts.app-main')
@section('styles')
    <style>


        /*@media (max-width: 767px) {*/
        /*    .news__block.login{*/
        /*        margin: 0 auto -70px;*/
        /*    }*/
        /*}*/
        .btn-orange{
            border-radius: 3px;
            width: 100%;
            font-size: 20px;
            line-height: 24px;
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
            color:#F76321;
        }


    </style>
@endsection
@section('content')
    <section class="login pb-5">
        <div class="container mb-5">
            <div class="routing mt-3">
                <p class="pb-5"><a href="{{route('index')}}">Главная</a> – Авторизация</p>
            </div>
            <form action="{{route('login.post')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card col-12 d-flex justify-content-center align-items-center">
                    <div class="card-body p-5 col-12 col-md-5 ">
                        <div class="d-flex justify-content-center align-items-center  mb-5">
                            <h1>Вход</h1>
                        </div>
                        <div class="form mb-3">
                        <input type="tel" class="form-control pt-4 pb-4 {{ isset($errors) && $errors->has('phone') ? ' is-invalid' : '' }}"  id="phone" name = "phone"  value="{{old('phone')}}"  placeholder="Введи номер телефона" required >
                        @if(isset($errors) && $errors->has('phone'))
                            <div class="invalid-feedback">{{$errors->first('phone')}}</div>
                        @endif
                        </div>

                        <div class="form mb-4">
                        <input type="password" class="form-control pt-4 pb-4 {{ isset($errors) && $errors->has('phone') ? ' is-invalid' : '' }}" id="password" placeholder="Пароль"
                               name="password" required>
                            <span id = "icon" class="active fa fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="col-12 d-flex justify-content-center p-0 mb-3">
                            <button type="submit" class="btn-orange pt-3 pb-3">Войти
                            </button>
                        </div>
                        <div class="col-12">
                            <h2 class="text-center mb-5">Еще нет аккаунта? <b><a href="{{route('register')}}">Зарегистрируйся</a></b></h2>
                            <p class="text-center">Входя в аккаунт или создавая новый,
                                ты соглашаешься с нашими
                                <a href="#">Правилами и условиямии
                                    Положением о конфиденциальности</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
@section('scripts')
    <script>

        var inputPass2 = document.getElementById('password'),
            icon = document.getElementById('icon');

        icon.onclick = function () {

            if(icon.className == 'active fa fa-eye field-icon toggle-password') {
                inputPass2.setAttribute('type', 'text');
                icon.className = 'fa fa-eye field-icon-colored toggle-password';


            } else {
                inputPass2.setAttribute('type', 'password');
                icon.className = 'active fa fa-eye field-icon toggle-password';
            }

        };

        $(function(){

            $("#phone").mask("+7(999) 999-99-99");
            // $("#phone").pattern("^(\\([0-9]{3}\\)|[0-9]{3}-)[0-9]{3}-[0-9]{4}$\n");
        });


    </script>
@endsection

