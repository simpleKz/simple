@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/courses.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/courses-responsive.css')}}">
@endsection

@section('content')
    <div class="back_links">
        <a href="{{route('index')}}">Главная –</a>
        <a href="{{route('courses')}}">Каталог курсов </a>
    </div>
    <section class="courses">
        <div class="container-fluid">
            <div class="course-header">
                <h1>Курсы</h1>
                <div class="row pt-2 align-items-center">
                    <div class="col-12 col-md-6">
                        <h2>Выберите направление в котором хотите развиваться</h2>
                    </div>
                    <div class="col-12 col-md-6 d-flex
                    justify-content-start justify-content-md-end align-items-end mt-md-0 mt-3">
                        <h3> Сортировать по:</h3>
                        <div class="list">
                            @if(request('sort') == 'price')
                                <span class="placeholder">цене</span>
                            @elseif(request('sort') == 'created_at')
                                <span class="placeholder">новизне</span>
                            @else
                            <span class="placeholder">популярности</span>
                            @endif()
                            <ul class="list__ul">
                                <li><a href="{{route('courses',['slug' => $slug, 'sort' => ''])}}">популярности</a></li>
                                <li><a href="{{route('courses',['slug' => $slug, 'sort' => 'price'])}}">цене</a></li>
                                <li>
                                    <a href="{{route('courses',['slug' => $slug, 'sort' => 'created_at'])}}">новизне</a>
                                </li>
                            </ul>
                        </div>
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
{{--                    <div class="banner row ">--}}
{{--                        <div class="col-12 col-md-5 d-flex align-items-center">--}}
{{--                            <div>--}}
{{--                                <h1>Все курсы по маркетингу--}}
{{--                                    за единую подписку</h1>--}}
{{--                                <p>--}}
{{--                                    Экономия 125 000 Т--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-md-4 d-flex align-items-center">--}}
{{--                            <div>--}}
{{--                                <a class="btn-orange pr-4 pl-4 pt-3 pb-3" href="#">Купить подписку прямо сейчас</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-md-3  d-flex align-items-center">--}}
{{--                            <div class=" pt-4 pl-4">--}}
{{--                                <h2>20 000 T</h2>--}}
{{--                                <p>--}}
{{--                                    <strike>Вместо 145 000 Т</strike>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    @if(!empty($courses->items()))
                        <div class="courses_cards row mt-4" id="courses_cards">
                            @foreach($courses as $course)
                                <div class="courses__card col-md-12 mb-4" id="cc">
                                    <div class="courses__card_inner row pt-3 pb-3">
                                        <div class="course__card__video col-md-4">
                                            <a class="popup lesson_video d-block" href="{{$course->video_path}}">
                                                <img class="course__image" src="{{asset($course->image_path)}}" alt="">
                                                <img class="play__video"
                                                     src="{{asset('modules/front/assets/img/play.svg')}}"
                                                     alt="">
                                                <span class="play__video__text">
                                                    Посмотреть интервью
                                                    </span>
                                            </a>
                                        </div>
                                        <div class="course__card__content col-md-8 row">
                                            <h1 class="col-md-9">{{$course->name}}</h1>
                                            <h1 class="col-md-3 text-right">{{$course->price}} 0 T</h1>
                                            <p class="col-md-5">{{$course->author->first_name." ".$course->author->last_name}}
                                            </p>
                                            <p class="col-md-4">{{$course->lessons->count()}} уроков
                                                | {{$course->duration}}
                                                часов</p>
                                            <div class="stars col-md-3 text-right">
                                                @foreach(range(1,5) as $i)
                                                    <i class="star {{$i > $course->rating ? $i - $course->rating < 1 ?
                                                                    'fa fa-star-half-alt' : 'far fa-star' :
                                                                    'fa fa-star'}}"></i>
                                                @endforeach
                                            </div>
                                            <div class="description col-12">
                                                <p>
                                                    @if(strlen($course->description) > 320)
                                                        {{substr($course->description,0 , 320) . '...'}}
                                                    @else
                                                        {{$course->description}}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-md-12 row">
                                                <div class="button-more-info col-md-3">
                                                    <a class="btn-orange pt-2 pb-2 pr-3 pl-3 "
                                                       href="{{route('course.single.detail', ['slug' => $course->slug])}}">Подробнее</a>
                                                </div>
                                                <div class="button-buy col-md-5">
                                                    <a class="btn-orange pt-2 pb-2 pr-3 pl-3 "
                                                       href="{{route('buy-course',['slug' => $course->slug])}}">Купить
                                                        курс</a>
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
                                <a class="see-more btn-orange pt-2 pb-2 pr-5 pl-5" data-div="#courses_cards"
                                   data-page="2" data-link="page=" id="see-more">Загрузить еще</a>
                            </div>
                        @else


                        @endif


                </div>
                @else
                    <div class="courses_cards d-flex justify-content-center align-items-center mt-4 "
                         id="courses_cards">
                        <label>Пока нет курсов =(</label>
                    </div>
                @endif
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
        console.clear();

        var el = {};
        $(document).click(function() {
            $(".placeholder").css("opacity", "1");
            $(".list__ul").hide();
        });
        $(".placeholder").on("click", function (ev) {
            ev.stopPropagation();
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
            location.replace(window.location.href + '?sort=price');

            // Animate select width as placeholder
            $(this).animate({width: $(".placeholder").width() + "px"});
        });

    </script>
    <script>
        function checkCourses() {
            var see_more = document.getElementById("see-more");


            if (count >= total) {
                see_more.remove();
            }
            // console.log(count);
            // console.log(total);


        }
    </script>
    <script src="{{asset('modules/front/assets/js/jquery.jscroll.min.js')}}"></script>
    <script src="{{asset('modules/front/assets/js/magnific-popup.min.js')}}"></script>

    <script type="text/javascript">
        var magnifPopup = function () {
            $('.popup').magnificPopup({
                type: 'iframe',
                removalDelay: 300,
                mainClass: 'mfp-with-zoom',
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true, // By default it's false, so don't forget to enable it

                    duration: 300, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function

                    // The "opener" function should return the element from which popup will be zoomed in
                    // and to which popup will be scaled down
                    // By defailt it looks for an image tag:
                    opener: function (openerElement) {
                        // openerElement is the element on which popup was initialized, in this case its <a> tag
                        // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                }
            });
        };
        // Call the functions
        magnifPopup();

        var count =
        {{$courses->count()}}
        var total = {{$courses->total()}}
        $(function () {
            var $ul = $("ul.pagination");
            $ul.hide(); // Prevent the default Laravel paginator from showing, but we need the links...
            checkCourses();
            $pages = {{$courses->lastPage()}}
            $(".see-more").click(function () {
                count = count + 2;
                checkCourses();
                if ($pages >= $(this).data('page')) {
                    $div = $($(this).data('div')); //div to append

                    if (window.location.href.indexOf("sort") > -1) {
                        $link = "&" + $(this).data('link'); //current URL
                    } else {
                        $link = "?" + $(this).data('link'); //current URL
                    }


                    $page = $(this).data('page'); //get the next page #

                    $href = window.location.href + $link + $page; //complete URL
                    console.log($href);
                    $.get($href, function (response) { //append data
                        $html = $(response).find("#courses_cards").html();
                        $div.append($html);
                    });
                    $(this).data('page', (parseInt($page) + 1)); //update page #

                } else {
                    $(this).remove()
                }
            });


        });
    </script>
@endsection
