@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <style>

    </style>
@endsection

@section('content')
    <section class="start_course">
        <div class="container">
            <h1>Освой новую профессию
                    <p>за 2 месяца</p></h1>
            <h3 class="mb-5">Обучайся с любой точки планеты и в один клик</h3>
            <a class="btn-orange " href="#">Начать обучение</a>

        </div>
    </section>
    <section class="recommendations ">
        <div class="container p-4 ">
            <div class="col-12 col-lg-4 col-md-6 mt-4 pl-auto pl-md-0 d-flex ">
                <div class="rec-img pr-3">
                    <img
                        src="{{asset('modules/front/assets/img/elipse.png')}}"
                        alt="default-user">
                </div>
                <div class="pr-0 mt-2">
                    <h5 class="mb-0"><b>Покупай курсы отдельно</b></h5>
                    <div class="rec">
                        <p>Выбирай только то, что тебе нужно</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-md-6 mt-4 pl-auto pl-md-0 d-flex ">
                <div class="rec-img pr-3">
                    <img
                        src="{{asset('modules/front/assets/img/elipse.png')}}"
                        alt="default-user">
                </div>
                <div class=" pr-0 mt-2">
                    <h5 class="mb-0"><b>Обучайся везде и всегда</b></h5>
                    <div class="rec">
                        <p>Между делом или же во время пробок</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-md-6 mt-4 pl-auto pl-md-0 d-flex ">
                <div class="rec-img pr-3">
                    <img
                        src="{{asset('modules/front/assets/img/elipse.png')}}"
                        alt="default-user">
                </div>
                <div class=" pr-0 mt-2">
                    <h5 class="mb-0"><b>Управляй курсами в один клик</b></h5>
                    <div class="rec">
                        <p>Находи все, что нужно в </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="directions pt-5">
        <div class="container p-4">
            <h1>Изучай актуальные направления</h1>
            <h3 class="mb-5">То, что сейчас в тренде и имеет большой спрос на рынке.</h3>
                <div class="directions__content row">
                    @foreach($course_types as $course_type)
                        <a class="directions__card  col-md-6 mb-2" href="{{route('courses',['slug' => $course_type->slug])}}">
                            <div class="directions__card__content col-md-12">
                                <div class="dir_text p-3 col-10">
                                    <h1>{{$course_type->name}}</h1>
                                    <p>Доступно {{$course_type->courses->count()}} курс(а)</p>
                                </div>
                                <div class="dir_circle pt-4 float-right">
                               <span class="read-more-circle-around">
                                        <i class="fa fa-arrow-right"></i>
                               </span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                </div>
            <div class="all-directions">
                <div class="all-directions-text pt-4">
                    <a href="{{route('courses')}}">Все направления</a>
                    <p class="text-center"><span class="dots fas  fa-circle"></span>&nbsp&nbsp
                        <span class="dots fas  fa-circle"></span>&nbsp&nbsp
                        <span class="dots fas  fa-circle"></span>
                    </p>

                </div>


            </div>

            </div>
    </section>
    <section class="talents pt-5 pb-2">
        <div class="container p-4">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                    <h1>Раскрой свои таланты</h1>
                    <p class="pt-2 pb-4"><span class="dots fas  fa-circle"></span>&nbsp&nbsp
                        <span class="dots fas  fa-circle"></span>&nbsp&nbsp
                        <span class="dots fas  fa-circle"></span>
                    </p>
                    <p>
                        Каждый из нас талантлив в чем-либо.<br>
                        Но многие проживают свою жизнь занимаясь другим делом :(
                    </p>
                    <p>
                        <span>Наша миссия</span> - помочь каждом найти свое истинное предназначение.
                    </p>
                    <p>
                        А что для этого необходимо сделать?<br>
                        - Правильно! Начать пробовать себя в том, что вам интересно!
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
                <a class="btn-orange" href="#">Самое время начать</a>
            </div>
        </div>
    </section>
    <section class="strengths pt-5 pb-5 mb-5">
        <div class="container p-4">
            <div class="row">
                <div class="girl_img col-12 col-md-4 col-lg-4">
                </div>
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="text-right">
                    <h1>Развивай свои сильные стороны</h1>
                        <div class="pr-4 text-right">
                    <p class="pt-2 pb-4"><span class="dots fas  fa-circle"></span>&nbsp&nbsp
                        <span class="dots fas  fa-circle"></span>&nbsp&nbsp
                        <span class="dots fas  fa-circle"></span>
                    </p>
                    <p>
                        Ты уже нашел то, что тебе нравится?<br>
                        Это очень и очень круто! Ведь у большинства его попросту нет
                    </p>
                    <p>
                        Теперь пора развивать свои сильные стороны.<br>
                        Учись у лучших экспертов в твоем деле и перенимай их опыт!
                    </p>
                    <div class="pt-5">
                        <a class="btn-orange" href="#">Начну прямо сейчас</a>
                    </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="earn_money mt-5 pt-5 pb-5">
        <div class="container p-4">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 pr-0">
                    <h1 class="pb-2">Зарабатывай на своем обучении</h1>
                    <p>Учишься ты, а платим тебе мы! За что?</p>
                    <p class="pt-2 pb-4"><span class="dots fas  fa-circle"></span>&nbsp&nbsp
                        <span class="dots fas  fa-circle"></span>&nbsp&nbsp
                        <span class="dots fas  fa-circle"></span>
                    </p>
                    <p>Все просто.
                    </p>
                    <p>
                        Приглашай друзей по своей реферальной ссылке и помоги<br>
                        им найти свое предназначение!
                    </p>
                    <p>
                        Как только твой друг купит подписку, мы вознаградим тебя<br>
                        за твое благородное дело!
                    </p>
                </div>
                <div class="col-12 col-md-4 col-lg-4 d-flex align-items-center pr-0 pl-0">
                        <div class="earn_money_img">
                        <img
                            src="{{asset('modules/front/assets/img/notebook1.png')}}"
                            alt=""  >
                        </div>
                </div>
            </div>
            <div class="pt-5">
                <a class="btn-orange" href="#">Начни зарабатывать</a>
            </div>
        </div>
    </section>
    <section class="authors pt-5">
        <div class="container p-4">
            <h1 class="pb-2">Учись у лучших</h1>
            <p class="pt-2 pb-4"><span class="dots fas  fa-circle"></span>&nbsp&nbsp
                <span class="dots fas  fa-circle"></span>&nbsp&nbsp
                <span class="dots fas  fa-circle"></span>
            </p>
            <p>Наши авторы - эксперты своего дела, потратившие тысячи часов<br>
                на развитие своих навыков.
            </p>
            <div class="authors__content pt-5 pb-5 row">
                <div class="authors__card  col-md-2 mb-2">
                    <div class="authors__card__content col-md-12 row">
                        <div class="authors_info justify-content-center">
                                <div class="authors_img">
                                    <img src="{{asset('modules/front/assets/img/author.png')}}"
                                        alt="" >
                                </div>
                            <h1 class="pt-3 pb-2">Кайрат Аскаров</h1>
                            <h2>#UX/UIDesign</h2>
                            <h2>#Branding</h2>
                        </div>
                    </div>
                </div>
                <div class="authors__card  col-md-2 mb-2">
                    <div class="authors__card__content col-md-12 row">
                        <div class="authors_info">
                            <div class="authors_img">
                                <img
                                    src="{{asset('modules/front/assets/img/author.png')}}"
                                    alt="" >
                            </div>
                            <h1 class="pt-3 pb-2">Кайрат Аскаров</h1>
                            <h2>#Маркетинг</h2>
                        </div>
                    </div>
                </div>
                <div class="authors__card  col-md-2 mb-2">
                    <div class="authors__card__content col-md-12 row">
                        <div class="authors_info">
                            <div class="authors_img">
                                <img
                                    src="{{asset('modules/front/assets/img/author.png')}}"
                                    alt="" >
                            </div>
                            <h1 class="pt-3 pb-2">Кайрат Аскаров</h1>
                            <h2>#Видеография</h2>
                        </div>
                    </div>
                </div>
                <div class="authors__card  col-md-2 mb-2">
                    <div class="authors__card__content col-md-12 row">
                        <div class="authors_info">
                            <div class="authors_img">
                                <img
                                    src="{{asset('modules/front/assets/img/author.png')}}"
                                    alt="" >
                            </div>
                            <h1 class="pt-3 pb-2">Кайрат Аскаров</h1>
                            <h2>#Финансы</h2>
                        </div>
                    </div>
                </div>
                <div class="authors__card  col-md-2 mb-2">
                    <div class="authors__card__content col-md-12 row">
                        <div class="authors_info">
                            <div class="authors_img">
                                <img
                                    src="{{asset('modules/front/assets/img/author.png')}}"
                                    alt="" >
                            </div>
                            <h1 class="pt-3 pb-2">Кайрат Аскаров</h1>
                            <h2>#PR</h2>
                        </div>
                    </div>
                </div>
                <div class="authors__card  col-md-2 mb-2">
                    <div class="authors__card__content col-md-12 row">
                        <div class="authors_info">
                            <div class="authors_img">
                                <img
                                    src="{{asset('modules/front/assets/img/author.png')}}"
                                    alt="" >
                            </div>
                            <h1 class="pt-3 pb-2">Кайрат Аскаров</h1>
                            <h2>#Программирование</h2>
                        </div>
                    </div>
                </div>
            </div>
            <p>Все еще думаешь?
            </p>
            <div class="pt-4">
                <a class="btn-orange" href="#">Начну прямо сейчас</a>
            </div>
            <div class="its_simple col-md-12 col-12 p-5">
                <img src="{{asset('modules/front/assets/img/itsSimple.png')}}" alt="" />
            </div>
        </div>
    </section>
    <section class="subscribe pb-5">
        <div class="container p-4">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                    <h1>Подпишись на нашу рассылку</h1>
                    <p class="pt-2 pb-4"><span class="dots fas  fa-circle"></span>&nbsp&nbsp
                        <span class="dots fas  fa-circle"></span>&nbsp&nbsp
                        <span class="dots fas  fa-circle"></span>
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
                <div class="col-12 col-md-4 col-lg-4 d-flex align-items-center">
                    <div class="subscription_form">
                    <input type="text" class=" form-control email_text  pr-5 pl-3 pt-3 pb-3 mb-4" name="title" id="" placeholder="Твой e-mail" required>
                    <div>

                    <a class="btn-orange pr-5 pl-4 pt-3 pb-3" href="#">Подписаться на рассылку</a>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{asset('modules/front/assets/js/purecounter.js')}}"></script>
    <script src="{{asset('modules/front/assets/js/swiper.min.js')}}"></script>
    <script type="text/javascript">

    </script>
@endsection
