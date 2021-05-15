@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Изменение пакета для {{$course->name}}</h1>
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
                    <form action="{{route('packet.update',['packet_id' => $packet->id])}}" method="post"
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
    <div class="row">
        @if($packet->prices->count() < 2)
            <div class="col-12 col-md-6 mb-5">
                <div class="card h-100">
                    <header class="card-header">
                        <h2 class="h4 card-header-title">Добавить цены в разных валютах на пакет</h2>
                    </header>
                    <div class="card-body pt-0">
                        <form action="{{route('packet_price.store',['packet_id' => $packet->id])}}" method="post"
                              enctype="multipart/form-data">
                            <x-admin.input-form-group-list
                                :errors="$errors"
                                :elements="$priceForm"/>
                            <button type="submit"
                                    class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                                Сохранить <i class="ti ti-check"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-12 col-md-6 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Цены в разных валютах на пакет</h2>
                </header>
                <div class="card-body pt-0">
                    @if(!$packet->prices->isEmpty())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Цена</th>
                                <th>Старая цена</th>
                                <th>Валюта</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($packet->prices as $price)
                                <tr>
                                    <td>{{$price->id}}</td>
                                    <td>{{$price->price}}</td>
                                    <td>{{$price->old_price}}</td>
                                    <td>{{$price->currency}}</td>
                                    <td>
                                        <a href="{{route('packet_price.edit', ['price_id' => $price->id])}}"
                                           class="btn btn-outline-primary btn-sm">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else <h6>У курса пока нет цен на пакет!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h2 class="h4 card-header-title">Добавить атрибуты для пакета</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('attribute.store',['packet_id' => $packet->id])}}" method="post">
                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$attributeForm"/>
                        <button type="submit"
                                class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Добавить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h2 class="h4 card-header-title">Атрибуты для пакета</h2>
                </div>
                <div class="card-body">
                    @if(!$packet->attributes->isEmpty())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Атрибут</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($packet->attributes as $attribute)
                                <tr>
                                    <td>{{$attribute->id}}</td>
                                    <td>{{$attribute->attribute}}</td>
                                    <td>
                                        <form class="d-inline" method="post"
                                              action="{{route('attribute.delete', ['attribute_id' => $attribute->id])}}">
                                            {{csrf_field()}}
                                            <button type="submit"
                                                    class="btn btn-outline-danger btn-sm">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else <h6>Пока нет атрибутов!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
