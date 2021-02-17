@extends('modules.front.layouts.app-main')
@section('styles')
    <style>
        /** {*/
        /*    box-sizing: border-box;*/
        /*}*/

        /*body {*/
        /*    background-color: #f1f1f1;*/
        /*}*/

        /*#regForm {*/
        /*    background-color: #ffffff;*/
        /*    margin: 100px auto;*/
        /*    font-family: Raleway;*/
        /*    padding: 40px;*/
        /*    width: 70%;*/
        /*    min-width: 300px;*/
        /*}*/

        /*h1 {*/
        /*    text-align: center;*/
        /*}*/

        /*input {*/
        /*    padding: 10px;*/
        /*    width: 100%;*/
        /*    font-size: 17px;*/
        /*    font-family: Raleway;*/
        /*    border: 1px solid #aaaaaa;*/
        /*}*/

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /*button {*/
        /*    background-color: #4CAF50;*/
        /*    color: #ffffff;*/
        /*    border: none;*/
        /*    padding: 10px 20px;*/
        /*    font-size: 17px;*/
        /*    font-family: Raleway;*/
        /*    cursor: pointer;*/
        /*}*/

        /*button:hover {*/
        /*    opacity: 0.8;*/
        /*}*/

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #4CAF50;
        }

        .btn-orange {
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
        .message{
            font-size: 12px;
            /*line-height: 16px;*/
        }

    </style>
@endsection
@section('content')
    <section class="login pb-5">
        <div class="container mb-5">
            <div class="routing mt-3">
                <p class="pb-5"><a href="{{route('index')}}">Главная</a> – Регистрация</p>
            </div>
{{--            <form id="regForm" action="/action_page.php">--}}
                <div class="tab">
{{--                    <form action=" " method="post" enctype="multipart/form-data">--}}
{{--                        {{csrf_field()}}--}}
                        <div class="card col-12 d-flex justify-content-center align-items-center">
                            <div class="card-body p-5 col-12 col-md-6 ">
                                <div class="text-center  mt-3 mb-4">
                                    <h1 class="mb-4">Регистрация</h1>
                                    <h2 class="step-header text-muted">Шаг 1.</h2>
                                    <h4 class="step-text">Введи свой номер телефона,
                                            на который мы отправим проверочный код.</h4>
                                </div>
                                <div class="form mb-3">
                                    <input type="tel" class="form-control pt-4 pb-4 {{ isset($errors) && $errors->has('phone') ? ' is-invalid' : '' }}"  id="phone" name = "phone"   required placeholder="Введи номер телефона" >
                                    @if(isset($errors) && $errors->has('phone'))
                                        <div class="invalid-feedback">{{$errors->first('phone')}}</div>
                                    @endif
                                </div>
                                <div class="col-12 d-flex justify-content-center p-0 mb-3">
                                    <button type="submit" class="btn-orange pt-3 pb-3" id="sendPhone" onclick="nextPrev(1)">Продолжить
                                    </button>
                                </div>
                                <div class="col-12">
                                    <h2 class="text-center mb-5">Уже есть аккаунт? <b><a href="{{route('login')}}">Авторизуйся</a></b></h2>
                                    <p class="text-center">Входя в аккаунт или создавая новый,
                                        ты соглашаешься с нашими
                                        <a href="#">Правилами и условиямии
                                            Положением о конфиденциальности</a></p>
                                </div>
                            </div>
                        </div>
{{--                    </form>--}}
                </div>
                <div class="tab">
{{--                    <form action=" " method="post" enctype="multipart/form-data">--}}
                        {{csrf_field()}}
                        <div class="card col-12 d-flex justify-content-center align-items-center">
                            <div class="card-body p-5 col-12 col-md-6 ">
                                <div class="text-center  mt-3 mb-4">
                                    <h1 class="mb-4">Регистрация</h1>
                                    <h2 class="step-header text-muted">Шаг 2.</h2>
                                    <h4 class="step-text">Введи код, отправленный на
                                        указанный номер.</h4>
                                </div>
                                <div class="form mb-3">
                                    <input type="tel" class="form-control pt-4 pb-4 {{ isset($errors) && $errors->has('phone') ? ' is-invalid' : '' }}"  id="phone-1" name = "phone-1"  value="{{old('phone-1')}}" disabled placeholder="Введи номер телефона" >
                                    @if(isset($errors) && $errors->has('phone'))
                                        <div class="invalid-feedback">{{$errors->first('phone')}}</div>
                                    @endif
                                </div>
                                <div class="form mb-3">
                                    <input type="tel"  class="form-control pt-4 pb-4 {{ isset($errors) && $errors->has('phone') ? ' is-invalid' : '' }}" id="code"  placeholder="Введи проверочный код"
                                           name="code" required>
                                </div>
                                <div class="col-12 d-flex justify-content-center p-0 mb-3">
                                    <button type="submit" class="btn-orange pt-3 pb-3" onclick="nextPrev(1)">Продолжить
                                    </button>
                                </div>
                                <div class="col-12">
                                    <h2 class="text-center mb-5">Уже есть аккаунт? <b><a href="{{route('login')}}">Авторизуйся</a></b></h2>
                                    <p class="text-center">Входя в аккаунт или создавая новый,
                                        ты соглашаешься с нашими
                                        <a href="#">Правилами и условиямии
                                            Положением о конфиденциальности</a></p>
                                </div>
                            </div>
                        </div>
{{--                    </form>--}}
                </div>
                <div class="tab">
                        <div class="card col-12 d-flex justify-content-center align-items-center">
                            <div class="card-body p-5 col-12 col-md-6 ">
                                <div class="text-center  mt-3 mb-4">
                                    <h1 class="mb-4">Регистрация</h1>
                                    <h2 class="step-header text-muted">Шаг 3.</h2>
                                    <h4 class="step-text text-center">Установите надежный пароль.
                                        Пароль должен быть не менее
                                        8 символов</h4>
                                </div>
                                <div class="form mb-4">
                                    <input type="password" class="form-control pt-4 pb-4 {{ isset($errors) && $errors->has('phone') ? ' is-invalid' : '' }}" id="password" placeholder="Введите пароль"
                                           name="password" required>
                                </div>
                                <div class="form mb-4">
                                    <input type="password" class="form-control pt-4 pb-4 {{ isset($errors) && $errors->has('phone') ? ' is-invalid' : '' }}" id="check-password" placeholder="Повтори введеный пароль"
                                           name="check-password" required>
                                    <span id = "icon" class="active fa fa-eye field-icon toggle-password"></span>

                                        <label class="message" id='message'></label><br>
                                        <label class="message" id='message1'></label>



                                </div>
                                <div class="col-12 d-flex justify-content-center p-0 mb-3">
                                    <button type="submit" class="btn-orange pt-3 pb-3" id="send-button" onclick="setPassword()" disabled>Завершить регистрацию
                                    </button>
                                </div>
                                <div class="col-12">
                                    <h2 class="text-center mb-5">Уже есть аккаунт? <b><a href="{{route('login')}}">Авторизуйся</a></b></h2>
                                    <p class="text-center">Входя в аккаунт или создавая новый,
                                        ты соглашаешься с нашими
                                        <a href="#">Правилами и условиямии
                                            Положением о конфиденциальности</a></p>
                                </div>
                            </div>
                        </div>
                </div>




{{--            </form>--}}
        </div>
    </section>

@endsection
@section('scripts')
    <script>

        var currentTab = 0;
        var currentCode ;
        var currentPhone ;
        showTab(currentTab);

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";

            // if (n == (x.length - 1)) {
            //     document.getElementById("nextBtn").innerHTML = "Submit";
            // } else {
            //     document.getElementById("nextBtn").innerHTML = "Next";
            // }

        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");

            if (!validateForm(currentTab)) return false;


            if(currentTab == 0){
                var phone = document.getElementById("phone").value;
                document.getElementById("phone-1").value = phone;
                if (!sendPhone()) return false;
            }else if(currentTab == 1){
                if (!sendCode()) return false;
            }

            x[currentTab].style.display = "none";
            currentTab = currentTab + n;

            showTab(currentTab);
        }

        function validateForm(n) {
            var x, y, i, valid = true;
            if(n == 0){
                y = document.getElementById('phone');
                x = document.getElementById('phone').value;
                if (x  == "") {

                    y.className += " invalid";
                    valid = false;
                }
            }else if(n == 1){
                y = document.getElementById('code');
                x = document.getElementById('code').value;
                if (x  == "") {

                    y.className += " invalid";
                    valid = false;
                }
            }





            return valid;
        }

        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }

        function sendCode() {

            var phone = document.getElementById("phone-1").value;
            var code = document.getElementById("code").value;
            var valid;

            valid =   $.ajax(
                {
                    method: "get",
                    url: "{{route('send.code.post')}}",
                    async: false,
                    data: {
                        phone: phone,
                        code:code
                    },
                    success: function(data) {
                        if($.isEmptyObject(data.error)){

                        }else{
                            $.each(data.error, function(key,value) {
                                toastr.error(value);

                            });

                        }
                    }

                });
            if(valid.responseJSON.success){
                currentPhone = phone;
                currentCode  = code;
                return true;
            }else{
                return false;
            }
        }

    </script>

    <script>
        $(function(){

            $("#phone").mask("+7(999) 999-99-99");
            $("#phone-1").mask("+7(999) 999-99-99");

            $("#code").mask("9999");

            // $("#phone").pattern("^(\\([0-9]{3}\\)|[0-9]{3}-)[0-9]{3}-[0-9]{4}$\n");
        });
    </script>
    <script>
        var inputPass2 = document.getElementById('check-password'),
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
    </script>
    <script>
        $('#password, #check-password').on('keyup', function () {



            if ($('#password').val().length < 8) {
                $('#message1').html('Пароль должен быть не менее 8 символов').css('color', 'red');
                $('#send-button').prop('disabled', true);
                if ($('#password').val() == $('#check-password').val()) {
                    $('#message').html('Пароли совпадают').css('color', 'green');
                    // $('#send-button').prop('disabled', false);
                } else {
                    $('#send-button').prop('disabled', true);
                    $('#message').html('Пароли не совпадают').css('color', 'red');
                }
            } else {
                $('#send-button').prop('disabled', false);
                $('#message1').html('Пароль должен быть не менее 8 символов').css('color', 'green');
                if ($('#password').val() == $('#check-password').val()) {
                    $('#message').html('Пароли совпадают').css('color', 'green');
                    $('#send-button').prop('disabled', false);
                } else {
                    $('#send-button').prop('disabled', true);
                    $('#message').html('Пароли не совпадают').css('color', 'red');
                }
            }

        });
    </script>

    <script>
        function sendPhone() {

            var phone = document.getElementById("phone").value;
             var valid;
            document.getElementById("phone-1").value = phone;

           valid =   $.ajax(
               {
                    method: "get",
                    url: "{{route('send.phone.post')}}",
                    async: false,
                    data: {
                        phone: phone
                    },
                    success: function(data) {
                        if($.isEmptyObject(data.error)){

                        }else{
                            $.each(data.error, function(key,value) {
                                toastr.error(value);

                            });

                        }
                    }

                });
           if(valid.responseJSON.success){
               return true;
           }else{
               return false;
           }
        }
    </script>

    <script>

    </script>
    <script>
        function setPassword() {

            var phone = document.getElementById("phone-1").value;
            var code = document.getElementById("code").value;
            var pswd = document.getElementById("password").value;
            var cpwsd = document.getElementById("check-password").value;


            var valid;

            valid =   $.ajax(
                {
                    method: "get",
                    url: "{{route('set.password.post')}}",
                    async: false,
                    data: {
                        phone: phone,
                        code:code,
                        password:pswd,
                        password_confirmation:cpwsd

                    },
                    success: function(data) {
                        if($.isEmptyObject(data.error)){

                        }else{
                            $.each(data.error, function(key,value) {
                                toastr.error(value);

                            });

                        }
                    }

                });
            if(valid.responseJSON.success){
                window.location.href = "{{route('profile')}}"
            }
        }
    </script>
@endsection

