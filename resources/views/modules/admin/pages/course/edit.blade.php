@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Курс</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Курс</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('course.index')}}" class="btn btn-outline-primary mt-1 mb-4"><i class="ti ti-arrow-left"></i> Назад</a>
                    <h2 class="h4 card-header-title">Курс</h2>
                </header>
                <div class="card-header  border-dark">
                    <img src="{{asset($course->image_path)}}" style="max-height: 500px; max-width: 500px" alt="course image">

                </div>

                    <iframe class="course_video mt-5"  src="{{$course->video_path}}" height="500">
                    </iframe>


                <div class="card-body pt-0">
                    <form action="{{route('course.update')}}" method="post" enctype="multipart/form-data">
                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$course_web_form"/>

                        <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
