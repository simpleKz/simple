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
                <p class="pb-5"><a href="{{route('index')}}">Главная</a> – Каталог курсов</p>
                <h1>Курсы</h1>
                <div class="row pt-2">
                    <div class="col-md-6 col-lg-6">
                        <h2>Выберите направление в котором хотите развиваться</h2>
                    </div>
                    <div class="col-md-6 col-lg-6 text-right">
                        <h3>Сортировать по:<div class="list">
                                @if(request()->has('sort'))
                                    @if(request('sort')== 'price')
                                        <span class="placeholder">цене</span>
                                        @else
                                        <span class="placeholder">новизне</span>
                                    @endif()
                                    @else
                                    <span class="placeholder">популярности</span>
                                @endif()


                                    <ul class="list__ul">
                                    @if(!request()->route('slug'))
                                        <li><a href="{{route('courses')}}">популярности</a></li>
                                        <li><a href="{{route('courses')."?sort=price"}}">цене</a></li>
                                        <li><a href="{{route('courses')."?sort=created_at"}}">новизне</a></li>
                                    @else
                                        <li><a href="{{route('courses',['slug' => $slug])}}">популярности</a></li>
                                        <li><a href="{{route('courses',['slug' => $slug])."?sort=price"}}">цене</a></li>
                                        <li><a href="{{route('courses',['slug' => $slug])."?sort=created_at"}}">новизне</a></li>
                                    @endif

                                </ul>
                            </div></h3>

                </div>
            </div>
            </div>
            <div class="courses__content row pt-5 ">
                <div class="course_categories col-12 col-md-3 col-lg-3">
                    <a class="cc" href="{{route('courses')}}">
                        <div @if(!request()->route('slug'))  class="course_category_active p-3"
                             @else class="course_category p-3"
                            @endif>
                            <h1>Все категории</h1>
                        </div>
                    </a>
                    @foreach($course_types as $course_type)
                        <a class="cc" href="{{route('courses',['slug' => $course_type->slug])}}">
                            <div @if($course_type->slug == request()->route('slug'))  class="course_category_active p-3"
                                 @else class="course_category p-3"
                                @endif>
                                <h1>{{$course_type->name}}</h1>
                            </div>
                        </a>
                        @endforeach
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
                    @if($courses->count()>0)
                    <div class="courses_cards row mt-4" id="courses_cards">
                        @foreach($courses as $course)
                            <div class="courses__card col-md-12 mb-4" id="cc">
                                <div class="courses__card_inner row ">
                                    <div class="course__card__video col-md-4 pt-3 pb-3">
                                            <iframe class="lesson_video"  src="{{$course->video_path}}" allowfullscreen>
                                            </iframe>
                                    </div>
                                    <div class="course__card__content col-md-8 p-3 row">
                                        <div class="col-md-12 row">
                                            <div class="col-md-7 col-lg-7">
                                                <h1>{{$course->name}}</h1>
                                                @php
                                                    $minutes=$course->lessons->sum('duration_in_minutes');
                                                    $hours = floor($minutes / 60).' ч';
                                                    $min = ($minutes -   floor($minutes / 60) * 60).' мин'

                                                @endphp
                                                <p>{{$course->author->first_name." ".$course->author->last_name}}
                                                    &nbsp&nbsp&nbsp&nbsp
                                                    {{$course->lessons->count()}} уроков |
                                                    @if($hours > 0 && $min > 0)
                                                      {{$hours." ".$min}}
                                                    @elseif($hours <= 0 && $min > 0)
                                                        {{$min}}
                                                    @elseif($hours > 0 && $min <= 0 )
                                                        {{$hours}}
                                                        @endif
                                                </p>
                                            </div>
                                            <div class="col-md-5 col-lg-5 text-right">
                                                <h1>{{$course->price}} T
                                                </h1>
                                                <div class="stars mb-4">
                                                    @php $rating = $course->rating; @endphp

                                                    @foreach(range(1,5) as $i)
                                                        <span class="fa-stack" style="width:1em">
                                                            <i class="star far fa-sm  fa-star fa-stack-1x"></i>
                                                            @if($rating > 0)
                                                                @if($rating>0.5)
                                                                    <i class="star fas fa-sm fa-star fa-stack-1x"></i>
                                                                @else
                                                                    <i class="star fas fa-sm fa-star-half fa-stack-1x"></i>
                                                                @endif
                                                            @endif
                                                            @php $rating--; @endphp
                                                        </span>
                                                     @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="description col-md-12">
                                            <p>
                                                @if(strlen($course->description) > 320)
                                                    {{substr($course->description,0 , 320) . '...'}}
                                                @else
                                                    {{$course->description}}
                                                @endif
                                            </p>
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
                            @endforeach
{{--                        <div class="courses__card col-md-12 mb-4">--}}
{{--                            <div class="courses__card_inner row ">--}}
{{--                                <div class="course__card__video col-md-4">--}}
{{--                                    <div class="earn_money_img">--}}
{{--                                        <img--}}
{{--                                            src="{{asset('modules/front/assets/img/video.png')}}"--}}
{{--                                            alt="" >--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="course__card__content col-md-8 p-3 row">--}}
{{--                                    <div class="col-md-12 row">--}}
{{--                                        <div class="col-md-7 col-lg-7">--}}
{{--                                            <h1>Основы маркетинга</h1>--}}
{{--                                            <p>Аскаров Кайрат &nbsp&nbsp&nbsp&nbsp 20 уроков |  15 часов</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-5 col-lg-5 text-right">--}}
{{--                                            <h1>20 000 T</h1>--}}
{{--                                            <div class="stars mb-4">--}}
{{--                                                <i class="star fa fa-sm fa-star"></i>--}}
{{--                                                <i class="star fa fa-sm fa-star"></i>--}}
{{--                                                <i class="star fa fa-sm fa-star"></i>--}}
{{--                                                <i class="star fa fa-sm fa-star"></i>--}}
{{--                                                <i class="star fa fa-sm fa-star"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="description col-md-12">--}}
{{--                                        <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать--}}
{{--                                            несколько абзацев более менее осмысленного текста рыбы на русском языке,--}}
{{--                                            а начинающему оратору отточить навык публичных выступлений--}}
{{--                                            в домашних условиях.</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12 row">--}}
{{--                                        <div class="  button-more-info col-md-3">--}}
{{--                                            <a class="btn-orange pt-2 pb-2 pr-3 pl-3 " href="#">Подробнее</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="button-buy col-md-5">--}}
{{--                                            <a class="btn-orange pt-2 pb-2 pr-3 pl-3 " href="#">Купить курс</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="courses__card col-md-12 mb-4">--}}
{{--                            <div class="courses__card_inner row ">--}}
{{--                                <div class="course__card__video col-md-4">--}}
{{--                                    <div class="earn_money_img">--}}
{{--                                        <img--}}
{{--                                            src="{{asset('modules/front/assets/img/video.png')}}"--}}
{{--                                            alt="" >--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="course__card__content col-md-8 p-3 row">--}}
{{--                                    <div class="col-md-12 row">--}}
{{--                                        <div class="col-md-7 col-lg-7">--}}
{{--                                            <h1>Основы маркетинга</h1>--}}
{{--                                            <p>Аскаров Кайрат &nbsp&nbsp&nbsp&nbsp 20 уроков |  15 часов</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-5 col-lg-5 text-right">--}}
{{--                                            <h1>20 000 T</h1>--}}
{{--                                            <div class="stars mb-4">--}}
{{--                                                <i class="star fa fa-sm fa-star"></i>--}}
{{--                                                <i class="star fa fa-sm fa-star"></i>--}}
{{--                                                <i class="star fa fa-sm fa-star"></i>--}}
{{--                                                <i class="star fa fa-sm fa-star"></i>--}}
{{--                                                <i class="star fa fa-sm fa-star"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="description col-md-12">--}}
{{--                                        <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать--}}
{{--                                            несколько абзацев более менее осмысленного текста рыбы на русском языке,--}}
{{--                                            а начинающему оратору отточить навык публичных выступлений--}}
{{--                                            в домашних условиях.</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12 row">--}}
{{--                                        <div class="  button-more-info col-md-3">--}}
{{--                                            <a class="btn-orange pt-2 pb-2 pr-3 pl-3 " href="#">Подробнее</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="button-buy col-md-5">--}}
{{--                                            <a class="btn-orange pt-2 pb-2 pr-3 pl-3 " href="#">Купить курс</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>

                        @if($courses->count() < $courses->total())
                            <div class="load_more text-center mt-3">
                                <a class="see-more btn-orange pt-2 pb-2 pr-5 pl-5" data-div="#courses_cards" data-page="2" data-link="page=" id="see-more">Загрузить еще</a>
                            </div>
                        @else


                            @endif


                </div>
                @else
                    <div class="courses_cards d-flex justify-content-center align-items-center mt-4 " id="courses_cards">
                        <label>Пока нет курсов =(</label>
                    </div>
                @endif
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
                            <a class=" btn-orange pr-5 pl-4 pt-3 pb-3" href="#">Подписаться на рассылку</a>
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
            console.log($(this)[0]);
            $(".placeholder").text($(this).text()).css("opacity", "1");

            console.log($(".list__ul").find("li").eq(index).html());
            // var a = $(".list__ul").find("li").eq(index).html();
            // var b = a.attr("href");
            $(".list__ul").find("li").eq(index).prependTo(".list__ul");
            $(".list__ul").toggle();
            // location.replace(window.location.href+'?sort=price');
            location.replace($(this)[0]);

        });

        $("select").on("change", function (e) {
            // Set text on placeholder hidden element
            $(".placeholder").text(this.value);
            location.replace(window.location.href+'?sort=price');

            // Animate select width as placeholder
            $(this).animate({ width: $(".placeholder").width() + "px" });
        });

    </script>
    <script>
        function checkCourses() {
            var see_more = document.getElementById("see-more");


            if(count >= total){
                see_more.remove();
            }
            // console.log(count);
            // console.log(total);



        }
    </script>
    <script src="{{asset('modules/front/assets/js/jquery.jscroll.min.js')}}"></script>

    <script type="text/javascript">
        var count = {{$courses->count()}}
        var total = {{$courses->total()}}
        $(function () {
            var $ul = $("ul.pagination");
            $ul.hide(); // Prevent the default Laravel paginator from showing, but we need the links...
                checkCourses();
            $pages = {{$courses->lastPage()}}
            $(".see-more").click(function () {
                count = count+2;
                checkCourses();
                if ($pages >= $(this).data('page')) {
                    $div = $($(this).data('div')); //div to append

                    if (window.location.href.indexOf("sort") > -1) {
                        $link = "&"+$(this).data('link'); //current URL
                    }else {
                        $link = "?"+$(this).data('link'); //current URL
                    }


                    $page = $(this).data('page'); //get the next page #

                    $href = window.location.href + $link + $page; //complete URL
                    console.log($href);
                    $.get($href, function (response) { //append data
                        $html = $(response).find("#courses_cards").html();
                        $div.append($html);
                    });
                    $(this).data('page', (parseInt($page) + 1)); //update page #

                }
                else{
                    $(this).remove()
                }
            });


        });
    </script>
@endsection
