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
                <p class="pb-5"><a href="{{route('index')}}">Главная</a> – Оформление покупки</p>
                <h1 class="mb-5">Оформление покупки</h1>
                <div class="course-to-buy col-12 col-md-12 col-lg-12 p-5  ">
                    <div class="d-flex justify-content-between  col-12 col-md-12 col-lg-12 mb-3">
                        <div class="col-12 col-md-5 pb-2 ">
                            <p>Курс</p>
                            <h1>Основы маркетинга</h1>
                        </div>
                        <div class="col-12 col-md-5 pb-2">
                            <p>Спикер</p>
                            <h1>Аскаров Кайрат</h1>
                        </div>
                    </div>
                    <div class="dotted-border d-flex justify-content-between col-12 col-md-12 col-lg-12 ">
                        <div class="col-12 col-md-5  pb-2">
                            <p>Количество уроков</p>
                            <h1>20</h1>
                        </div>
                        <div class="col-12 col-md-5  pb-2">
                            <p>Общее время уроков</p>
                            <h1>15 часов 20 минут</h1>
                        </div>
                    </div>
                    <div class="video-part d-flex justify-content-between  col-12 col-md-12 col-lg-12 mt-3">
                        <div class="col-12 col-md-5 pb-2 ">
                            <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру
                                сгенерировать несколько абзацев более менее осмысленного
                                текста рыбы на русском языке, а начинающему оратору отточить
                                навык публичных выступлений в домашних условиях.</p>
                        </div>
                        <div class="col-12 col-md-5 pb-2">
                            <iframe class="course_video"  src="https://www.youtube.com/embed/tgbNymZ7vqY" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 ">
                        <div class="col-12 col-md-5  pb-2">
                            <p>Стоимость</p>
                            <h1 class="mb-5">20 000 KZT</h1>

                            <button type="submit"  class="btn-orange pr-5 pl-5 pt-3 pb-3" >Перейти к оплате</button>

                        </div>

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
