@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Пакеты курса {{$course->name}}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('course.index')}}">Курсы</a></li>
            <li class="breadcrumb-item active" aria-current="page">Пакеты курса {{$course->name}}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Пакеты</h2>
                    <a href="{{route('packet.create',['course_id' => $course->id])}}"
                       class="btn btn-outline-primary mt-3">
                        Добавить <i class="ti ti-plus"></i>
                    </a>
                </header>
                <div class="card-body pt-0">
                    @if(!$course->packets->isEmpty())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Доступ в месяцах</th>
                                <th>Цвет</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($course->packets as $packet)
                                <tr>
                                    <td>{{$packet->id}}</td>
                                    <td>{{$packet->name}}</td>
                                    <td>{{$packet->expiration_month == 0 ? 'Вечно' : $packet->expiration_month}}</td>
                                    <td class="text-center">
                                        <div style="width: 30px;height: 30px; display: inline-block; background-color: {{$packet->color}}"></div>
                                    </td>
                                    <td>
                                        <a href="{{route('packet.edit', ['packet_id' => $packet->id])}}"
                                           class="btn btn-outline-primary btn-sm">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else <h6>У курса пока нет подписок!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
