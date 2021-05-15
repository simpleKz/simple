@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Добавлениие курса для пакета {{$packet->name}}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('course.index')}}">Курсы</a></li>
            <li class="breadcrumb-item"><a href="{{route('packet.index', ['course_id' => $course->id])}}">
                    Пакеты курса {{$course->name}}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Добавлениие курса для пакета</li>
        </ol>
    </nav>
    <div class="card bg-secondary-soft">
        <header class="card-header">
            <a href="{{route('packet.index',['course_id' => $course->id])}}"
               class="btn btn-outline-primary mt-1 mb-4"><i class="ti ti-arrow-left"></i> Назад</a>
        </header>
        <div class="card-header">
            <h1>
                Связка курсов
            </h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 mb-5">
                    @foreach($courses as $item)
                        <div class="card border-1 p-0 mt-2">
                            <div class="card-body d-flex justify-content-between">
                                <p>
                                    {{$item->name}}
                                </p>
                                <a href="{{route('packet_course.disconnect', ['course_id' => $item->id, 'packet_id' => $packet->id])}}"
                                   class="btn btn-danger">
                                    <span class="ti ti-arrow-right"></span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12 col-md-6 mb-5">
                    @foreach($otherCourses as $item)
                        <div class="card border-1 p-0 mt-2">
                            <div class="card-body d-flex justify-content-between">
                                <a href="{{route('packet_course.connect', ['course_id' => $item->id, 'packet_id' => $packet->id])}}"
                                   class="btn btn-success">
                                    <span class="ti ti-arrow-left"></span>
                                </a>
                                <p>
                                    {{$item->name}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
