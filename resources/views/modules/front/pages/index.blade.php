@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/index.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/index_responsive.css')}}">
@endsection

@section('content')
    <section class="start_course">
        <div class="owl-carousel">
            @foreach($sliders as $slider)
                <div class="item">
                    <img class="slider-img" src="{{asset($slider->image_path)}}" alt="">
                    <div class="row col-12 col-md-11 col-lg-9 col-xl-6 offset-0 offset-md-0 offset-lg-1 slider-body">
                        <h1 class="col-11 col-md-12">{{$slider->title}}</h1>
                        <h3 class="col-9 col-md-12">{{$slider->description}}</h3>
                        <div class="col-9 col-md-12">
                            <a class="btn btn-orange mt-3" href="{{$slider->redirect_url}}" target="_blank">Начать
                                обучение</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="recommendations">
        <div class="container-fluid">
            <div class="col-12 col-lg-4 col-md-6 d-flex align-items-center justify-content-md-center recommendation">
                <img src="{{asset('modules/front/assets/img/open-book.png')}}"
                     alt="default-user">
                <div>
                    <h5>Покупай курсы отдельно</h5>
                    <p>Выбирай только то, что тебе нужно</p>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-md-6 d-flex align-items-center justify-content-md-center recommendation">
                <img src="{{asset('modules/front/assets/img/outline.png')}}"
                     alt="default-user">
                <div>
                    <h5>Обучайся везде и всегда</h5>
                    <p>Между делом или же во время пробок</p>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-md-12 d-flex align-items-center justify-content-md-center recommendation">
                <img src="{{asset('modules/front/assets/img/button.png')}}"
                     alt="default-user">
                <div>
                    <h5>Управляй курсами в один клик</h5>
                    <p>Находи все, что нужно в личном кабинете</p>
                </div>
            </div>
        </div>
    </section>

    <section class="directions">
        <div class="container-fluid">
            <h1>Изучай актуальные направления</h1>
            <h3 class="mb-lg-5 mb-4 mt-3">То, что сейчас в тренде и имеет большой спрос на рынке.</h3>
            <div class="directions__content row">
                @foreach($course_types as $course_type)
                    <a class="directions__card  col-lg-6 mb-2"
                       href="{{route('courses',['slug' => $course_type->slug])}}">
                        <div class="directions__card__content align-items-center d-flex col-12">
                            <div class="dir_text col-10">
                                <h1>{{$course_type->name}}</h1>
                                <p>Доступно {{$course_type->courses->count()}} курс(а)</p>
                            </div>
                            <div class="dir_circle col-2 text-right">
                               <span class="read-more-circle-around">
                                        <i class="fal fa-arrow-right"></i>
                               </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="all-directions pt-3 text-center">
                <a href="{{route('courses')}}">Все направления</a>
                <p class="pt-1">
                    <span class="dots fas fa-circle fa-xs"></span>
                    <span class="dots fas fa-circle fa-xs"></span>
                    <span class="dots fas fa-circle fa-xs"></span>
                </p>
            </div>
        </div>
    </section>
    <section class="talents">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <h1>Раскрой свои таланты</h1>
                </div>
                <div class="col-11 col-md-8 col-lg-8">
                    <p class="pt-1 pb-4">
                        <span class="dots fas  fa-circle fa-xs"></span>
                        <span class="dots fas  fa-circle fa-xs"></span>
                        <span class="dots fas  fa-circle fa-xs"></span>
                    </p>
                    <div class="description-text">
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
                </div>
            </div>
            <div class="pt-5 pt-md-3 d-flex">
                <a class="btn-orange" href="#">Самое время начать</a>
            </div>
        </div>
    </section>
    <section class="strengths">
        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="col-10 col-md-8 text-right">
                    <h1>Развивай свои сильные стороны</h1>
                    <p class="pt-2 pb-4">
                        <span class="dots fas fa-circle fa-xs"></span>
                        <span class="dots fas fa-circle fa-xs"></span>
                        <span class="dots fas fa-circle fa-xs"></span>
                    </p>
                    <div class="text-right description-text">
                        <p>
                            Ты уже нашел то, что тебе нравится?<br>
                            Это очень и очень круто!
                            Ведь у большинства его попросту нет
                        </p>
                        <p>
                            Теперь пора развивать свои сильные стороны.<br>
                            Учись у лучших экспертов в твоем деле и перенимай их опыт!
                        </p>
                    </div>
                </div>
                <div class="pt-5 col-12 d-flex justify-content-end">
                    <a class="btn-orange" href="#">Начну прямо сейчас</a>
                </div>
            </div>
        </div>
    </section>
    <section class="earn_money">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <h1 class="pb-2">Зарабатывай на своем обучении</h1>
                    <p>Учишься ты, а платим тебе мы! За что?</p>
                    <p class="pt-2 pb-4">
                        <span class="dots fas fa-circle fa-xs"></span>
                        <span class="dots fas fa-circle fa-xs"></span>
                        <span class="dots fas fa-circle fa-xs"></span>
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
                <div class="col-12 col-lg-4 justify-content-end order-2 order-lg-1">
                    <img
                        src="{{asset('modules/front/assets/img/notebook1.png')}}"
                        alt="">
                </div>
                <div class="col-12 pt-5 order-1 order-lg-2 d-flex">
                    <a class="btn-orange" href="#">Начни зарабатывать</a>
                </div>
            </div>

        </div>
    </section>
    <section class="authors">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <h1 class="pb-2">Учись у лучших</h1>
                    <p class="pt-2 pb-2">
                        <span class="dots fas fa-circle fa-xs"></span>
                        <span class="dots fas fa-circle fa-xs"></span>
                        <span class="dots fas fa-circle fa-xs"></span>
                    </p>
                    <p>Наши авторы - эксперты своего дела, потратившие тысячи часов
                        на развитие своих навыков.
                    </p>
                </div>
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
            <div class="row text-center text-md-left">
                <p class="col-12 still-thinking-text">Все еще думаешь?</p>
                <div class="pt-1 col-12 d-flex">
                    <a class="btn-orange" href="#">Начну прямо сейчас</a>
                </div>
            </div>
            {{--            <div class="its_simple col-md-12 col-sm-12 p-5">--}}
            {{--                <img src="{{asset('modules/front/assets/img/itsSimple.png')}}" alt="" />--}}
            {{--            </div>--}}
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
    <script src="{{asset('modules/front/assets/js/purecounter.js')}}"></script>
    <script src="{{asset('modules/front/assets/js/swiper.min.js')}}"></script>
    <script type="text/javascript">
        $('.authors-carousel').owlCarousel({
            margin: 40,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            nav: false,
            responsive: {
                0: {
                    items: 2,
                    margin: 240
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });

        $('.owl-carousel').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
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
