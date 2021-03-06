@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Слайдеры</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Слайдеры</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('slider.index')}}" class="btn btn-outline-primary mt-1 mb-4">
                        <i class="ti ti-arrow-left"></i> Назад
                    </a>
                </header>
                @if($slider)
                    <div class="card-header  border-dark">
                        <img src="{{asset($slider->image_path)}}" style="max-height: 500px; max-width: 500px"
                             alt="slider image" onerror="this.src='{{asset('images/notfound.png')}}'">
                    </div>

                @endif
                <div class="card-body pt-0">
                    <form action="{{route('slider.update')}}" method="post" enctype="multipart/form-data">
                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$slider_web_form"/>
                        <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
