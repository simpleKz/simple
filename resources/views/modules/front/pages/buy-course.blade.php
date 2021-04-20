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
                            <h1>{{$course->name}}</h1>
                        </div>
                        <div class="col-12 col-md-5 pb-2">
                            <p>Спикер</p>
                            <h1>{{$course->author->first_name." ".$course->author->last_name}}</h1>
                        </div>
                    </div>
                    <div class="dotted-border d-flex justify-content-between col-12 col-md-12 col-lg-12 ">
                        <div class="col-12 col-md-5  pb-2">
                            <p>Количество уроков</p>
                            <h1>{{$course->lessons->count()}}</h1>
                        </div>
                        <div class="col-12 col-md-5  pb-2">
                            <p>Общее время уроков(часы)</p>
                            <h1>{{$course->duration}}</h1>
                        </div>
                    </div>
                    <div class="video-part d-flex justify-content-between  col-12 col-md-12 col-lg-12 mt-3">
                        <div class="col-12 col-md-5 pb-2 ">
                            <p>{{$course->description}}</p>
                        </div>
                        <div class="col-12 col-md-5 pb-2">
                            <iframe class="course_video"  src="{{$course->video_path}}" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 ">
                        <div class="col-12 col-md-5  pb-2">
                            <p>Стоимость</p>
                            <h1 class="mb-5">{{$course->price}} тг</h1>

                            <a href="{{route('pay',['course_id' => $course->id])}}"   class="btn-orange pr-5 pl-5 pt-3 pb-3" >Перейти к оплате</a>

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
