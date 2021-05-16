@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Курс</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('course.index')}}">Курсы</a></li>
            <li class="breadcrumb-item active" aria-current="page">Курс</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12 col-md-6 mb-5">

        </div>
        <div class="col-12 col-md-6 mb-5">
            <iframe src="{{route('course.single.detail')}}" class="w-100" height="700" frameborder="0"></iframe>
        </div>
    </div>
@endsection
