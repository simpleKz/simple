@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <style>

    </style>
@endsection

@section('content')
    <section class="my-course pb-5 mb-5">
        <div class="container p-4">
            <div class="course-header pt-5">
                <p class="pb-5">Главная – Каталог курсов - Основы маркетинга</p>
                <h1>Основы маркетинга</h1>
                <div class="d-flex align-items-center">
                    <h2>Спикер: Аскаров Кайрат</h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <h2>Продолжительность: 15 минут</h2>
                </div>
            </div>
            <div class="course__content row pt-5 ">
                <div class="lesson_video_card col-md-8 col-lg-8">
                    <iframe class="lesson_video"  src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </iframe>
                </div>
                <div class="lessons_content col-md-4 col-lg-4">
                    <h1>Следующие занятия</h1>
                    <div class="lessons" style="overflow-y: scroll; height:470px;">
                        <div class="lesson__card__content mb-3 col-md-12">
                            <div class="dir_text p-3 col-10">
                                <p>1 занятие</p>
                                <h1>Введение в маркетинг</h1>
                            </div>
                            <div class="dir_circle pt-4 float-right">
                               <span class="read-more-circle-around ">
                                        <i class="far fa-2x fa-check"></i>
                               </span>
                            </div>
                        </div>
                        <div class="lesson__card__content mb-3 col-md-12">
                            <div class="dir_text p-3 col-10">
                                <p>2 занятие</p>
                                <h1>Целевая аудитория и …</h1>
                            </div>
                            <div class="dir_circle pt-4 float-right">
                               <span class="read-more-circle-around ">
                                        <i class="fa fa-play"></i>
                               </span>
                            </div>
                        </div>
                        <div class="lesson__card__content_locked mb-3 col-md-12">
                            <div class="dir_text p-3 col-10">
                                <p>3 занятие</p>
                                <h1>Продуктовая матрица</h1>
                                <h2> <i class="far fa-clock"></i>
                                    25 минут</h2>
                            </div>
                            <div class="dir_circle pt-4 float-right">
                               <span class="read-more-circle-around ">
                                        <i class="far fa-2x fa-lock"></i>
                               </span>
                            </div>
                        </div>
                        <div class="lesson__card__content_locked mb-3 col-md-12">
                            <div class="dir_text p-3 col-10">
                                <p>4 занятие</p>
                                <h1>Сегменты аудиторий</h1>
                                <h2> <i class="far fa-clock"></i>
                                    10 минут</h2>
                            </div>
                            <div class="dir_circle pt-4 float-right">
                               <span class="read-more-circle-around ">
                                        <i class="far fa-2x fa-lock"></i>
                               </span>
                            </div>
                        </div>
                        <div class="lesson__card__content_locked mb-3 col-md-12">
                            <div class="dir_text p-3 col-10">
                                <p>4 занятие</p>
                                <h1>Сегменты аудиторий</h1>
                                <h2> <i class="far fa-clock"></i>
                                    10 минут</h2>
                            </div>
                            <div class="dir_circle pt-4 float-right">
                               <span class="read-more-circle-around ">
                                        <i class="far fa-2x fa-lock"></i>
                               </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lesson pt-5 mt-5">
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
                <div class="pt-5">
                    <a class="btn-orange col-md-5 pt-3 pb-3 pl-5 pr-5 d-flex justify-content-between" href="#">

                            <label>Следующее занятие </label>
                            <i class="fa fa-arrow-right"></i>

                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script type="text/javascript">

    </script>
@endsection
