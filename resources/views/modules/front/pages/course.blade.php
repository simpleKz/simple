@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/course.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/course_responsive.css')}}">
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
                <p class="col-8">{{$course->lessons->count()}} уроков | {{$course->lessonTime()}} часов</p>
                <p class="col-8">Спикер: {{$course->author->first_name.' '.$course->author->last_name}}</p>
                <div class="col-9 col-md-12">
                    <a class="btn btn-orange mt-3" href="#">Начать
                        обучение</a>
                </div>
            </div>
        </div>
    </section>
    {!! $course->getDetailContent() !!}
    <section class="price">
        <div class="container-fluid">
            <div class="pt-4 d-flex">
                <a class="btn-orange" href="#">Купить подписку</a>
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

    </script>
@endsection
