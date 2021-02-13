@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/index_responsive.css')}}">
    <style>

    </style>
@endsection

@section('content')
    <section class="start_course">
        <div class="owl-carousel">
            <div class="item">
                <img class="slider-img" src="{{asset('modules/front/assets/img/index_img.png')}}" alt="">
                <div class="row col-12 col-md-11 col-lg-9 col-xl-6 offset-0 offset-md-0 offset-lg-1 slider-body">
                    <h1 class="col-12">Освой новую профессию <br>за 2 месяца</h1>
                    <h3 class="col-12">Слайдер 2</h3>
                    <div class="col-12">
                        <a class="btn btn-orange mt-3" href="#">Начать обучение</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img class="slider-img" src="{{asset('modules/front/assets/img/index_img.png')}}" alt="">
                <div class="row col-12 col-md-11 col-lg-9 col-xl-6 offset-0 offset-md-0 offset-lg-1 slider-body">
                    <h1 class="col-12">Освой новую профессию <br>за 2 месяца</h1>
                    <h3 class="col-12">Слайдер 1</h3>
                    <div class="col-12">
                        <a class="btn btn-orange mt-3" href="#">Начать обучение</a>
                    </div>
                </div>
            </div>
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
                    <a class="directions__card  col-md-6 mb-2"
                       href="{{route('courses',['slug' => $course_type->slug])}}">
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
                <div class="girl1_img col-12 col-md-4 col-lg-4">
                    {{--                    <div class="">--}}
                    {{--                        <img--}}
                    {{--                            src="{{asset('modules/front/assets/img/girl1.png')}}"--}}
                    {{--                            alt="" width="300" height="300">--}}
                    {{--                    </div>--}}
                    &nbsp
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
                    &nbsp
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
        <div class="container">
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
                            alt="">
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <a class="btn-orange" href="#">Начни зарабатывать</a>
            </div>
        </div>
    </section>
    <section class="authors pt-5">
        <div class="container">
            <h1 class="pb-2">Учись у лучших</h1>
            <p class="pt-2 pb-2">
                <span class="dots fas fa-circle fa-xs"></span>
                <span class="dots fas fa-circle fa-xs"></span>
                <span class="dots fas fa-circle fa-xs"></span>
            </p>
            <p>Наши авторы - эксперты своего дела, потратившие тысячи часов<br>
                на развитие своих навыков.
            </p>
            <div class="all-authors">
                <a href="#">Все спикеры</a>
            </div>
            <div class="owl-carousel authors-carousel pt-5 pb-5">
                @foreach($authors as $author)
                    <div class="item">
                        <div class="card">
                            <div class="card-body">
                                <div class="authors_img">
                                    <img src="{{asset($author->image_path)}}" alt="Фото автора"
                                         onerror="this.src='{{asset('images/notfound.png')}}'">
                                </div>
                                <div class="author-info">
                                    <p class="name">{{$author->fullName()}}</p>
                                    <span class="fas fa-circle fa-xs"></span>
                                    <span class="fas fa-circle fa-xs"></span>
                                    <span class="fas fa-circle fa-xs"></span>
                                    <p class="description">{{$author->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <p>Все еще думаешь?
            </p>
            <div class="pt-4">
                <a class="btn-orange" href="#">Начну прямо сейчас</a>
            </div>
            <div class="its_simple col-md-12 col-sm-12 p-5">
                {{--                <img src="{{asset('modules/front/assets/img/itsSimple.png')}}" alt="" />--}}
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
                        <form action="{{route('send.email')}}" method="post">
                            {{csrf_field()}}

                            <input type="text" class=" form-control email_text  pr-5 pl-3 pt-3 pb-3 mb-4" name="email"
                                   placeholder="Твой e-mail" required>
                            <div>

                                <button type="submit" class="btn-orange pr-5 pl-4 pt-3 pb-3">Подписаться на рассылку
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
    <script src="{{asset('modules/front/assets/js/purecounter.js')}}"></script>
    <script src="{{asset('modules/front/assets/js/swiper.min.js')}}"></script>
    <script type="text/javascript">
        $('.authors-carousel').owlCarousel({
            loop: false,
            margin: 40,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });


    </script>
@endsection
