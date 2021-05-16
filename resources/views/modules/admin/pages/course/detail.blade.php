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
            <form action="{{route('course.detail.update', ['id' => $course->id])}}"
                  method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea name="detail_page_content"
                              class="form-control"
                              rows="30"
                              id="editor">{{$course->getDetailContent()}}</textarea>
                </div>

                <div class="form-group">
                    <input type="submit"
                           class="btn btn-block btn-success"
                           value="Сохранить">
                </div>
                <div class="form-group">
                    <a target="_blank" href="{{route('course.single.detail', ['slug'=>$course->slug])}}" class="btn btn-primary btn-block mt-1">Посмотреть на сайте</a>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-6 mb-5">
            <iframe src="{{route('course.single.detail', ['slug'=>$course->slug])}}" class="w-100" height="700"
                    frameborder="0"></iframe>
        </div>
    </div>
@endsection

