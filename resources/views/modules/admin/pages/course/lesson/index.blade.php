@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Занятия</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('course.index')}}">Назад</a></li>
            <li class="breadcrumb-item"><a href="{{route('course.index')}}">Курсы</a></li>
            <li class="breadcrumb-item active" aria-current="page">Занятия</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Занятия</h2>
                    <div class="d-flex align-items-center justify-content-start">
                        <a href="{{route('course.index')}}"
                           class="btn btn-outline-primary mt-3"><i class="ti ti-arrow-left"></i> Назад</a>
                        &nbsp
                        <a href="{{route('lesson.create',['course_id' => $course_id])}}" class="btn btn-outline-primary mt-3">
                            Добавить <i class="ti ti-plus"></i></a>
                    </div>
                </header>
                <div class="card-body pt-0">
                    @if(!$lessons->isEmpty())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Время(мин)</th>
                                <th>Курс</th>
                                <th>Создан</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lessons as $lesson)
                                <tr>
                                    <td>{{$lesson->id}}</td>
                                    <td>{{$lesson->name}}</td>
                                    <td>{{$lesson->duration_in_minutes}}</td>
                                    <td>{{$lesson->course ? $lesson->course->name : ''}}</td>
                                    <td>{{$lesson->created_at}}</td>
                                    <td class="d-inline-block">
                                        <a href="{{route('lesson.edit', ['id' => $lesson->id])}}"
                                           class="btn btn-outline-primary btn-sm">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{$lesson->id}}"><i class="ti ti-trash"></i>
                                        </button>
                                        <div class="modal modal-backdrop" id="delete{{$lesson->id}}" tabindex="-1"
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
                                                        <form method="post" action="{{route('lesson.delete', ['id' => $lesson->id])}}">
                                                            {{csrf_field()}}
                                                            <input type="number" value="{{$lesson->id}}" hidden>
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
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else <h6>У курса пока нет занятий!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
