@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Авторы</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Авторы</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Авторы</h2>
                    <a href="{{route('author.edit')}}" class="btn btn-outline-primary mt-3">
                        Добавить <i class="ti ti-plus"></i>
                    </a>
                </header>
                <div class="card-body pt-0">
                    @if($authors->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Создан</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{$author->id}}</td>
                                    <td>{{$author->first_name}}</td>
                                    <td>{{$author->last_name}}</td>
                                    <td>{{$author->created_at}}</td>
                                    <td class="d-inline-block">
                                        <a href="{{route('author.edit', ['author_id' => $author->id])}}" class="btn btn-outline-primary btn-sm">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{$author->id}}">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                        <div class="modal modal-backdrop" id="delete{{$author->id}}" tabindex="-1"
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
                                                        <form method="post" action="{{route('author.delete', ['id' => $author->id])}}">
                                                            {{csrf_field()}}
                                                            <input type="number" value="{{$author->id}}" hidden>
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
                        {{$authors->links()}}
                    @else <h6>У вас пока нет авторов!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
