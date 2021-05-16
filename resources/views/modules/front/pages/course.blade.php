@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/course.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/course_responsive.css')}}">
@endsection

@section('content')
    <div class="back_links">
        <a href="{{route('index')}}">Главная –</a>
        <a href="{{route('courses')}}">Каталог курсов -</a>
        <a href="{{route('courses')}}">Название курса</a>
    </div>
    <section class="head_course">
        <img src="{{asset('modules/front/assets/img/girl2.png')}}" alt="">
        <div class="container-fluid">
            <div class="row">
                <h1 class="col-8">Основы маркетинга</h1>
                <p class="col-8">20 уроков | 15 часов</p>
                <p class="col-8">Спикер: Аскаров Кайрат</p>
                <div class="col-9 col-md-12">
                    <a class="btn btn-orange mt-3" href="#">Начать
                        обучение</a>
                </div>
            </div>
        </div>
    </section>
    <section class="auditory">
        <div class="container-fluid">
            <h1>Кому подойдет этот курс?</h1>
            <p>
                <span class="dots fas fa-circle fa-xs"></span>
                <span class="dots fas fa-circle fa-xs"></span>
                <span class="dots fas fa-circle fa-xs"></span>
            </p>
            <div class="row justify-content-between">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1>Начинающих маркетологов</h1>
                            <p>Если нужен текст</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1>Начинающих маркетологов</h1>
                            <p>Если нужен текст</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1>Начинающих маркетологов</h1>
                            <p>Если нужен текст</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1>Начинающих маркетологов</h1>
                            <p>Если нужен текст</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="talents">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <h1>Чем занимается маркетолог?</h1>
                </div>
                <div class="col-11 col-md-8 col-lg-8">
                    <p class="pt-1 pb-4">
                        <span class="dots fas  fa-circle fa-xs"></span>
                        <span class="dots fas  fa-circle fa-xs"></span>
                        <span class="dots fas  fa-circle fa-xs"></span>
                    </p>
                    <div class="description-text">
                        <p>
                            Продакт-маркетолог помогает бизнесу формулировать ценность
                            продукта. Главная задача специалиста — не продать, а донести
                            эту ценность до коллег и пользователя.
                            Для этого он изучает потребности и боли целевой аудитории,
                            собирает инсайты и передаёт информацию всем участникам команды.
                            На этом курсе мы дадим ключевые знания для работы в новой
                            профессии и развития в карьере.
                        </p>
                    </div>
                </div>
            </div>
            <div class="pt-5 pt-md-3 d-flex">
                <a class="btn-orange" href="#">Начать обучение</a>
            </div>
        </div>
    </section>
    <section class="skills">
        <div class="container-fluid">
            <h1>Чему научишься на курсе</h1>
            <p>
                <span class="dots fas fa-circle fa-xs"></span>
                <span class="dots fas fa-circle fa-xs"></span>
                <span class="dots fas fa-circle fa-xs"></span>
            </p>

            <div class="row justify-content-between">
                <div class="skills__card__content mb-2 col-md-6 col-lg-4 mb-4">
                    <h1>Изучать и анализировать аудиторию</h1>
                    <p>Понимать основы сегментирования ЦА,<br>
                        составлять портреты клиентов и пр.</p>
                </div>
                <div class="skills__card__content mb-2 col-md-6 col-lg-4 mb-4">
                    <h1>Изучать и анализировать аудиторию</h1>
                    <p>Понимать основы сегментирования ЦА,<br>
                        составлять портреты клиентов и пр.</p>
                </div>
                <div class="skills__card__content mb-2 col-md-6 col-lg-4 mb-4">
                    <h1>Изучать и анализировать аудиторию</h1>
                    <p>Понимать основы сегментирования ЦА,<br>
                        составлять портреты клиентов и пр.</p>
                </div>
                <div class="skills__card__content mb-2 col-md-6 col-lg-4 mb-4">
                    <h1>Изучать и анализировать аудиторию</h1>
                    <p>Понимать основы сегментирования ЦА,<br>
                        составлять портреты клиентов и пр.</p>
                </div>
                <div class="skills__card__content mb-2 col-md-6 col-lg-4 mb-4">
                    <h1>Изучать и анализировать аудиторию</h1>
                    <p>Понимать основы сегментирования ЦА,<br>
                        составлять портреты клиентов и пр.</p>
                </div>
                <div class="skills__card__content mb-2 col-md-6 col-lg-4 mb-4">
                    <h1>Изучать и анализировать аудиторию</h1>
                    <p>Понимать основы сегментирования ЦА,<br>
                        составлять портреты клиентов и пр.</p>
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
                        30 <label>уроков</label>
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
