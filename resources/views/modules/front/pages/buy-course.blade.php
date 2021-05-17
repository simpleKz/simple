@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <style>
        .my-border {
            box-shadow: 0px 0px 19px 0px rgba(227, 227, 227, 0.75);
            -webkit-box-shadow: 0px 0px 19px 0px rgba(227, 227, 227, 0.75);
            -moz-box-shadow: 0px 0px 19px 0px rgba(227, 227, 227, 0.75);
        }
    </style>
@endsection

@section('content')
    <section class="pb-5 mb-5">
        <div class="container p-4">
            <div class="course-header pt-5 mb-5">
                <p class="pb-5"><a href="{{route('index')}}">Главная</a> – Оформление покупки</p>
                <h1 class="mb-3">{{$course->name}}</h1>
                <p>Выберите подходящий пакет</p>
            </div>
            <div class="row">
                @foreach($course->packets as $packet)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card my-border">
                            <div class="card-header py-3 text-center"
                                 style="background-color: {{$packet->color}}">
                                <h4>
                                    {{$packet->name}}
                                </h4>
                            </div>
                            <div class="card-body">
                                @foreach($packet->attributes as $attribute)
                                    <p class="py-2 text-center">
                                        <span>
                                            {{$attribute->attribute}}
                                        </span>
                                    <hr>
                                    </p>
                                @endforeach

                                @foreach($packet->prices as $price)
                                    <p class="text-center font-weight-bold">
                                        <span style="text-decoration: line-through;">
                                            {{$price->old_price}} {{$price->currency}}
                                        </span>
                                        /
                                        <span style="font-size: 20px">
                                            {{$price->price}}  {{$price->currency}}
                                        </span>
                                    </p>
                                @endforeach
                                <p class="text-center font-weight-light">
                                    Данная стоимость за все {{$packet->packetCourses->count()}} курсов
                                </p>

                                <p class="text-center my-5 ">
                                    <a class="btn-orange" href="{{route('pay',['course_id' => $course->id, 'packet_id' => $packet->id])}}">Выбрать пакет</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script type="text/javascript">

    </script>
@endsection
