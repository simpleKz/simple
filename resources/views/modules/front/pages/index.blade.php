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
                    <div class="directions__card  col-md-6 mb-2">
                        <div class="directions__card__content col-md-12">
                            <div class="dir_text p-3 col-10">
                                <h1>Маркетинг</h1>
                                <p>Доступно 2 курса</p>
                            </div>
                            <div class="dir_circle pt-4 float-right">
                               <span class="read-more-circle-around">
                                        <i class="fa fa-arrow-right"></i>
                               </span>
                            </div>
                        </div>
                    </div>
                    <div class="directions__card  col-md-6 mb-2">
                        <div class="directions__card__content col-md-12">
                            <div class="dir_text p-3 col-10">
                                <h1>Видеография</h1>
                                <p>Доступно 2 курса</p>
                            </div>
                            <div class="dir_circle pt-4 float-right">
                               <span class="read-more-circle-around">
                                        <i class="fa fa-arrow-right"></i>
                               </span>
                            </div>
                        </div>
                    </div>
                    <div class="directions__card  col-md-6 mb-2">
                        <div class="directions__card__content col-md-12">
                            <div class="dir_text p-3 col-10">
                                <h1>Кулинария</h1>
                                <p>Доступно 2 курса</p>
                            </div>
                            <div class="dir_circle pt-4 float-right">
                               <span class="read-more-circle-around">
                                        <i class="fa fa-arrow-right"></i>
                               </span>
                            </div>
                        </div>
                    </div>
                    <div class="directions__card  col-md-6 mb-2">
                        <div class="directions__card__content col-md-12">
                            <div class="dir_text p-3 col-10">
                                <h1>Мобилография</h1>
                                <p>Доступно 2 курса</p>
                            </div>
                            <div class="dir_circle pt-4 float-right">
                               <span class="read-more-circle-around">
                                        <i class="fa fa-arrow-right"></i>
                               </span>
                            </div>
                        </div>
                    </div>
                    <div class="directions__card  col-md-6 mb-2">
                        <div class="directions__card__content col-md-12">
                            <div class="dir_text p-3 col-10">
                                <h1>Финансы</h1>
                                <p>Доступно 2 курса</p>
                            </div>
                            <div class="dir_circle pt-4 float-right">
                               <span class="read-more-circle-around">
                                        <i class="fa fa-arrow-right"></i>
                               </span>
                            </div>
                        </div>
                    </div>
                    <div class="directions__card  col-md-6 mb-2">
                        <div class="directions__card__content col-md-12">
                            <div class="dir_text p-3 col-10">
                                <h1>Дизайн</h1>
                                <p>Доступно 2 курса</p>
                            </div>
                            <div class="dir_circle pt-4 float-right">
                               <span class="read-more-circle-around">
                                        <i class="fa fa-arrow-right"></i>
                               </span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

{{--        </div>--}}
    </section>

@endsection

@section('scripts')
    <script src="{{asset('modules/front/assets/js/purecounter.js')}}"></script>
    <script src="{{asset('modules/front/assets/js/swiper.min.js')}}"></script>
    <script type="text/javascript">

    </script>
@endsection
