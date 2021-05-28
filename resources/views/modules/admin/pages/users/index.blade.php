@extends('modules.admin.layouts.app-full')
@section('content')
    <h1 class="h2 mb-2">Пользователи</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Пользователи</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card h-100">
                <header class="card-header">
                    <h2 class="h4 card-header-title">Пользователи</h2>
                    <a href="{{route('user.edit')}}" class="btn btn-outline-primary mt-3">
                        Добавить <i class="ti ti-plus"></i>
                    </a>
                    <div class="pt-3">
                        <form action="{{ route('user.search') }}" method="GET">
                            <div class="d-flex">
                                <input class="form-control col-6 pr-3" type="text" name="search" required/>
                                <button class="btn btn-outline-primary" type="submit">Найти</button>
                            </div>
                        </form>
                    </div>

                </header>
                <div class="card-body pt-0">
                    @if($users->items())
                        <table class="table table-hover table-light text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Телефон</th>
                                <th>Email</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{route('user.edit', ['user_id' => $user->id])}}" class="btn btn-outline-primary btn-sm m-1">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        <button class="btn btn-outline-danger btn-sm m-1" data-toggle="modal"
                                                data-target="#reset{{$user->id}}"><i class="ti ti-key"></i>
                                        </button>
                                        <div class="modal modal-backdrop" id="reset{{$user->id}}" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                                             data-backdrop="false">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title w-100" id="myModalLabel">Сброс</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Вы действительно хотите сбросить пароль?</p>
                                                        <form method="post"
                                                              action="{{route('user.password.reset', ['user_id' => $user->id])}}">
                                                            {{csrf_field()}}
                                                            <input type="number" value="{{$user->id}}" hidden>
                                                            <button type="submit" class="btn btn-outline-danger mt-3">
                                                                Сбросить безвозвратно<i class="ti ti-trash"></i></button>
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
                        {{$users->links()}}
                    @else <h6>У вас пока нет пользователей!</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
