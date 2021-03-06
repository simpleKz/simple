@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Курсы</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Курсы</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Курсы</h2>
                    <a href="{{route('course.create')}}" class="btn btn-outline-primary mt-3">
                        Добавить <i class="ti ti-plus"></i></a>
                </header>
                <div class="card-body pt-0">
                    @if(!$courses->isEmpty())
                        <table class="table table-hover table-light text-center table-responsive">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Пакетный курс</th>
                                <th>Видимый</th>
                                <th>Рейтинг</th>
                                <th>Категория</th>
                                <th>Занятий</th>
                                <th>Автор</th>
                                <th>Создан</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{$course->id}}</td>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->is_parent ? 'Да' : 'Нет'}}</td>
                                    <td>{{$course->is_visible ? 'Да' : 'Нет'}}</td>
                                    <td>{{$course->rating}}</td>
                                    <td>{{$course->category ? $course->category->name : ''}}</td>
                                    <td>{{$course->lessons ? $course->lessons->count() : '0'}}</td>
                                    <td>{{$course->author ? ($course->author->first_name." ".$course->author->last_name) : ''}}</td>
                                    <td>{{$course->created_at}}</td>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{route('course.edit', ['id' => $course->id])}}"
                                           class="btn btn-outline-primary btn-sm m-1">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        <button class="btn btn-outline-danger btn-sm m-1" data-toggle="modal"
                                                data-target="#delete{{$course->id}}"><i class="ti ti-trash"></i>
                                        </button>
                                        <a href="{{route('packet.index', ['course_id' => $course->id])}}"
                                           class="btn btn-outline-primary btn-sm m-1">
                                            <i class="ti ti-money"></i>
                                        </a>
                                        <a href="{{route('course.detail', ['id' => $course->id])}}"
                                           class="btn btn-outline-primary btn-sm m-1">
                                            <i class="ti ti-desktop"></i>
                                        </a>

                                        @if(!$course->is_parent)
                                            <a href="{{route('lesson.index', ['course_id' => $course->id])}}"
                                               class="btn btn-outline-primary btn-sm m-1">
                                                <i class="ti ti-bookmark"></i>
                                            </a>
                                        @endif
                                        <div class="modal modal-backdrop" id="delete{{$course->id}}" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                             data-backdrop="false">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title w-100" id="myModalLabel">Удаление</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Вы действительно хотите удалить?</p>
                                                        <form method="post"
                                                              action="{{route('course.delete', ['id' => $course->id])}}">
                                                            {{csrf_field()}}
                                                            <input type="number" value="{{$course->id}}" hidden>
                                                            <button type="submit" class="btn btn-outline-danger mt-3">
                                                                Удалить безвозвратно<i class="ti ti-trash"></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger-soft btn-sm"
                                                                data-dismiss="modal">
                                                            <i class="ti ti-close"></i> Закрыть
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else <h6>У вас пока нет курсов!</h6>
                    @endif
                    {{$courses->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
