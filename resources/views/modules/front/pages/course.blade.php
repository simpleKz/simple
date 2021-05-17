@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/course.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/course-responsive.css')}}">
@endsection

@section('content')
    <div class="back_links">
        <a href="{{route('index')}}">Главная –</a>
        <a href="{{route('courses')}}">Каталог курсов -</a>
        <a href="{{route('courses')}}">{{$course->name}}</a>
    </div>
    <section class="head_course">
        <img src="{{asset($course->image_path)}}" alt="">
        <div class="container-fluid">
            <div class="row">
                <h1 class="col-8">{{$course->name}}</h1>
                <p class="col-8">{{$course->lessons->count()}} уроков
                    @if(!$course->is_parent)
                        | {{$course->lessonTime()}} часов
                    @endif
                </p>
                <p class="col-8">Спикер: {{$course->author->first_name.' '.$course->author->last_name}}</p>
                <div class="col-9 col-md-12">
                    <a class="btn btn-orange mt-3" href="{{route('buy-course',['slug' => $course->slug])}}">Начать
                        обучение</a>
                </div>
            </div>
        </div>
    </section>
    {!! $course->getDetailContent() !!}
    <section class="price">
        <div class="container-fluid">
            <div class="pt-4 d-flex">
                <a class="btn-orange" href="{{route('buy-course',['slug' => $course->slug])}}">Купить подписку</a>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

    <script type="text/javascript">

    </script>
@endsection
