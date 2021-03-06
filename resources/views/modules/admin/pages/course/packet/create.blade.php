@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Создание пакета для {{$course->name}}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('course.index')}}">Курсы</a></li>
            <li class="breadcrumb-item"><a href="{{route('packet.index', ['course_id' => $course->id])}}">
                    Пакеты курса {{$course->name}}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Создание пакета</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('packet.index',['course_id' => $course->id])}}"
                       class="btn btn-outline-primary mt-1 mb-4"><i class="ti ti-arrow-left"></i> Назад</a>
                    <h2 class="h4 card-header-title">Пакеты для курса {{$course->name}}</h2>
                </header>
                <div class="card-body pt-0">
                    <form action="{{route('packet.store',['course_id' => $course->id])}}" method="post"
                          enctype="multipart/form-data">
                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$form"/>
                        <button type="submit"
                                class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
