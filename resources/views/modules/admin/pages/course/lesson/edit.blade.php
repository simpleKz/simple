@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Занятие</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{route('course.index')}}">Курсы</a></li>
            <li class="breadcrumb-item active" aria-current="page">Занятие</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <a href="{{route('lesson.index',['course_id' => $lesson->course->id])}}" class="btn btn-outline-primary mt-1 mb-4"><i class="ti ti-arrow-left"></i> Назад</a>
                    <h2 class="h4 card-header-title">Занятие</h2>
                </header>
                <iframe class="lesson"  src="{{$lesson->video_path}}" height="500">
                </iframe>
                <div class="col-md-12">
                    @if(count($lesson->docs) >0 )
                    <h2>Документы</h2>
                    @foreach($lesson->docs as $doc)
                        <div class="form-row  required" id="{{$doc->id}}">
                            <div class="form-group col-md-4">
                                <a href="{{asset($doc->material_path)}}" download>
                                    <span class="ti-bookmark-alt" style="font-size: 16px;">{{substr($doc->material_path, 18)}}</span>
                                </a>
                            </div>
                            <div class="form-group col-md-2 mt-3">
                                <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$doc->id}}"><i class="ti ti-trash"></i>
                                </button>
                                <div class="modal modal-backdrop" id="delete{{$doc->id}}" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title w-100" id="myModalLabel">Удаление</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Вы действительно хотите удалить?</p>
                                                <form  class="d-flex justify-content-center align-items-center" method="post" action="{{route('lesson.material.delete', ['id' => $doc->id])}}">
                                                    {{csrf_field()}}
                                                    <input type="number" value="{{$doc->id}}" hidden>
                                                    <button type="submit" class="btn btn-outline-danger mt-3">Удалить безвозвратно<i class="ti ti-trash"></i></button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger-soft btn-sm" data-dismiss="modal">
                                                    <i class="ti ti-close"></i> Закрыть</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
                <div class="card-body pt-0">
                    <form action="{{route('lesson.update',['id' => $lesson->id])}}" method="post" enctype="multipart/form-data">
                        <x-admin.input-form-group-list
                            :errors="$errors"
                            :elements="$lesson_web_form"/>
                        <button type="submit" class="offset-md-4 col-md-4 btn btn-block btn-wide btn-primary text-uppercase">
                            Сохранить <i class="ti ti-check"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
