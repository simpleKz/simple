@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <style>


        .list {
            display: inline-block;
            position: relative;
            margin-left: 6px;
        }
        .list ul {
            text-align: left;
            position: absolute;
            padding: 0;
            top: 0;
            left: 0;
            display: none;
        }
        .list ul .active {
            display: block;
        }
        .list li {
            list-style: none;
        }
        .list a {
            transition: all 0.4s;
            color: #050606;
            position: relative;
        }
        select {
            display: inline;
            border: 0;
            width: auto;
            margin-left: 10px;
            outline: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            border-bottom: 2px solid #555;
            transition: all 0.4s ease-in-out;
        }
        select:hover {
            cursor: pointer;
        }
        select option {
            border: 0;
            border-bottom: 1px  #555;
            padding: 10px;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .placeholder {
            border-bottom: 4px solid;
            cursor: pointer;
        }
        .placeholder:hover {
            color: #888888;
        }
    </style>
@endsection

@section('content')
    <section class="courses pb-5 mb-5">
        <div class="container p-4">
            <div class="course-header pt-5">
                <p class="pb-5">Главная – Каталог курсов</p>
                <h1>Курсы</h1>
                <div class="row pt-2">
                    <div class="col-md-6 col-lg-6">
                        <h2>Выберите направление в котором хотите развиваться</h2>
                    </div>
                    <div class="col-md-6 col-lg-6 text-right">
                        <h3>Сортировать по: <div class="list"><span class="placeholder">популярности</span>
                                <ul class="list__ul">
                                    <li><a href="">популярности</a></li>
                                    <li><a href="">популярности</a></li>
                                    <li><a href="">популярности</a></li>
                                </ul>
                            </div></h3>

                </div>
            </div>
            </div>
            <div class="courses__content row pt-5 ">
                <div class="course_categories col-12 col-md-3 col-lg-3">
                    <div class="course_category  p-3">
                        <h1>Все категории</h1>
                    </div>
                    <div class="course_category p-3">
                        <h1>Маркетинг</h1>
                    </div>
                    <div class="course_category p-3">
                        <h1>PR</h1>
                    </div>
                    <div class="course_category p-3">
                        <h1>Дизайн</h1>
                    </div>
                    <div class="course_category p-3">
                        <h1>Дизайн</h1>
                    </div>
                    <div class="course_category p-3">
                        <h1>Дизайн</h1>
                    </div>
                    <div class="course_category p-3">
                        <h1>Дизайн</h1>
                    </div>
                    <div class="course_category p-3">
                        <h1>Дизайн</h1>
                    </div>
                </div>
                <div class="col-12 col-md-9 col-lg-9  ">
                    <div class="banner row ">
                        <div class="col-12 col-md-5 d-flex align-items-center">
                            <div>
                                <h1>Все курсы по маркетингу
                                    за единую подписку</h1>
                                <p>
                                    Экономия 125 000 Т
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 d-flex align-items-center">
                            <div>
                                <a class="btn-orange pr-4 pl-4 pt-3 pb-3" href="#">Купить подписку прямо сейчас</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-3  d-flex align-items-center">
                            <div class=" pt-4 pl-4">
                                <h2>20 000 T</h2>
                                <p>
                                    <strike>Вместо 145 000 Т</strike>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="courses_cards row mt-4">
                        <div class="courses__card col-md-12 mb-4">
                            <div class="courses__card_inner row ">
                                <div class="course__card__video col-md-4">
                                    <div class="earn_money_img">
                                        <img
                                            src="{{asset('modules/front/assets/img/video.png')}}"
                                            alt="" >
                                    </div>
                                </div>
                                <div class="course__card__content col-md-8 p-3 row">
                                    <div class="col-md-12 row">
                                        <div class="col-md-7 col-lg-7">
                                            <h1>Основы маркетинга</h1>
                                            <p>Аскаров Кайрат &nbsp&nbsp&nbsp&nbsp 20 уроков |  15 часов</p>
                                        </div>
                                        <div class="col-md-5 col-lg-5 text-right">
                                            <h1>20 000 T</h1>
                                            <div class="stars mb-4">
                                                <i class="star fa fa-sm fa-star"></i>
                                                <i class="star fa fa-sm fa-star"></i>
                                                <i class="star fa fa-sm fa-star"></i>
                                                <i class="star fa fa-sm fa-star"></i>
                                                <i class="star fa fa-sm fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="description col-md-12">
                                        <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                                            несколько абзацев более менее осмысленного текста рыбы на русском языке,
                                            а начинающему оратору отточить навык публичных выступлений
                                            в домашних условиях.</p>
                                    </div>
                                    <div class="col-md-12 row">
                                        <div class="  button-more-info col-md-3">
                                            <a class="btn-orange pt-2 pb-2 pr-3 pl-3 " href="#">Подробнее</a>
                                        </div>
                                        <div class="button-buy col-md-5">
                                            <a class="btn-orange pt-2 pb-2 pr-3 pl-3 " href="#">Купить курс</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="courses__card col-md-12 mb-4">
                            <div class="courses__card_inner row ">
                                <div class="course__card__video col-md-4">
                                    <div class="earn_money_img">
                                        <img
                                            src="{{asset('modules/front/assets/img/video.png')}}"
                                            alt="" >
                                    </div>
                                </div>
                                <div class="course__card__content col-md-8 p-3 row">
                                    <div class="col-md-12 row">
                                        <div class="col-md-7 col-lg-7">
                                            <h1>Основы маркетинга</h1>
                                            <p>Аскаров Кайрат &nbsp&nbsp&nbsp&nbsp 20 уроков |  15 часов</p>
                                        </div>
                                        <div class="col-md-5 col-lg-5 text-right">
                                            <h1>20 000 T</h1>
                                            <div class="stars mb-4">
                                                <i class="star fa fa-sm fa-star"></i>
                                                <i class="star fa fa-sm fa-star"></i>
                                                <i class="star fa fa-sm fa-star"></i>
                                                <i class="star fa fa-sm fa-star"></i>
                                                <i class="star fa fa-sm fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="description col-md-12">
                                        <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                                            несколько абзацев более менее осмысленного текста рыбы на русском языке,
                                            а начинающему оратору отточить навык публичных выступлений
                                            в домашних условиях.</p>
                                    </div>
                                    <div class="col-md-12 row">
                                        <div class="  button-more-info col-md-3">
                                            <a class="btn-orange pt-2 pb-2 pr-3 pl-3 " href="#">Подробнее</a>
                                        </div>
                                        <div class="button-buy col-md-5">
                                            <a class="btn-orange pt-2 pb-2 pr-3 pl-3 " href="#">Купить курс</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="load_more text-center mt-3">
                        <a class="btn-orange pt-2 pb-2 pr-5 pl-5 " href="#">Загрузить еще</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="subscribe pb-5 pt-5">
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

    <script type="text/javascript">
        console.clear();

        var el = {};

        $(".placeholder").on("click", function (ev) {
            $(".placeholder").css("opacity", "0");
            $(".list__ul").toggle();
        });

        $(".list__ul a").on("click", function (ev) {
            ev.preventDefault();
            var index = $(this).parent().index();

            $(".placeholder").text($(this).text()).css("opacity", "1");

            console.log($(".list__ul").find("li").eq(index).html());

            $(".list__ul").find("li").eq(index).prependTo(".list__ul");
            $(".list__ul").toggle();
        });

        $("select").on("change", function (e) {
            // Set text on placeholder hidden element
            $(".placeholder").text(this.value);

            // Animate select width as placeholder
            $(this).animate({ width: $(".placeholder").width() + "px" });
        });

    </script>
@endsection
