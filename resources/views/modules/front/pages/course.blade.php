@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
@endsection

@section('content')
    <section class="head_course d-block   pb-5 mb-5">
        <div class="container">
            <p class="pt-4 pb-5">Главная – <a href="{{route('courses')}}">Каталог курсов</a> –
                Основы маркетинга</p>

            <h1 class="pb-5">Основы маркетинга</h1>
            <h3 class="pb-3">20 уроков |  15 часов</h3>
            <h3 class="pb-5">Спикер: Аскаров Кайрат</h3>
            <a class="btn-orange " href="#">Начать обучение</a>

        </div>
    </section>
    <section class="auditory pt-5">
        <div class="container p-4">
            <h1>Кому подойдет этот курс?</h1>
            <p class="pt-2 pb-4"><span class="dots fas  fa-circle"></span>&nbsp&nbsp
                <span class="dots fas  fa-circle"></span>&nbsp&nbsp
                <span class="dots fas  fa-circle"></span>
            </p>
            <div class="auditory__content row">
                <div class="auditory__card  col-md-6 mb-4">
                    <div class="auditory__card__content col-md-12">
                        <div class=" p-4 col-10">
                            <h1>Начинающих маркетологов</h1>
                        </div>
                    </div>
                </div>
                <div class="auditory__card  col-md-6 mb-4">
                    <div class="auditory__card__content col-md-12">
                        <div class="dir_text p-4 col-10">
                            <h1>Начинающих маркетологов</h1>
                        </div>
                    </div>
                </div>
                <div class="auditory__card  col-md-6 mb-4">
                    <div class="auditory__card__content col-md-12">
                        <div class="dir_text p-4 col-10">
                            <h1>Для тех, кому это нужно</h1>
                        </div>
                    </div>
                </div>
                <div class="auditory__card  col-md-6 mb-4">
                    <div class="auditory__card__content col-md-12">
                        <div class="dir_text p-4 col-10">
                            <h1>Для тех, кому это нужно</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="talents pt-5 pb-2">
        <div class="container p-4">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                    <h1>Чем занимается маркетолог?</h1>
                    <p class="pt-2 pb-4"><span class="dots fas  fa-circle"></span>&nbsp&nbsp
                        <span class="dots fas  fa-circle"></span>&nbsp&nbsp
                        <span class="dots fas  fa-circle"></span>
                    </p>
                    <p>
                        Продакт-маркетолог помогает бизнесу формулировать ценность<br>
                        продукта. Главная задача специалиста — не продать, а донести<br>
                        эту ценность до коллег и пользователя.<br>
                        Для этого он изучает потребности и боли целевой аудитории,<br>
                        собирает инсайты и передаёт информацию всем участникам команды.<br>
                        На этом курсе мы дадим ключевые знания для работы в новой<br>
                        профессии и развития в карьере.
                    </p>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div>
                        <img
                            src="{{asset('modules/front/assets/img/girl1.png')}}"
                            alt="" width="300" height="300">
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <a class="btn-orange" href="#">Начать обучение</a>
            </div>
        </div>
    </section>
    <section class="skills pt-5 mb-5">
        <div class="container p-4">
            <h1>Чему научишься на курсе</h1>
            <p class="pt-2 pb-4"><span class="dots fas  fa-circle"></span>&nbsp&nbsp
                <span class="dots fas  fa-circle"></span>&nbsp&nbsp
                <span class="dots fas  fa-circle"></span>
            </p>

            <div class="skills__content row">
                <div class="skills__card mb-2 col-md-4 mb-4">
                    <div class="skills__card__content col-md-12">
                        <h1>Изучать и анализировать аудиторию</h1>
                        <p>Понимать основы сегментирования ЦА,<br>
                                составлять портреты клиентов и пр.</p>
                    </div>
                </div>
                <div class="skills__card mb-2 col-md-4 mb-4">
                    <div class="skills__card__content col-md-12">
                        <h1>Изучать и анализировать аудиторию</h1>
                        <p>Понимать основы сегментирования ЦА,<br>
                            составлять портреты клиентов и пр.</p>
                    </div>
                </div>
                <div class="skills__card  mb-2 col-md-4 mb-4">
                    <div class="skills__card__content col-md-12">
                        <h1>Изучать и анализировать аудиторию</h1>
                        <p>Понимать основы сегментирования ЦА,<br>
                            составлять портреты клиентов и пр.</p>
                    </div>
                </div>
                <div class="skills__card  mb-2 col-md-4 mb-4">
                    <div class="skills__card__content col-md-12">
                        <h1>Изучать и анализировать аудиторию</h1>
                        <p>Понимать основы сегментирования ЦА,<br>
                            составлять портреты клиентов и пр.</p>
                    </div>
                </div>
                <div class="skills__card  mb-2 col-md-4 mb-4">
                    <div class="skills__card__content col-md-12">
                        <h1>Изучать и анализировать аудиторию</h1>
                        <p>Понимать основы сегментирования ЦА,<br>
                            составлять портреты клиентов и пр.</p>
                    </div>
                </div>
                <div class="skills__card  mb-2 col-md-4 mb-4">
                    <div class="skills__card__content col-md-12">
                        <h1>Изучать и анализировать аудиторию</h1>
                        <p>Понимать основы сегментирования ЦА,<br>
                            составлять портреты клиентов и пр.</p>
                    </div>
                </div>

            </div>
            <div class="start_learning pt-4">
                        <a class="btn-orange" href="#">Начать обучение</a>
            </div>
        </div>
    </section>
    <section class="price">
        <div class="container">
            <h1>Стоимость</h1>
            <p class="pt-2 pb-4"><span class="dots fas  fa-circle"></span>&nbsp&nbsp
                <span class="dots fas  fa-circle"></span>&nbsp&nbsp
                <span class="dots fas  fa-circle"></span>
            </p>
            <div class="row mt-3 mb-3">
                <div class="price_card_1 col-md-3">
                    <p>
                        Стоимость курса
                    </p>
                    <h3>
                        30 000 KZT
                    </h3>
                </div>
                <div class="price_card_2 col-md-3">
                    <p>
                        Что ты получишь
                    </p>
                    <h3>
                        30  <label>уроков</label>
                    </h3>
                </div>
            </div>
            <div class="pt-5">
                <a class="btn-orange " href="#">Купить подписку</a>
            </div>


        </div>
    </section>
    <section class="subscribe">
        <div class="container-fluid">
            <h1>Подпишись на нашу рассылку</h1>
            <div class="row align-items-center">
                <div class="col-12 col-lg-7 col-xl-8">
                    <p class="pt-2 pb-4">
                        <span class="dots fas fa-circle fa-xs"></span>
                        <span class="dots fas fa-circle fa-xs"></span>
                        <span class="dots fas fa-circle fa-xs"></span>
                    </p>
                    <p>
                        Раз в месяц мы делимся удивительными находками,<br>
                        веселыми и интересными курсами от наших авторов, а также приятными<br>
                        скидками и подарками.
                    </p>
                    <p>
                        Подпишись на наши рассылки и держи руку на пульсе.<br>
                        Кто его знает, может лишь одно письмо станет отправной точкой<br>
                        к твоей головокружительной карьере
                    </p>
                </div>
                <div class="col-12 col-md-8 col-lg-5 col-xl-4">
                    <div class="subscription_form">
                        <form action="{{route('send.email')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" class="form-control email_text" name="email"
                                       placeholder="Твой e-mail" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-orange btn-block">
                                    Подписаться на рассылку
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

    <script type="text/javascript">

    </script>
@endsection
