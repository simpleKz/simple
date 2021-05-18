@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/my-course.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/my-course-responsive.css')}}">
    <style>

    </style>
@endsection

@section('content')
    <div class="back_links">
        <a href="{{route('index')}}">Главная &#8594;</a>
        <a href="{{route('courses')}}">Каталог курсов </a>
        <a href="{{route('my-course', ['slug' => $course->slug])}}">{{$course->name}} </a>
    </div>
    <section class="my-course">
        <div class="container-fluid">
            <div class="course-header">
                <h1>{{$course->name}}</h1>
                <div class="row align-items-center mt-3">
                    <h2 class="col-12 col-md-6 col-lg-3">Спикер: {{$course->author->fullName()}}</h2>
                    <h2 class="col-12 col-md-6 col-lg-3">Продолжительность: 15 минут</h2>
                </div>
            </div>
            <div class="course__content row mt-3 mt-lg-5">
                <div class="lesson_video_card col-12 col-lg-8">
                    <iframe class="lesson_video" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </iframe>
                </div>
                <div class="lessons_content col-12 col-lg-4 mt-3 mt-lg-0">
                    <h1>Следующие занятия</h1>
                    <div class="lessons mt-4">
                        <div class="lesson__card__content mb-3 p-3 col-md-12 align-items-center">
                            <div class="dir_text col-10">
                                <p>1 занятие</p>
                                <h1>Введение в маркетинг</h1>
                            </div>
                            <div class="dir_circle">
                               <span class="read-more-circle-around ">
                                        <i class="far fa-check"></i>
                               </span>
                            </div>
                        </div>
                        <div class="lesson__card__content lesson__status lesson__playing mb-3 p-3 col-md-12 align-items-center">
                            <div class="dir_text col-10">
                                <p>2 занятие</p>
                                <h1>Целевая аудитория и …</h1>
                            </div>
                            <div class="dir_circle">
                               <span class="read-more-circle-around">
                                        <i class="fas fa-play fa-xs"></i>
                               </span>
                            </div>
                        </div>
                        <div class="lesson__card__content lesson__status p-3 mb-3 col-md-12 align-items-center">
                            <div class="dir_text col-10">
                                <p>3 занятие</p>
                                <h1>Продуктовая матрица</h1>
                                <h2> <i class="far fa-clock"></i>
                                    25 минут</h2>
                            </div>
                        </div>
                        <div class="lesson__card__content lesson__status p-3 mb-3 col-md-12 align-items-center">
                            <div class="dir_text col-10">
                                <p>3 занятие</p>
                                <h1>Продуктовая матрица</h1>
                                <h2> <i class="far fa-clock"></i>
                                    25 минут</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lesson mt-3">
                <div class="lesson_info col-12 col-md-8 col-lg-8">
                    <h2>1 занятие</h2>
                    <h1>Введение в маркетинг</h1>
                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать<br>
                        несколько абзацев более менее осмысленного текста рыбы на русском языке,<br>
                        а начинающему оратору отточить навык публичных выступлений в домашних условиях.</p>
                </div>
                <div class="lesson_materials col-12 col-md-8 col-lg-8 pt-5 ">
                    <h1>Прикрепленные материалы</h1>
                    <div class="d-flex">
                        <a class="material mr-2 pt-2 pb-2 pl-4 pr-4">domashka.pdf</a>
                        <a class="material  mr-2 pt-2 pb-2 pl-4 pr-4">check-list.pdf</a>
                    </div>
                </div>
                <div class="d-flex pt-5">
                    <a class="btn-orange col-md-5" href="#">Следующее занятие
                        <i class="fas fa-arrow-right pl-4"></i>
                    </a>
                </div>
{{--                <div class="course_finish col-12 col-md-8 col-lg-8">--}}
{{--                    <p><i class="far fa-share"></i> Поделитесь своим достижением</p>--}}
{{--                    <div class="icons d-flex mt-2">--}}
{{--                        <a class="material mr-2 "><i class="fab fa-instagram"></i></a>--}}
{{--                        <a class="material  mr-2"><i class="fab fa-vk"></i></a>--}}
{{--                        <a class="material  mr-2"><i class="fab fa-facebook"></i></a>--}}
{{--                        <a class="material  mr-2"><i class="fab fa-vk"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="pt-5">--}}
{{--                    <a class="btn-orange col-md-5 pt-3 pb-3 pl-5 pr-5 d-flex align-items-center justify-content-between" href="#">--}}
{{--                        <label>Завершить курс</label>--}}
{{--                        <i class="fa fa-arrow-right"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script type="text/javascript">

    </script>
@endsection
